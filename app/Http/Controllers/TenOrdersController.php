<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\TenOrdersModel;
use App\TenOrdersImgModel;
use App\MessagesModel;
use App\User;



class TenOrdersController extends RegionController
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
         $this->BuyAdvertising($request); // return check Region BuyAdvertising
         $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
         $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
         $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

        //Select Заявки на изготовление ТЭНов praduct
        $ShowTenOrders = DB::table('ten_orders')->select('ten_orders.id','ten_orders.description','ten_orders.confirmation_date', 'img_ten_orders.img')
        ->join('img_ten_orders', 'img_ten_orders.ten_orders_id', '=', 'ten_orders.id')
        ->where('img_ten_orders.home_image', '=', '1')
        ->whereDate('ten_orders.confirmation_date', '>', $this->CountDay())
        ->paginate(12);

          return view('tenorders',['ShowTenOrders'=>$ShowTenOrders]);
    }

    public function FinelProduct($id,Request $request)
    {
        $this->BuyAdvertising($request); // return check Region BuyAdvertising
        $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
        $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
        $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

            // join Заявки на изготовление ТЭНов and users tables
        $ShowTenOrders = DB::table('ten_orders')
        ->join('users','users.id','ten_orders.user_id')
        ->select('*','ten_orders.id as product_id')
        ->whereDate('ten_orders.confirmation_date', '>', $this->CountDay())
        ->where('ten_orders.id',$id)
        ->get();

        $ShowImg = TenOrdersImgModel::where('ten_orders_id',$id)->get();

        // select Заявки на изготовление ТЭНов
        $ShowSimilarProducts = DB::table('ten_orders')->select('ten_orders.id','ten_orders.description','ten_orders.confirmation_date', 'img_ten_orders.img')
        ->join('img_ten_orders', 'img_ten_orders.ten_orders_id', '=', 'ten_orders.id')
        ->where('img_ten_orders.home_image', '=', '1')
        ->whereDate('ten_orders.confirmation_date', '>', $this->CountDay())
        ->inRandomOrder()->limit(5)
        ->paginate(12);

         //Counter
         DB::table('ten_orders')->where('id', $id)->increment('counter');

            return view('finel_products',['ShowTenOrders'=>$ShowTenOrders,'ShowImg'=>$ShowImg,'ShowSimilarProducts' => $ShowSimilarProducts]);
    }

    public function OwnPage($id)
    {
        // Show ownpage TenOrders
        $ShowTenOrdersOwnPage = TenOrdersModel::select('id','confirmation_date','product_name','price')
                                                ->where('user_id',$id)
                                                ->whereDate('confirmation_date', '>', $this->CountDay())
                                                ->get();

         foreach($ShowTenOrdersOwnPage as $value){

             $ShowImg = TenOrdersImgModel::where('ten_orders_id',$value->id)
                                           ->where('home_image',1)
                                           ->first();

             $value->ShowImg = $ShowImg;
         }

         // Show TenOrders User info
         $ShowUser = User::find($id);

             return view('ownpage',['ShowTenOrdersOwnPage' => $ShowTenOrdersOwnPage,'ShowUser' => $ShowUser]);
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
               // $file = $request->file('upload_file');
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
                $messages->product_type = 3;
                $messages->product_id = $request->product_id;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
            }

            $messages = new MessagesModel;
            if(!empty($request->massage))
            {
                $messages->massages = $request->massage;
                $messages->product_type = 3;
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
                $messages->product_type = 3;
                $messages->product_id = $request->product_id;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
          }

        // if(Auth::id() != $request->to_id)
        // {
        //     if($request->hasFile('upload_file'))
        //     {
        //       $request->validate([
        //           'upload_file' => 'max:2048',
        //       ]);
        //       $file = $request->file('upload_file');
        //       $filename =  time().'.'.$file->getClientOriginalName();
        //       $file->move(public_path('UploadFiles/'),$filename);
        //     }

        //     $messages = new MessagesModel;
        //     $messages->massages = $request->massage;
        //     if($request->hasFile('upload_file'))
        //     {
        //       $messages->files = $filename;
        //     }
        //     $messages->product_type = 3;
        //     $messages->product_id = $request->product_id;
        //     $messages->from_id = Auth::id();
        //     $messages->to_id = $request->to_id;
        //     $messages->save();

            return redirect()->back()->with('success', 'Ваш запрос был успешно выполнен');

        }else{
            echo 'Ուղարկողի և ստացողի հասցեները չպետք է համընկնեն:';
        }
    }


    public function Kabinet()
    {
        $ShowTenOrders = DB::table('ten_orders')
                        ->select('*')
                        ->join('img_ten_orders', 'img_ten_orders.ten_orders_id', '=', 'ten_orders.id')
                        ->where('img_ten_orders.home_image', '=', '1')
                        ->where('ten_orders.user_id','=',Auth::id())
                        ->get();

        return view('kabinet.tenorders',compact('ShowTenOrders'));
    }

    public function AddTenOrders()
    {
        return view('add_abavlenia.add_tenordres');
    }

    public function EditTenOrders()
    {
        return view('edit_abavlenia.edit_tenordres');
    }
}
