<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\KuplyuModel;
use App\KuplyuImgModel;
use App\User;
use App\MessagesModel;
use App\RegionList;
use Validator,Redirect,Response,File;


class KuplyuController extends RegionController
{

    public function CountDay()
    {
        // Count praduct limit Day
        date_default_timezone_set('Asia/Yerevan');
        $now  = time() - 30 * 60 * 60 *24;
        $time = date('Y-m-d h:i:s', $now);
          return $time;
    }


    public function index(Request $request)
    {
        $this->BuyAdvertising($request); // return check Region BuyAdvertising Kuplyu
        $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
        $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
        $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

        //Select Куплю praduct
        $ShowKuplyu = DB::table('buy_orders')->select('buy_orders.id','buy_orders.description','buy_orders.confirmation_date', 'img_buy_orders.img')
        ->join('img_buy_orders', 'img_buy_orders.buy_orders_id', '=', 'buy_orders.id')
        ->where('img_buy_orders.home_image', '=', '1')
        ->whereDate('buy_orders.confirmation_date', '>', $this->CountDay())->
        paginate(12);

            return view('kuplyu',['ShowKuplyu'=>$ShowKuplyu]);
    }

    public function FinelProduct($id,Request $request)
    {
         $this->BuyAdvertising($request); // return check Region BuyAdvertising
         $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
         $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
         $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

         // join kuplyu and users tables
         $Showkuplyu = DB::table('buy_orders')
         ->join('users','users.id','buy_orders.user_id')
         ->select('*','buy_orders.id as product_id')
         ->whereDate('buy_orders.confirmation_date', '>', $this->CountDay())
         ->where('buy_orders.id',$id)
         ->get();

        $ShowImg = KuplyuImgModel::where('buy_orders_id',$id)->get();

        // select Похожие Продукты
        $ShowSimilarProducts = DB::table('buy_orders')->select('buy_orders.id','buy_orders.description','buy_orders.confirmation_date', 'img_buy_orders.img')
        ->join('img_buy_orders', 'img_buy_orders.buy_orders_id', '=', 'buy_orders.id')
        ->where('img_buy_orders.home_image', '=', '1')
        ->whereDate('buy_orders.confirmation_date', '>', $this->CountDay())
        ->inRandomOrder()->limit(5)
        ->paginate(12);

        //Counter
        DB::table('buy_orders')->where('id', $id)->increment('counter');

      return view('finel_products',['Showkuplyu'=>$Showkuplyu,'ShowImg'=>$ShowImg,'ShowSimilarProducts' => $ShowSimilarProducts]);

    }

    public function OwnPage($id)
    {
        // Show ownpage kuplyu
        $ShowKuplyuOwnPage = KuplyuModel::select('id','confirmation_date','product_name','price')
                                          ->where('user_id',$id)
                                          ->whereDate('confirmation_date', '>', $this->CountDay())
                                          ->get();

         foreach($ShowKuplyuOwnPage as $value){

             $ShowImg = KuplyuImgModel::where('buy_orders_id',$value->id)
                                        ->where('home_image',1)
                                        ->first();

             $value->ShowImg = $ShowImg;
         }

         // Show kuplyu User info
         $ShowUser = User::find($id);

             return view('ownpage',['ShowKuplyuOwnPage' => $ShowKuplyuOwnPage,'ShowUser' => $ShowUser]);
    }

