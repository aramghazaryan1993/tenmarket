<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserSettingsModel;
use App\YuridicheskoyeModel;
use App\FizicheskoyeModel;
use App\User;
use App\BlockUserModel;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response,File;
use Session;
use Illuminate\Support\Facades\Hash;



class UserSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('CountHomeMessages');
    }

    public function EditProfile(request $request)
    {
    if(empty($request->file('img_profile'))){
        $this->validate($request, [
            'name'      => 'required',
            'last_name' => 'required',
            'region_id' => 'required|not_in:82',
            'gender'    => 'required',
         ]);
    }else{
        $this->validate($request, [
            'name'        => 'required',
            'last_name'   => 'required',
            'region_id'   => 'required|not_in:82',
            'gender'      => 'required',
            'img_profile' => 'required',
            'img_profile.*' => 'image|required|mimes:jpeg,jpg,png,gif,webp',
         ]);
    }

           //check image
       if(!empty($request->file('img_profile'))){

            $quality        = 30;
            $name           = $request->file('img_profile');
            $rand_name      = rand().'.'.$name->getClientOriginalName();
            $tmp_name       = $request->file('img_profile')->getPathName();
            $location       = public_path('img/users/'.$rand_name);
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
            $info           = getimagesize($tmp_name);


        if ($info['mime'] == 'image/jpeg'){

                $image = imagecreatefromjpeg($tmp_name);
                imagejpeg($image, $location, $quality);

            }elseif ($info['mime'] == 'image/gif'){
                $a = rtrim($location, ".gif");
				$image = imagecreatefromgif($tmp_name);
				$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
				imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
				imagealphablending($bg, TRUE);
				imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
				imagedestroy($image);
				imagegif($bg,  rtrim($location, ".gif"). ".jpeg", $quality);
                imagedestroy($bg);

            }elseif ($info['mime'] == 'image/png'){

				$image = imagecreatefrompng($tmp_name);
				$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
				imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
				imagealphablending($bg, TRUE);
				imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
				imagedestroy($image);
				imagejpeg($bg, rtrim($location, ".png") . ".jpeg", $quality);
                imagedestroy($bg);

                //dd(str_replace(array('.png','.jpeg','.jpg','.gif','.webp'),".jpeg",$rand_name));

		 }elseif ($info['mime'] == 'image/webp'){

				$image = imagecreatefromwebp($tmp_name);
				$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
				imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
				imagealphablending($bg, TRUE);
				imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
				imagedestroy($image);
				imagewebp($bg, rtrim($location, ".webp") . ".jpeg", $quality);
				imagedestroy($bg);
         }
        }

        // Edit Profile
       $EditProfile = User::find(Auth::id());
       $EditProfile->name = $request->name;
       $EditProfile->last_name = $request->last_name;
       $EditProfile->region_id = $request->region_id;
       $EditProfile->gender = $request->gender;
          // delete image
        if(!empty($request->file('img_profile'))){
            if(File::exists(public_path('img/users/'.$EditProfile->img))){
            File::delete(public_path('img/users/'.$EditProfile->img));
         }
           $EditProfile->img = str_replace(array('.png','.gif','.webp'),".jpeg",$rand_name);
          }
        $EditProfile->save();

         return back()->with('success', 'Ваши изображения были успешно загружены');
    }



    public function Profile()
    {
        $GetProfile = DB::table('users')
                      ->select('*')
                      ->join('region_list', 'region_list.id', '=', 'users.region_id')
                      ->where('users.id', '=', Auth::id())
                      ->first();

        $GetRegion = UserSettingsModel::all();

        return view('settings.settings',['GetProfile' => $GetProfile, 'GetRegion' => $GetRegion,'GetBlockUser' => $this->GetBlokUser()]);
    }

    public function EditDeleteContactInformation(request $request)
    {

         $EditContactInformation = User::find(Auth::id());

            if(isset($request->phone))
            {
                $EditContactInformation->phone_number =  $request->phone_number_input;
            }
            elseif(isset($request->viber))
            {
                $EditContactInformation->viber        =  $request->viber_input;

            }elseif(isset($request->whatsapp))
            {
                $EditContactInformation->whatsapp     =  $request->whatsapp_input;
            }

                $EditContactInformation->save();

          return response()->json($EditContactInformation);

    }


    public function AccountCheckPassword(request $request)
    {
       $CheckPassword = User::where('id', Auth::id())->first();

       if (Hash::check($request->current_password, $CheckPassword->password))
       {
           return response()->json();
       }

    }

    public function AccountResetPassword(request $request)
    {
      $this->validate($request, [
        'confirmPassword' => 'required|min:8',
        'NewPassword'     => 'required|min:8',
     ]);

        if($request->NewPassword === $request->confirmPassword)
        {
            $EditContactInformation = User::find(Auth::id());
            $EditContactInformation->password =  Hash::make($request->NewPassword);
            $EditContactInformation->save();
            return response()->json();
        }
    }

    public function AccountEditEmail(request $request)
    {
        $this->validate($request, [
            'edit_email' => 'required|email',
         ]);
            $EditContactInformation = User::find(Auth::id());
            $EditContactInformation->email =  $request->edit_email;
            $EditContactInformation->save();
            return response()->json();
    }

    public function AccountDelete(request $request)
    {
       $get = User::find(Auth::id());

        if (Hash::check($request->delete_profile, $get->password))
        {
            return User::destroy(Auth::id());
        }
    }


    public function Fizicheskoye()
    {
       $GetFizicheskoye = FizicheskoyeModel::where('user_id', '=', Auth::id())->first();
          return view('settings.fizicheskoye',['GetFizicheskoye' => $GetFizicheskoye]);
    }

    public function FizicheskoyeEdit(request $request)
    {
         $request->validate([
            'lastname'      => 'required',
            'username'      => 'required',
            'surname'       => 'required',
            'phone_number'  => 'required',
            'email'         => 'required|email',
            'post_code'     => 'required|integer|min:4',
            'city'          => 'required',

        ]);


        $EditFizicheskoye = FizicheskoyeModel::where('user_id', '=', Auth::id())->first();
        $EditFizicheskoye->last_name    = $request->lastname;
        $EditFizicheskoye->first_name   = $request->username;
        $EditFizicheskoye->middle_name  = $request->surname;
        $EditFizicheskoye->phone_number = $request->phone_number;
        $EditFizicheskoye->email        = $request->email;
        $EditFizicheskoye->city         = $request->city;
        $EditFizicheskoye->post_code    = $request->post_code;
        $EditFizicheskoye->save();

       return redirect()->back()->with('success', 'Ваш запрос был успешно выполнен');
    }

    public function Yuridicheskoye()
    {
        $GetYuridicheskoye = YuridicheskoyeModel::where('user_id', '=', Auth::id())->first();
             return view('settings.yuridicheskoye',['GetYuridicheskoye' => $GetYuridicheskoye]);
    }

    public function YuridicheskoyeEdit(request $request)
    {
        $request->validate([
            'inn'            => 'required|integer',
            'kno'            => 'required',
            'pno'            => 'required',
            'kpp'            => 'required|integer',
            'telephone'      => 'required',
            'mail'           => 'required|email',
            'ogrn'           => 'required|integer',
            'legal_address'  => 'required',
            'mailadd'        => 'required',
        ]);

        $EditYuridicheskoye = YuridicheskoyeModel::where('user_id', '=', Auth::id())->first();
        $EditYuridicheskoye->inn               = $request->inn;
        $EditYuridicheskoye->company_name      = $request->kno;
        $EditYuridicheskoye->company_full_name = $request->pno;
        $EditYuridicheskoye->kpp               = $request->kpp;
        $EditYuridicheskoye->phone_number      = $request->telephone;
        $EditYuridicheskoye->email             = $request->mail;
        $EditYuridicheskoye->ogrn              = $request->ogrn;
        $EditYuridicheskoye->contact_person    = $request->contact_person;
        $EditYuridicheskoye->legal_address     = $request->legal_address;
        $EditYuridicheskoye->bik               = $request->bik;
        $EditYuridicheskoye->check_account     = $request->check_account;
        $EditYuridicheskoye->kbk               = $request->kbk;
        $EditYuridicheskoye->oktmo             = $request->oktmo;
        $EditYuridicheskoye->delivery_type     = $request->mailadd;

        //  абонентский ящик
        if(isset($request->mailadd) && $request->mailadd == 0)
        {

            $request->validate([
                'post_index1'    => 'required',
            ]);
        $EditYuridicheskoye->post_index        = $request->post_index1;
        $EditYuridicheskoye->customer_box      = $request->customer_box1;
        $EditYuridicheskoye->post_address      = $request->post_address1;

        $EditYuridicheskoye->locality          = null;
        $EditYuridicheskoye->street            = null;
        $EditYuridicheskoye->to_post_index     = null;
        $EditYuridicheskoye->house             = null;
        $EditYuridicheskoye->to_post_address   = null;
        }

        // по адресу
        if(isset($request->mailadd) && $request->mailadd == 1)
        {

            $request->validate([
                'locality'      => 'required',
                'street'        => 'required',
                'to_post_index' => 'required',
                'house'         => 'required',
            ]);

        $EditYuridicheskoye->locality          = $request->locality;
        $EditYuridicheskoye->street            = $request->street;
        $EditYuridicheskoye->to_post_index     = $request->to_post_index;
        $EditYuridicheskoye->house             = $request->house;
        $EditYuridicheskoye->to_post_address   = $request->to_post_address;

        $EditYuridicheskoye->post_index        = null;
        $EditYuridicheskoye->customer_box      = null;
        $EditYuridicheskoye->post_address      = null;
        }
        $EditYuridicheskoye->save();
            return redirect()->back()->with('success', 'Ваш запрос был успешно выполнен');
    }

    public function RazblockUser(request $request)
    {
        $Razblock = BlockUserModel::where('user_id',Auth::id())
                                    ->where('block_user_id',$request->block_user_id)
                                    ->first();

        $Razblock->delete();
        return response()->json($request->block_user_id);
    }

public function GetBlokUser()
{
          return DB::table('block_users')
               ->select('block_users.*', 'users.name', 'users.last_name', 'users.img')
               ->join('users','users.id', '=', 'block_users.block_user_id')
               ->where('block_users.user_id', '=', Auth::id())
               ->where('block_users.type', '=', 1)
               ->get();
}


}
