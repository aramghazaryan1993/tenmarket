<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MixedDataModel;
use Illuminate\Support\Facades\Mail;
use Redirect,Response,DB,Config;
use App\Post;

class MixedDataController extends RegionController
{

    public function Query($request)
    {
        $this->BuyAdvertising($request); // return check Region BuyAdvertising
        $this->SellAdvertising($request); // return check Region SellAdvertising Pradam
        $this->TenOrdersAdvertising($request); // return check Region TenOrdersAdvertising Заявки на изготовление ТЭНов
        $this->ArganizacyaAdvertising($request); // return check Region ArganizacyaAdvertising Список организаций

        $MixedData = MixedDataModel::all();
        return $MixedData;
    }

    public function Contact(request $request)
    {
        $ShowContact = $this->Query($request);

        if(count($request->all())>0){

                $this->validate($request, [
                    'full_name'     =>  'required',
                    'title'         =>  'required',
                    'phone'         =>  'required|digits:10',
                    'email'         =>  'required|email',
               ]);


                $data = array('name'=>$request->full_name,'phone'=>$request->phone,'comment'=>$request->comment,'email'=>$request->email);
                $mail =  Mail::send('mail', $data, function($message)use ($request) {
                $message->to('a480011@mail.ru', 'Tutorials Point')->subject($request->title);
                $message->from('aramghazaryan2@gmail.com','tenmarket');
                return back()->with('success', 'Спасибо, ваш запрос отправлен');
         });

       }

          return view('contact',['ShowContact' => $ShowContact]);
    }

    public function PrivacyPolicy(request $request)
    {
      $ShowPrivacyPolicy= $this->Query($request);
          return view('privacypolicy',['ShowPrivacyPolicy' => $ShowPrivacyPolicy]);
    }

    public function Reklama(request $request)
    {
        $ShowReklama= $this->Query($request);
            return view('reklama',['ShowReklama' => $ShowReklama]);
    }
}
