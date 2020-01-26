<?php

namespace App\Http\Controllers;
use Mail;

use App\Http\Requests;


class EnviarEmail extends Controller
{
    public function index()
    {

        $data = array('name'=>"Virat Gandhi");
        Mail::send(['text'=>'mail'], $data, function($message) {
                echo 'ENTRAAA';
                $message->to('wwandresbeltran@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
            echo 'ENTRAAA 2';
                $message->from('cinextremecol@gmail.com','Virat Gandhi');
            echo 'ENTRAAA 3';
            });

        echo "Basic Email Sent. Check your inbox.";
    }

}
