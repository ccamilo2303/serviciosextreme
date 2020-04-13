<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío

class EmailController extends Controller
{
  
    public function contact(Request $request){
        $subject = "Nos contactaron!";
        $for = "cinextremecol@gmail.com";
        Mail::send('emailFormContact',$request->all(), function($msj) use($subject,$for){
            $msj->from("cinextremecol@gmail.com","Cinextreme Col");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back();
    }

    public function welcome(Request $request){
        
        $subject = "Bienvenido a Cinextreme";
        $for = $request->email;
        Mail::send('emailWelcome',$request->all(), function($msj) use($subject,$for){
            $msj->from("cinextremecol@gmail.com","Cinextreme Col");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back(); 
    }

    public function resetPassword(Request $request){
        
        $subject = "Bienvenido a Cinextreme";
        $for = $request->resetPass;
        Mail::send('emailWelcome',$request->all(), function($msj) use($subject,$for){
            $msj->from("cinextremecol@gmail.com","Cinextreme Col");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back(); 
    }

}