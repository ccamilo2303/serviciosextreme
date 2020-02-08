<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
class EnviarEmail extends Controller
{
    public function index()
    {
        $data['title'] = "This is Test Mail Tuts Make";

        Mail::send('emails.email', $data, function($message) {

            $message->to('cinextremecol@gmail.com', 'Receiver Name')

                ->subject('Tuts Make Mail');
        });

        if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
        }else{
            return response()->success('Great! Successfully send in your mail');
        }
    }
}
