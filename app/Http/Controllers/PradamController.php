<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\PradamModel;
use App\PradamImgModel;
use App\User;
use App\MessagesModel;
// use Symfony\Component\HttpFoundation\Session\Session;
// use Illuminate\Support\Facades\Session;
use Session;




class PradamController extends RegionController
{
    public function getDateWithMilliSeconds(){
        $micro_date = microtime();
        $date_array = explode(" ",$micro_date);
        $date       = date("Y-m-d H:i:s",$date_array[1]);
        return "Date: $date:" . $date_array[0]."<br>";
    }

    public function CountDay()
    {
        // Count praduct limit Day
        date_default_timezone_set('Asia/Yerevan');
        $now  = time() - 30 * 60 * 60 *24;
        $time = date('Y-m-d h:i:s', $now);
          return $time;
    }

    public function index(request $request)
    {
      //  echo $this->getDateWithMilliSeconds();

       $this->BuyAdvertising($request); // return check Region BuyAdvertising
       $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
       $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
       $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

       //Select Продам praduct
        $ShowPradam = DB::table('sell_orders')->select('sell_orders.id','sell_orders.description','sell_orders.confirmation_date', 'img_sell_orders.img')
        ->join('img_sell_orders', 'img_sell_orders.sell_orders_id', '=', 'sell_orders.id')
        ->where('img_sell_orders.home_image', '=', '1')
        ->whereDate('sell_orders.confirmation_date', '>', $this->CountDay())
        ->paginate(12);

            return view('pradam',['ShowPradam'=>$ShowPradam]);
      //  echo  $this->getDateWithMilliSeconds();
    }

    public function FinelProduct($id,Request $request)
    {
        $this->BuyAdvertising($request); // return check Region BuyAdvertising
        $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
        $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
        $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

        // join pradam and users tables
        $ShowPradam = DB::table('sell_orders')
                         ->join('users','users.id','sell_orders.user_id')
                         ->select('*','sell_orders.id as product_id')
                         ->whereDate('sell_orders.confirmation_date', '>', $this->CountDay())
                         ->where('sell_orders.id',$id)
                         ->get();

        $ShowImg = PradamImgModel::where('sell_orders_id',$id)->get();

        // select Похожие Продукты
        $ShowSimilarProducts = DB::table('sell_orders')->select('sell_orders.id','sell_orders.description','sell_orders.confirmation_date', 'img_sell_orders.img')
        ->join('img_sell_orders', 'img_sell_orders.sell_orders_id', '=', 'sell_orders.id')
        ->where('img_sell_orders.home_image', '=', '1')
        ->whereDate('sell_orders.confirmation_date', '>', $this->CountDay())
        ->inRandomOrder()->limit(5)
        ->paginate(12);

        //Counter
        DB::table('sell_orders')->where('id', $id)->increment('counter');

        return view('finel_products',['ShowPradam'=>$ShowPradam,'ShowImg'=>$ShowImg,'ShowSimilarProducts' => $ShowSimilarProducts]);


    }

    public function OwnPage($id)
    {
        // Show ownpage Pradam
        $ShowPradamOwnPage = PradamModel::select('id','confirmation_date','product_name','price')
                                        ->where('user_id',$id)
                                        ->whereDate('confirmation_date', '>', $this->CountDay())
                                        ->get();

         foreach($ShowPradamOwnPage as $value){

             $ShowImg = PradamImgModel::where('sell_orders_id',$value->id)
                                        ->where('home_image',1)
                                        ->first();

             $value->ShowImg = $ShowImg;
         }

         // Show Pradam User info
         $ShowUser = User::find($id);

             return view('ownpage',['ShowPradamOwnPage' => $ShowPradamOwnPage,'ShowUser' => $ShowUser]);
    }

    public function SendRequestMessages(request $request)
    {

        // if(Auth::id() != $request->to_id)
        // {
        //     $messages = new MessagesModel;
        //     $messages->massages = $request->message_request;

        //     $messages->product_type = 4;
        //     $messages->from_id = Auth::id();
        //     $messages->to_id = $request->to_id;
        //     $messages->save();

        // }else{
        //     echo 'Ուղարկողի և ստացողի հասցեները չպետք է համընկնեն:';
        // }

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
                $messages->product_type = 4;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
            }

            if(!empty($request->message_request))
            {
                $messages = new MessagesModel;
                $messages->massages = $request->message_request;
                $messages->product_type = 4;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
            }
          }else
          {
                $request->validate([
                    'message_request' => 'required',
                ]);
                $messages = new MessagesModel;
                $messages->massages = $request->message_request;
                $messages->product_type = 4;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
          }



            return redirect()->back()->with('success', 'Ваш запрос был успешно выполнен');

        }else{
            echo 'Ուղարկողի և ստացողի հասցեները չպետք է համընկնեն:';
        }
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
                $messages->product_type = 1;
                $messages->product_id = $request->product_id;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
            }

            if(!empty($request->massage))
            {
                $messages = new MessagesModel;
                $messages->massages = $request->massage;
                $messages->product_type = 1;
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
                $messages->product_type = 1;
                $messages->product_id = $request->product_id;
                $messages->from_id = Auth::id();
                $messages->to_id = $request->to_id;
                $messages->save();
          }



            return redirect()->back()->with('success', 'Ваш запрос был успешно выполнен');

        }else{
            echo 'Ուղարկողի և ստացողի հասցեները չպետք է համընկնեն:';
        }

    }

    public function Kabinet()
    {
        $ShowPradam = DB::table('sell_orders')
                      ->select('*')
                      ->join('img_sell_orders', 'img_sell_orders.sell_orders_id', '=', 'sell_orders.id')
                      ->where('img_sell_orders.home_image', '=', '1')
                      ->where('sell_orders.user_id','=',Auth::id())
                      ->get();

        return view('kabinet.pradam',compact('ShowPradam'));
    }

    public function AddPradam()
    {
        return view('add_abavlenia.add_pradam');
    }

    public function EditPradam()
    {
        return view('edit_abavlenia.edit_pradam');
    }
}
