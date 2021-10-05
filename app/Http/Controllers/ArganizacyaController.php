<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\ArganizacyaModel;
use Validator,Redirect,Response,File;

class ArganizacyaController extends RegionController
{
    public function index(Request $request)
    {
        date_default_timezone_set('Asia/Yerevan');
        $now  = time() - 30 * 60 * 60 *24;
        $time = date('Y-m-d h:i:s', $now);

        $this->BuyAdvertising($request); // return check Region BuyAdvertising kuplyu
        $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
        $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
        $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

        // Select Список организаций praduct
        $ShowArganizacya = ArganizacyaModel::whereDate('confirmation_date', '>', $time)->paginate(1);
        return view('arganizacya',['ShowArganizacya' => $ShowArganizacya]);
    }


    public function FinelProduct($id,Request $request)
    {
        $this->BuyAdvertising($request); // return check Region BuyAdvertising kuplyu
        $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
        $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
        $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

        $ShowFinelArganizacya = ArganizacyaModel::find($id);

        //Counter
        DB::table('companies')->where('id', $id)->increment('counter');

         return view('finel_agranizacya',['ShowFinelArganizacya' => $ShowFinelArganizacya]);
    }

    public function Kabinet()
    {
        $ShowArganizacya = ArganizacyaModel::where('user_id', '=',Auth::id())->paginate(8);

        return view('kabinet.arganizacya',compact('ShowArganizacya'));
    }

    public function AddArganizacya()
    {
        return view('add_abavlenia.add_arganizacya');
    }

    public function EditArganizacya(request $request, $id)
    {

                   //check image
       if(!empty($request->file('img'))){

        $quality        = 30;
        $name           = $request->file('img');
        $rand_name      = rand().'.'.$name->getClientOriginalName();
        $tmp_name       = $request->file('img')->getPathName();
        $location       = public_path('img/img_arganizacya/'.$rand_name);
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

        $Edit = ArganizacyaModel::where('id', '=',$id)->first();

        if(isset($request->name) || !empty($request->file('img')))
        {
            $Edit->name                = $request->name;
            $Edit->email               = $request->email;
            $Edit->website             = $request->website;
            $Edit->phone_number        = $request->phone_number;
            $Edit->viber               = $request->viber;
            $Edit->whatsapp            = $request->whatsapp;
            $Edit->address             = $request->address;
            $Edit->working_days        = $request->working_days;
            $Edit->working_hours_start = $request->working_hours_start;
            $Edit->working_hours_end   = $request->working_hours_end;
            $Edit->description         = $request->description;
                            // delete image
            if(!empty($request->file('img')) and $Edit->img != 'default.jfif')
            {
                    if(File::exists(public_path('img/img_arganizacya/'.$Edit->img)))
                    {
                        File::delete(public_path('img/img_arganizacya/'.$Edit->img));
                    }
            }

            $Edit->img = str_replace(array('.png','.gif','.webp'),".jpeg",$rand_name);

            $Edit->save();
        }

         return view('edit_abavlenia.edit_arganizacya',compact('Edit'));
    }

    public function DeleteImg(request $request)
    {
        $DeleteImg = ArganizacyaModel::where('user_id',Auth::id())
                    ->where('id',$request->ImgId)
                    ->first();

        $DeleteImg->img = 'default.jfif';
        $DeleteImg->save();

        return response()->json($request->ImgId);
    }
}
