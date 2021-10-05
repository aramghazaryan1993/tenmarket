<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class YuridicheskoyeController extends Controller
{
    public function SendContact()
    {
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
           $message->to('aramghazaryansoft@gmail.com', 'Tutorials Point')->subject
              ('Laravel HTML Testing Mail');
           $message->from('49eb4c9edb-470dd0@inbox.mailtrap.io','Virat Gandhi');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
}
