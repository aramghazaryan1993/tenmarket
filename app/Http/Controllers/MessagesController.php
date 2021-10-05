<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;
use View;
use App\MessagesModel;
use App\BlockUserModel;




class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('CountHomeMessages');
    }

    // Входящий
    public function Incoming()
    {


    $ShowIncomingPradam  = DB::select("select img, view, name, product_name, description, product_id, updated_at, m.from_id as user_id from sell_orders so
                           inner join
                           (select to_id, from_id,product_id,min(ifnull(view,0)) as view, product_type from messages where from_id<>".Auth::id()." and (from_id != ifnull(delete_id,-1) || to_id != ifnull(delete_id,-1)  )   group by from_id, to_id,product_id, product_type) m on so.id = m.product_id
                           inner join users u on u.id=m.from_id
                           where m.to_id=".Auth::id()." and m.product_type=1
                           order by view ASC
    ");




    $ShowIncomingKuplyu  = DB::select("  select img, view, name, product_name, description, product_id, updated_at, m.from_id as user_id from buy_orders so
                            inner join
                            (select to_id , from_id,product_id,min(ifnull(view,0)) as view, product_type from  messages where from_id<>".Auth::id()." and (from_id != ifnull(delete_id,-1) || to_id != ifnull(delete_id,-1)  ) group by from_id, to_id,product_id, product_type)  m on so.id = m.product_id
                            inner join users u on u.id=m.from_id
                            where m.to_id= ".Auth::id()." and m.product_type=2
                            order by view asc
                        ");

   $ShowIncomingTenOrders  = DB::select("select img, view, name, product_name, description, product_id, updated_at, m.from_id as user_id from ten_orders so
                            inner join
                            (select to_id , from_id,product_id,min(ifnull(view,0)) as view, product_type from  messages where from_id<>".Auth::id()." and (from_id != ifnull(delete_id,-1) || to_id != ifnull(delete_id,-1)  ) group by from_id, to_id,product_id, product_type)  m on so.id = m.product_id
                            inner join users u on u.id=m.from_id
                            where m.to_id= ".Auth::id()."
                            and m.product_type=3
                            order by view asc
                            ");

    //group by  u.id, m.from_id, m.to_id, m.product_type
    $ShowRequestmessages = DB::select("
        select DISTINCT u.id, u.name, u.img, u.updated_at, min(ifnull(view,0)) as view from messages m
        inner join users u on u.id=m.from_id where m.to_id=".Auth::id()." and m.product_type=4 and from_id<>".Auth::id()." and (from_id != ifnull(delete_id,-1) || to_id != ifnull(delete_id,-1)  ) and m.product_id IS NULL
        group by  m.from_id, m.to_id, m.product_type
        order by view ASC
    ");

   // dd($ShowRequestmessages);

        return view('messages.incoming',compact('ShowIncomingPradam','ShowIncomingKuplyu','ShowIncomingTenOrders','ShowRequestmessages'));
    }


        // Show Messages List Pradam
    public function IncomingReplyPradam($product_id,$message_user_id)
    {

        // Show Message Product
        $IncomingReplyProduct  = DB::select("select * from sell_orders se
                                 inner join img_sell_orders im on se.id= im.sell_orders_id
                                 inner join (select from_id, to_id, product_id, product_type from messages
                                            group by from_id, to_id, product_id, product_type)m on m.product_id=se.id
                                            where m.product_id=$product_id
                                            and im.home_image=1
                                            and m.to_id = ".Auth::id()."
                                            and m.from_id=$message_user_id
       ");

       $IncomingReplyProduct = $IncomingReplyProduct[0];

        // Show Message list
        $IncomingReplMessage = DB::select("	select u1.*,m.* from users u1
                                inner join messages m on m.from_id=u1.id
                                inner join users u2 on u2.id=m.to_id
                                where product_type=1 and  m.product_id=$product_id and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                and m.to_id = ".Auth::id()."))
                                order by m.created_at");

         // update vew
         foreach($IncomingReplMessage as $key => $value)
         {
            $UpdateMessagesId =  DB::table('messages')->where('product_type',1)->where('product_id',$product_id)->where('from_id',$message_user_id)->where('to_id',Auth::id())->update(['view' => 1]);
         }

         // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
         $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                                         ->where('block_user_id',$IncomingReplyProduct->from_id)
                                         ->first();

         // ինքնա ինձ քցել չյոռնի ցուցակի մեչ
         $HiBlockUser = BlockUserModel::where('user_id',$IncomingReplyProduct->from_id)
                                         ->where('block_user_id',Auth::id())
                                         ->first();

        return view('messages.incoming_reply',['IncomingReplyProductPradam' => $IncomingReplyProduct,'IncomingReplMessagePradam' => $IncomingReplMessage,'CheckBlockUser' => $CheckBlockUser,'HiBlockUser' => $HiBlockUser]);
    }

    public function DeleteMessageParadam($message_user_id,$url,$product_id)
    {

        $IncomingReplMessage = DB::select("	select u1.*,m.* from users u1
                                inner join messages m on m.from_id=u1.id
                                inner join users u2 on u2.id=m.to_id
                                where product_type=1 and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                and m.to_id = ".Auth::id()."))
                                order by m.created_at");


          // Delete Message
        foreach($IncomingReplMessage as $key => $value)
        {

            if($value->delete_id === null)
            {
              DB::table('messages')->where('delete_id',null)->where('product_type',1)->where('product_id',$product_id)->where('from_id',$value->from_id)->where('to_id',$value->to_id)->update(['delete_id' => Auth::id()]);
              DB::table('messages')->where('delete_id',null)->where('product_type',1)->where('product_id',$product_id)->where('from_id',$value->to_id)->where('to_id',$value->from_id)->update(['delete_id' => Auth::id()]);
            }

            if($value->delete_id != Auth::id())
            {

                $a = DB::table('messages')->where('delete_id',$message_user_id)->where('product_type',1)->where('product_id',$product_id)->where('from_id',$value->from_id)->where('to_id',$value->to_id)->delete();
                $b = DB::table('messages')->where('delete_id',$message_user_id)->where('product_type',1)->where('product_id',$product_id)->where('from_id',$value->to_id)->where('to_id',$value->from_id)->delete();

                if(!empty($a) || !empty($b))
                {
                    if(File::exists(public_path('UploadFiles/'.$value->files)))
                    {
                        File::delete(public_path('UploadFiles/'.$value->files));
                    }
                }
            }
        }


        if($url == 'IncomingReplyPradam')
        {
           return redirect('incoming');
        }else{
           return redirect('send');
        }

    }


    public function IncomingReplyMessagePradam(request $request)
    {
     // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
     $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                       ->where('block_user_id',$request->to_id)
                       ->first();



     if($CheckBlockUser  == null)
     {
        // if($request->hasFile('upload_file'))
        // {
        //     $request->validate([
        //         'upload_file' => 'max:2048',
        //     ]);
        //     $file = $request->file('upload_file');
        //     $filename =  time().'.'.$file->getClientOriginalName();
        //     $file->move(public_path('UploadFiles/'),$filename);
        // }

        // $messages = new MessagesModel;
        // $messages->massages = $request->send_name;
        // if($request->hasFile('upload_file'))
        // {
        //   $messages->files = $filename;
        // }
        // $messages->product_type = 1;
        // $messages->product_id = $request->product_id;
        // $messages->from_id = Auth::id();
        // $messages->to_id = $request->to_id;
        // $messages->save();
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
              $messages->product_type = 1;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

          $messages = new MessagesModel;
          if(!empty($request->send_name))
          {
              $messages->massages = $request->send_name;
              $messages->product_type = 1;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

        }else
        {
              $request->validate([
                  'send_name' => 'required',
              ]);
              $messages = new MessagesModel;
              $messages->massages = $request->send_name;
              $messages->product_type = 1;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
        }

    }

           return redirect('IncomingReplyPradam/'.$request->product_id.'/'.$request->to_id);

    }

        // Show Messages List Kuplyu
    public function IncomingReplyKuplyu($product_id,$message_user_id)
    {

         // Show Message Product
        $IncomingReplyProduct  = DB::select("select * from buy_orders se
                                 inner join img_buy_orders im on se.id= im.buy_orders_id
                                 inner join (select from_id, to_id, product_id, product_type from messages
                                            group by from_id, to_id, product_id, product_type)m on m.product_id=se.id
                                            where m.product_id=$product_id
                                            and im.home_image=1
                                            and m.to_id = ".Auth::id()."
                                            and m.from_id=$message_user_id
                                 ");


        $IncomingReplyProduct = $IncomingReplyProduct[0];

         // Show Message list
        $IncomingReplMessage = DB::select("	select u1.*,m.* from users u1
                               inner join messages m on m.from_id=u1.id
                               inner join users u2 on u2.id=m.to_id
                               where product_type=2 and m.product_id=$product_id and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                               and m.to_id = ".Auth::id()."))
                               order by m.created_at");


         // update view
         foreach($IncomingReplMessage as $key => $value)
         {
            // $UpdateMessagesId =  MessagesModel::firstOrNew(array('product_id' => $product_id, 'from_id' => $message_user_id,'to_id' => Auth::id()));
            $UpdateMessagesId =  DB::table('messages')->where('product_type',2)->where('product_id',$product_id)->where('from_id',$message_user_id)->where('to_id',Auth::id())->update(['view' => 1]);

         }

         // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
         $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                                         ->where('block_user_id',$IncomingReplyProduct->from_id)
                                         ->first();


         // Ստուգումա ինքնա ինձ քցել չյոռնի ցուցակի մեչ
         $HiBlockUser = BlockUserModel::where('user_id',$IncomingReplyProduct->from_id)
                                         ->where('block_user_id',Auth::id())
                                         ->first();

        return view('messages.incoming_reply',['IncomingReplyProductKuplyu' => $IncomingReplyProduct,'IncomingReplMessageKuplyu' => $IncomingReplMessage,'CheckBlockUser' => $CheckBlockUser,'HiBlockUser' => $HiBlockUser]);
    }

    public function IncomingReplyMessageKuplyu(request $request)
    {
         // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
     $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                       ->where('block_user_id',$request->to_id)
                       ->first();

     if($CheckBlockUser  == null)
     {
        if($request->hasFile('upload_file'))
        {
            // $request->validate([
            //     'upload_file' => 'max:2048',
            // ]);
            // $file = $request->file('upload_file');
            // $filename =  time().'.'.$file->getClientOriginalName();
            // $file->move(public_path('UploadFiles/'),$filename);
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

        /*
        $messages = new MessagesModel;
        $messages->massages = $request->send_name;
        if($request->hasFile('upload_file'))
        {
          $messages->files = $filename;
        }
        $messages->product_type = 2;
        $messages->product_id = $request->product_id;
        $messages->from_id = Auth::id();
        $messages->to_id = $request->to_id;
        $messages->save();
        */
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

          $messages = new MessagesModel;
          if(!empty($request->send_name))
          {
              $messages->massages = $request->send_name;
              $messages->product_type = 2;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

        }else
        {
              $request->validate([
                  'send_name' => 'required',
              ]);
              $messages = new MessagesModel;
              $messages->massages = $request->send_name;
              $messages->product_type = 2;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
        }

     }

           return redirect('incomingReplykuplyu/'.$request->product_id.'/'.$request->to_id);
    }


    public function DeleteMessageKuplyu($message_user_id,$url,$product_id)
    {
         // Show Message list
         $IncomingReplMessage = DB::select("select u1.*,m.* from users u1
                                inner join messages m on m.from_id=u1.id
                                inner join users u2 on u2.id=m.to_id
                                where product_type=2 and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                and m.to_id = ".Auth::id()."))
                                order by m.created_at");


          // Delete Message
          foreach($IncomingReplMessage as $key => $value)
          {

              if($value->delete_id === null)
              {
                DB::table('messages')->where('delete_id',null)->where('product_type',2)->where('product_id',$product_id)->where('from_id',$value->from_id)->where('to_id',$value->to_id)->update(['delete_id' => Auth::id()]);
                DB::table('messages')->where('delete_id',null)->where('product_type',2)->where('product_id',$product_id)->where('from_id',$value->to_id)->where('to_id',$value->from_id)->update(['delete_id' => Auth::id()]);
              }

              if($value->delete_id != Auth::id())
              {

                  $a = DB::table('messages')->where('delete_id',$message_user_id)->where('product_type',2)->where('product_id',$product_id)->where('from_id',$value->from_id)->where('to_id',$value->to_id)->delete();
                  $b = DB::table('messages')->where('delete_id',$message_user_id)->where('product_type',2)->where('product_id',$product_id)->where('from_id',$value->to_id)->where('to_id',$value->from_id)->delete();

                  if(!empty($a) || !empty($b))
                  {
                      if(File::exists(public_path('UploadFiles/'.$value->files)))
                      {
                          File::delete(public_path('UploadFiles/'.$value->files));
                      }
                  }
              }
          }

          if($url == 'incomingReplykuplyu')
          {
            return redirect('incoming');
          }else{
            return redirect('send');
          }
    }



     // Show Messages List Ten Orders
    public function IncomingReplyTenOrders($product_id,$message_user_id)
    {

         // Show Message Product
         $IncomingReplyProduct  = DB::select("select * from ten_orders se
                                    inner join img_ten_orders im on se.id= im.ten_orders_id
                                    inner join (select from_id, to_id, product_id, product_type from messages
                                                group by from_id, to_id, product_id, product_type)m on m.product_id=se.id
                                                where m.product_id=$product_id
                                                and im.home_image=1
                                                and m.to_id = ".Auth::id()."
                                                and m.from_id=$message_user_id
                                    ");

         $IncomingReplyProduct = $IncomingReplyProduct[0];


        // Show Message list
        $IncomingReplMessage = DB::select("	select u1.*,m.* from users u1
                                inner join messages m on m.from_id=u1.id
                                inner join users u2 on u2.id=m.to_id
                                where product_type=3 and m.product_id=$product_id and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                and m.to_id = ".Auth::id()."))
                                order by m.created_at");


         // update view
         foreach($IncomingReplMessage as $key => $value)
         {
           $UpdateMessagesId =  DB::table('messages')->where('product_type',3)->where('product_id',$product_id)->where('from_id',$message_user_id)->where('to_id',Auth::id())->update(['view' => 1]);
         }

          // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
         $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                                         ->where('block_user_id',$IncomingReplyProduct->from_id)
                                         ->first();

         // Ստուգումա ինքնա ինձ քցել չյոռնի ցուցակի մեչ
         $HiBlockUser = BlockUserModel::where('user_id',$IncomingReplyProduct->from_id)
                                         ->where('block_user_id',Auth::id())
                                         ->first();

        return view('messages.incoming_reply',['IncomingReplyProductTenOrders' => $IncomingReplyProduct,'IncomingReplMessageTenOrders' => $IncomingReplMessage,'CheckBlockUser' => $CheckBlockUser,'HiBlockUser' => $HiBlockUser]);
    }

    public function DeleteMessageTenOrders($message_user_id,$url,$product_id)
    {
        $IncomingReplMessage = DB::select("	select u1.*,m.* from users u1
                                inner join messages m on m.from_id=u1.id
                                inner join users u2 on u2.id=m.to_id
                                where product_type=3 and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                and m.to_id = ".Auth::id()."))
                                order by m.created_at");

          // Delete Message
          foreach($IncomingReplMessage as $key => $value)
          {

              if($value->delete_id === null)
              {
                DB::table('messages')->where('delete_id',null)->where('product_type',3)->where('product_id',$product_id)->where('from_id',$value->from_id)->where('to_id',$value->to_id)->update(['delete_id' => Auth::id()]);
                DB::table('messages')->where('delete_id',null)->where('product_type',3)->where('product_id',$product_id)->where('from_id',$value->to_id)->where('to_id',$value->from_id)->update(['delete_id' => Auth::id()]);
              }

              if($value->delete_id != Auth::id())
              {

                  $a = DB::table('messages')->where('delete_id',$message_user_id)->where('product_type',3)->where('product_id',$product_id)->where('from_id',$value->from_id)->where('to_id',$value->to_id)->delete();
                  $b = DB::table('messages')->where('delete_id',$message_user_id)->where('product_type',3)->where('product_id',$product_id)->where('from_id',$value->to_id)->where('to_id',$value->from_id)->delete();

                  if(!empty($a) || !empty($b))
                  {
                      if(File::exists(public_path('UploadFiles/'.$value->files)))
                      {
                          File::delete(public_path('UploadFiles/'.$value->files));
                      }
                  }
              }
          }

          if($url == 'incomingReplykuplyu')
          {
            return redirect('incoming');
          }else{
            return redirect('send');
          }
    }


    public function IncomingReplyMessageTenOrders(request $request)
    {
         // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
     $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                      ->where('block_user_id',$request->to_id)
                      ->first();

    if($CheckBlockUser  == null)
    {
        // if($request->hasFile('upload_file'))
        // {
        //     $request->validate([
        //         'upload_file' => 'max:2048',
        //     ]);
        //     $file = $request->file('upload_file');
        //     $filename =  time().'.'.$file->getClientOriginalName();
        //     $file->move(public_path('UploadFiles/'),$filename);
        // }

        // $messages = new MessagesModel;
        // $messages->massages = $request->send_name;
        // if($request->hasFile('upload_file'))
        // {
        //   $messages->files = $filename;
        // }
        // $messages->product_type = 3;
        // $messages->product_id = $request->product_id;
        // $messages->from_id = Auth::id();
        // $messages->to_id = $request->to_id;
        // $messages->save();

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
              $messages->product_type = 3;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

          $messages = new MessagesModel;
          if(!empty($request->send_name))
          {
              $messages->massages = $request->send_name;
              $messages->product_type = 3;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

        }else
        {
              $request->validate([
                  'send_name' => 'required',
              ]);
              $messages = new MessagesModel;
              $messages->massages = $request->send_name;
              $messages->product_type = 3;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
        }

    }
           return redirect('incomingReplyTenOrders/'.$request->product_id.'/'.$request->to_id);
    }


    public function IncomingReplyRequest($message_user_id)
    {


        // Show Message list
        $IncomingReplMessage = DB::select("	select u1.*,m.* from users u1
                                inner join messages m on m.from_id=u1.id
                                inner join users u2 on u2.id=m.to_id
                                where product_type=4 and  ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                and m.to_id = ".Auth::id()."))
                                order by m.created_at");
                //dd($IncomingReplMessage);


        // update view
        foreach($IncomingReplMessage as $key => $value)
        {
            $UpdateMessagesId =  DB::table('messages')->where('product_type',4)->where('from_id',$message_user_id)->where('to_id',Auth::id())->update(['view' => 1]);
        }

        // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
        $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                                        // ->where('block_user_id',$IncomingReplMessage[0]->to_id)
                                        ->first();

        // Ստուգումա ինքնա ինձ քցել չյոռնի ցուցակի մեչ
        $HiBlockUser = BlockUserModel::where('block_user_id',Auth::id())
        //->where('user_id',$IncomingReplyProduct->from_id)
                                        ->first();

                                return view('messages.incoming_reply',['IncomingReplMessageRequest' => $IncomingReplMessage,'CheckBlockUser' => $CheckBlockUser,'HiBlockUser' => $HiBlockUser]);
    }

    public function DeleteMessageRequest($message_user_id,$url)
    {


          // Show Message list
          $IncomingReplMessage = DB::select("	select u1.*,m.* from users u1
          inner join messages m on m.from_id=u1.id
          inner join users u2 on u2.id=m.to_id
          where product_type=4 and  ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
          and m.to_id = ".Auth::id()."))
          order by m.created_at");


        //   // Delete Message
        foreach($IncomingReplMessage as $key => $value)
        {

            if($value->delete_id === null)
            {

              DB::table('messages')->where('delete_id',null)->where('product_type',4)->where('from_id',$value->from_id)->where('to_id',$value->to_id)->update(['delete_id' => Auth::id()]);
              DB::table('messages')->where('delete_id',null)->where('product_type',4)->where('from_id',$value->to_id)->where('to_id',$value->from_id)->update(['delete_id' => Auth::id()]);
            }
           // dd($value->delete_id);
            if($value->delete_id != Auth::id())
            {

                $a = DB::table('messages')->where('delete_id',$message_user_id)->where('product_type',4)->where('from_id',$value->from_id)->where('to_id',$value->to_id)->delete();
                $b = DB::table('messages')->where('delete_id',$message_user_id)->where('product_type',4)->where('from_id',$value->to_id)->where('to_id',$value->from_id)->delete();

                if(!empty($a) || !empty($b))
                {
                    if(File::exists(public_path('UploadFiles/'.$value->files)))
                    {
                        File::delete(public_path('UploadFiles/'.$value->files));
                    }
                }
            }
        }


        if($url == 'IncomingReplyRequest')
        {
           return redirect('incoming');
        }else{
           return redirect('send');
        }

    }

     // Add Mesige Request
    public function IncomingReplyMessageRequest(request $request)
    {
         // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
     $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                      ->where('block_user_id',$request->to_id)
                      ->first();

    if($CheckBlockUser  == null)
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

          $messages = new MessagesModel;
          if(!empty($request->send_name))
          {
              $messages->massages = $request->send_name;
              $messages->product_type = 4;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

        }else
        {
              $request->validate([
                  'send_name' => 'required',
              ]);
              $messages = new MessagesModel;
              $messages->massages = $request->send_name;
              $messages->product_type = 4;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
        }

    }
           return redirect('SendReplyRequest/'.$request->to_id);
    }


    // Отправленные
    public function Send()
    {


        $ShowSendPradam = DB::select("	select img, view, name, product_name,from_id, description, product_id, updated_at, m.to_id as user_id from sell_orders so
                            inner join
                            (select to_id , from_id,product_id,min(ifnull(view,0)) as view, product_type from  messages
                            where to_id<>".Auth::id()."
                            group by to_id, from_id,product_id, product_type)  m on so.id = m.product_id
                            inner join users u on u.id=m.to_id
                            where m.from_id= ".Auth::id()."
                            and m.product_type=1
                            order by view asc");




        $ShowSendKuplyu = DB::select("	select img, view, name, product_name,from_id, description, product_id, updated_at, m.to_id as user_id from buy_orders so
                            inner join
                            (select to_id , from_id,product_id,min(ifnull(view,0)) as view, product_type from  messages where to_id<>".Auth::id()." group by to_id, from_id,product_id, product_type)  m on so.id = m.product_id
                            inner join users u on u.id=m.to_id
                            where m.from_id= ".Auth::id()."
                            and m.product_type=2
                            order by view asc");


        $ShowSendTenOrdres = DB::select("	select img, view, name, product_name,from_id, description, product_id, updated_at, m.to_id as user_id from ten_orders so
                                inner join
                                (select to_id , from_id,product_id,min(ifnull(view,0)) as view, product_type from  messages where to_id<>".Auth::id()." group by to_id, from_id,product_id, product_type)  m on so.id = m.product_id
                                inner join users u on u.id=m.to_id
                                where m.from_id= ".Auth::id()."
                                and m.product_type=3
                                order by view asc");

        $ShowRequestmessages = DB::select("
        select * from messages m
        inner join users u on u.id=m.from_id where m.from_id=".Auth::id()." and m.product_type=4 and to_id<>".Auth::id()." and m.delete_id IS NULL and m.product_id IS NULL group by m.product_type, m.to_id, m.from_id
    ");

   // dd($ShowRequestmessages);

        return view('messages.send',compact('ShowSendPradam','ShowSendKuplyu','ShowSendTenOrdres','ShowRequestmessages'));
    }

    public function SendReplyPradam($product_id,$message_user_id)
    {

         // Show Message Product
        $IncomingReplyProductPradam  = DB::select("select * from sell_orders se
                                        inner join img_sell_orders im on se.id= im.sell_orders_id
                                        inner join (select from_id, to_id, product_id, product_type from messages
                                                    group by from_id, to_id, product_id, product_type)m on m.product_id=se.id
                                                    where m.product_id=$product_id
                                                    and im.home_image=1
                                                    and m.from_id = ".Auth::id()."
                                                    and m.to_id=$message_user_id
       ");

       $IncomingReplyProductPradam=$IncomingReplyProductPradam[0];


         // Show Message list
        $IncomingReplMessagePradam = DB::select("	select u1.*,m.* from users u1
                                    inner join messages m on m.from_id=u1.id
                                    inner join users u2 on u2.id=m.to_id
                                    where product_type=1 and m.product_id=$product_id and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                    and m.to_id = ".Auth::id()."))
                                    order by m.created_at");


          // update view
          foreach($IncomingReplMessagePradam as $key => $value)
          {
             $UpdateMessagesId =  DB::table('messages')->where('product_type',1)->where('product_id',$product_id)->where('to_id',$message_user_id)->where('to_id',Auth::id())->update(['view' => 1]);
          }

           // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
         $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                           ->where('block_user_id',$IncomingReplyProductPradam->to_id)
                           ->first();


         // Ստուգումա ինքնա ինձ քցել չյոռնի ցուցակի մեչ
         $HiBlockUser = BlockUserModel::where('user_id',$IncomingReplyProductPradam->to_id)
                                         ->where('block_user_id',Auth::id())
                                         ->first();

        return view('messages.send_reply',compact('IncomingReplyProductPradam','IncomingReplMessagePradam','CheckBlockUser','HiBlockUser'));
    }


    public function SendReplyKuplyu($product_id,$message_user_id)
    {

         // Show Message Product
        $IncomingReplyProductKuplyu  = DB::select("select * from buy_orders se
                                        inner join img_buy_orders im on se.id= im.buy_orders_id
                                        inner join (select from_id, to_id, product_id, product_type from messages
                                                    group by from_id, to_id, product_id, product_type)m on m.product_id=se.id
                                                    where m.product_id=$product_id
                                                    and im.home_image=1
                                                    and m.from_id = ".Auth::id()."
                                                    and m.to_id=$message_user_id
                                    ");

       $IncomingReplyProductKuplyu=$IncomingReplyProductKuplyu[0];


         // Show Message list
        $IncomingReplMessageKuplyu = DB::select("	select u1.*,m.* from users u1
                                    inner join messages m on m.from_id=u1.id
                                    inner join users u2 on u2.id=m.to_id
                                    where product_type=2 and m.product_id=$product_id and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                    and m.to_id = ".Auth::id()."))
                                    order by m.created_at");


          // update view
          foreach($IncomingReplMessageKuplyu as $key => $value)
          {
             $UpdateMessagesId =  DB::table('messages')->where('product_type',2)->where('product_id',$product_id)->where('to_id',$message_user_id)->where('to_id',Auth::id())->update(['view' => 1]);
          }

         // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
         $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                           ->where('block_user_id',$IncomingReplyProductKuplyu->to_id)
                           ->first();

         // Ստուգումա ինքնա ինձ քցել չյոռնի ցուցակի մեչ
         $HiBlockUser = BlockUserModel::where('user_id',$IncomingReplyProductKuplyu->to_id)
                                         ->where('block_user_id',Auth::id())
                                         ->first();


        return view('messages.send_reply',compact('IncomingReplyProductKuplyu','IncomingReplMessageKuplyu','CheckBlockUser','HiBlockUser'));
    }

    public function SendReplyTenOrders($product_id,$message_user_id)
    {

         // Show Message Product
        $IncomingReplyProductTenOrders  = DB::select("select * from ten_orders se
                                            inner join img_ten_orders im on se.id= im.ten_orders_id
                                            inner join (select from_id, to_id, product_id, product_type from messages
                                                        group by from_id, to_id, product_id, product_type)m on m.product_id=se.id
                                                        where m.product_id=$product_id
                                                        and im.home_image=1
                                                        and m.from_id = ".Auth::id()."
                                                        and m.to_id=$message_user_id
                                        ");

       $IncomingReplyProductTenOrders=$IncomingReplyProductTenOrders[0];


         // Show Message list
        $IncomingReplMessageTenOrders = DB::select("	select u1.*,m.* from users u1
                                        inner join messages m on m.from_id=u1.id
                                        inner join users u2 on u2.id=m.to_id
                                        where product_type=3 and m.product_id=$product_id and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                        and m.to_id = ".Auth::id()."))
                                        order by m.created_at");


          // update view
          foreach($IncomingReplMessageTenOrders as $key => $value)
          {
             $UpdateMessagesId =  DB::table('messages')->where('product_type',3)->where('product_id',$product_id)->where('to_id',$message_user_id)->where('to_id',Auth::id())->update(['view' => 1]);
          }

         // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
         $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                           ->where('block_user_id',$IncomingReplyProductTenOrders->to_id)
                           ->first();

        // Ստուգումա ինքնա ինձ քցել չյոռնի ցուցակի մեչ
        $HiBlockUser = BlockUserModel::where('user_id',$IncomingReplyProductTenOrders->to_id)
                                     ->where('block_user_id',Auth::id())
                                     ->first();

        return view('messages.send_reply',compact('IncomingReplyProductTenOrders','IncomingReplMessageTenOrders','CheckBlockUser','HiBlockUser'));
    }


// request

    public function SendReplyRequest($message_user_id)
    {

         // Show Message list
        $SendReplMessageRequest = DB::select("	select u1.*,m.* from users u1
                                        inner join messages m on m.from_id=u1.id
                                        inner join users u2 on u2.id=m.to_id
                                        where product_type=4  and ((m.from_id=".Auth::id()." and m.to_id = $message_user_id) or (m.from_id = $message_user_id
                                        and m.to_id = ".Auth::id()."))
                                        order by m.created_at");



          // update view
          foreach($SendReplMessageRequest as $key => $value)
          {
            $UpdateMessagesId =  DB::table('messages')->where('product_type',4)->where('to_id',$message_user_id)->where('to_id',Auth::id())->update(['view' => 1]);
          }

         // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
         $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                           //->where('block_user_id',$IncomingReplyProductTenOrders->to_id)
                           ->first();

        // Ստուգումա ինքնա ինձ քցել չյոռնի ցուցակի մեչ
        $HiBlockUser = BlockUserModel::where('block_user_id',Auth::id())
                                     //->where('user_id',$IncomingReplyProductTenOrders->to_id)
                                     ->first();

        return view('messages.send_reply',compact('SendReplMessageRequest','SendReplMessageRequest','CheckBlockUser','HiBlockUser'));
    }


    // request

    public function SendReplyMessagePradam(request $request)
    {
        // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
     $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                       ->where('block_user_id',$request->to_id)
                       ->first();

    if($CheckBlockUser  == null)
    {
        // if($request->hasFile('upload_file'))
        // {
        //     $request->validate([
        //         'upload_file' => 'max:2048',
        //     ]);
        //     $file = $request->file('upload_file');
        //     $filename =  time().'.'.$file->getClientOriginalName();
        //     $file->move(public_path('UploadFiles/'),$filename);
        // }

        // $messages = new MessagesModel;
        // $messages->massages = $request->send_name;
        // if($request->hasFile('upload_file'))
        // {
        //   $messages->files = $filename;
        // }
        // $messages->product_type = 1;
        // $messages->product_id = $request->product_id;
        // $messages->from_id = Auth::id();
        // $messages->to_id = $request->to_id;
        // $messages->save();

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
              $messages->product_type = 1;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

          $messages = new MessagesModel;
          if(!empty($request->send_name))
          {
              $messages->massages = $request->send_name;
              $messages->product_type = 1;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

        }else
        {
              $request->validate([
                  'send_name' => 'required',
              ]);
              $messages = new MessagesModel;
              $messages->massages = $request->send_name;
              $messages->product_type = 1;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
        }

    }
           return redirect('sendReplyPradam/'.$request->product_id.'/'. $request->to_id);

    }

    public function SendReplyMessageKuplyu(request $request)
    {
        // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
     $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                      ->where('block_user_id',$request->to_id)
                      ->first();

    if($CheckBlockUser  == null)
    {
        // if($request->hasFile('upload_file'))
        // {
        //     $request->validate([
        //         'upload_file' => 'max:2048',
        //     ]);
        //     $file = $request->file('upload_file');
        //     $filename =  time().'.'.$file->getClientOriginalName();
        //     $file->move(public_path('UploadFiles/'),$filename);
        // }

        // $messages = new MessagesModel;
        // $messages->massages = $request->send_name;
        // if($request->hasFile('upload_file'))
        // {
        //   $messages->files = $filename;
        // }
        // $messages->product_type = 2;
        // $messages->product_id = $request->product_id;
        // $messages->from_id = Auth::id();
        // $messages->to_id = $request->to_id;
        // $messages->save();

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

          $messages = new MessagesModel;
          if(!empty($request->send_name))
          {
              $messages->massages = $request->send_name;
              $messages->product_type = 2;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

        }else
        {
              $request->validate([
                  'send_name' => 'required',
              ]);
              $messages = new MessagesModel;
              $messages->massages = $request->send_name;
              $messages->product_type = 2;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
        }
    }
           return redirect('sendReplyKuplyu/'.$request->product_id.'/'. $request->to_id);

    }

    public function SendReplyMessageTenOrders(request $request)
    {
        // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
     $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                      ->where('block_user_id',$request->to_id)
                      ->first();

    if($CheckBlockUser  == null)
    {
        // if($request->hasFile('upload_file'))
        // {
        //     $request->validate([
        //         'upload_file' => 'max:2048',
        //     ]);
        //     $file = $request->file('upload_file');
        //     $filename =  time().'.'.$file->getClientOriginalName();
        //     $file->move(public_path('UploadFiles/'),$filename);
        // }

        // $messages = new MessagesModel;
        // $messages->massages = $request->send_name;
        // if($request->hasFile('upload_file'))
        // {
        //   $messages->files = $filename;
        // }
        // $messages->product_type = 3;
        // $messages->product_id = $request->product_id;
        // $messages->from_id = Auth::id();
        // $messages->to_id = $request->to_id;
        // $messages->save();

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
              $messages->product_type = 3;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

          $messages = new MessagesModel;
          if(!empty($request->send_name))
          {
              $messages->massages = $request->send_name;
              $messages->product_type = 3;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

        }else
        {
              $request->validate([
                  'send_name' => 'required',
              ]);
              $messages = new MessagesModel;
              $messages->massages = $request->send_name;
              $messages->product_type = 3;
              $messages->product_id = $request->product_id;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
        }
    }
           return redirect('sendReplyTenOrders/'.$request->product_id.'/'. $request->to_id);

    }

    public function SendReplyMessageRequest(request $request)
    {
        // Check Block or Razblok user Ստուգումա ես եմ իրան քցել չյոռնի ցուցակի մեչ
     $CheckBlockUser = BlockUserModel::where('user_id',Auth::id())
                      ->where('block_user_id',$request->to_id)
                      ->first();

    if($CheckBlockUser  == null)
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

          $messages = new MessagesModel;
          if(!empty($request->send_name))
          {
              $messages->massages = $request->send_name;
              $messages->product_type = 4;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
          }

        }else
        {
              $request->validate([
                  'send_name' => 'required',
              ]);
              $messages = new MessagesModel;
              $messages->massages = $request->send_name;
              $messages->product_type = 4;
              $messages->from_id = Auth::id();
              $messages->to_id = $request->to_id;
              $messages->save();
        }
    }
           return redirect('SendReplyRequest/'.$request->to_id);

    }

    public function BlockUser(request $request)
    {
        $BlockUser                = new BlockUserModel;
        $BlockUser->user_id       = Auth::id();
        $BlockUser->block_user_id = $request->block_user_id;
        $BlockUser->type          = 1;
        $BlockUser->save();

        return back()->withInput();
    }

    public function RazblockUser(request $request)
    {
        $Razblock = BlockUserModel::where('user_id',Auth::id())
                                    ->where('block_user_id',$request->block_user_id)
                                    ->first();
        $Razblock->delete();

        return back()->withInput();
    }


}