    public function SendMessages(request $request)
    {
        if(Auth::id() != $request->to_id)
        {

            if($request->hasFile('upload_file'))
            {
               foreach ($request->upload_file as  $value)
                {
                    $request->validate([
                        'upload_file' => 'max:2048',
                    ]);
                    $filename =  time().'.'.$value->getClientOriginalName();
                    $value->move(public_path('UploadFiles/'),$filename);
                    $data[] = $filename;
                }
            }

          if(isset($data) && !empty($data))
          {

            foreach ($data as  $ImgName)
            {
                $messages = new MessagesModel;

                $messages->files = $ImgName;
                $messages->product_type = 2;
                $messages->product_id = $request->product_id;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
            }

            if(!empty($request->massage))
            {
                $messages = new MessagesModel;
                $messages->massages = $request->massage;
                $messages->product_type = 2;
                $messages->product_id = $request->product_id;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
            }
          }else
          {
                $request->validate([
                    'massage' => 'required',
                ]);
                $messages = new MessagesModel;
                $messages->massages = $request->massage;
                $messages->product_type = 2;
                $messages->product_id = $request->product_id;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
          }
            // $messages = new MessagesModel;
            // $messages->massages = $request->massage;
            // if($request->hasFile('upload_file'))
            // {
            //   $messages->files = $filename;
            // }
            // $messages->product_type = 2;
            // $messages->product_id = $request->product_id;
            // $messages->from_id = Auth::id();
            // $messages->to_id = $request->to_id;
            // $messages->save();

            return redirect()->back()->with('success', 'Ваш запрос был успешно выполнен');
        }else{
            echo 'Ուղարկողի և ստացողի հասցեները չպետք է համընկնեն:';
        }
    }

    public function Kabinet()
    {
        $ShowKuplyu = DB::table('buy_orders')
                      ->select('*', 'buy_orders.id as KuplyuId')
                      ->join('img_buy_orders', 'img_buy_orders.buy_orders_id', '=', 'buy_orders.id')
                      ->where('img_buy_orders.home_image', '=', '1')
                      ->where('buy_orders.user_id','=',Auth::id())
                      ->get();

        $ShowRegionList = RegionList::all();



        return view('kabinet.kuplyu',compact('ShowKuplyu','ShowRegionList'));
    }

    public function AddKuplyu()
    {
        return view('add_abavlenia.add_kuplyu');
    }

    public function EditKuplyu(request $request, $id)
    {
                   //check image
                   if(!empty($request->file('img'))){

                    foreach($request->file('img') as  $name)
                    {

                        $quality        = 30;
                        $rand_name      = rand().'.'.$name->getClientOriginalName();
                        $tmp_name       =  $name->getPathName();
                        $location       = public_path('img/img_kuplyu/'.$rand_name);
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

                      // Add image db
                      if(!empty($rand_name))
                      {
                          $AddImg  = new KuplyuImgModel;
                          $AddImg->buy_orders_id = $id;
                          $AddImg->img           = str_replace(array('.png','.gif','.webp'),".jpeg",$rand_name);
                          $AddImg->save();
                      }
                    }

                }

        //Add Home Image
        if(!empty($request->chek))
        {

            $null = DB::table('img_buy_orders')->where('buy_orders_id',$id)->update(['home_image'=>0]);

            if(isset($null))
            {
                DB::table('img_buy_orders')->where('id',$request->chek)->update(['home_image'=>1]);
            }
        }



        $User    = User::where('id', '=', Auth::id())->first();

        $Edit    = KuplyuModel::where('id', '=', $id)->first();



        $ShowImg = KuplyuImgModel::where('buy_orders_id', '=', $id)->get();

      if(isset($request->confirm) && $request->confirm==1)
      {
        $Edit->product_name         = $request->product_name;
        $Edit->count                = $request->count;
        $Edit->price                = $request->price;
        $Edit->manufacturer_country = $request->manufacturer_country;
        $Edit->location             = $request->location;
        $Edit->website              = $request->website;
        $Edit->description          = $request->description;
        $Edit->phone_permission     = $request->phone_permission;
        $Edit->viber_permission     = $request->viber_permission;
        $Edit->whatsapp_permission  = $request->whatsapp_permission;
        $Edit->save();

      }

            return view('edit_abavlenia.edit_kuplyu',compact('Edit','User','ShowImg'));
    }

    public function DeleteImg(request $request)
    {
        $DeleteImg = KuplyuImgModel::where('id',$request->ImgId)
                                   ->first();

         // delete image
         if($DeleteImg->img != 'default.jfif')
         {
                 if(File::exists(public_path('img/img_kuplyu/'.$DeleteImg->img)))
                 {
                     File::delete(public_path('img/img_kuplyu/'.$DeleteImg->img));
                     $DeleteImg->delete();
                 }
         }

        return response()->json($request->ImgId);
    }
}
