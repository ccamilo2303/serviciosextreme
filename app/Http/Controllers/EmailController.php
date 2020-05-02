<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío

class EmailController extends Controller
{
  
    public function contact($request){

        $info = json_decode($request, true);

        $subject = "Nos contactaron!";
        $for = "cinextremecol@gmail.com";
        Mail::send('emailFormContact',$info, function($msj) use($subject,$for){
            $msj->from("cinextremecol@gmail.com","Cinextreme Col");
            $msj->subject($subject);
            $msj->to($for);
        });
        return 'Ok';
    }

    public static function welcome($request){
        
        $info = json_decode($request, true);

        $subject = "Bienvenido a Cinextreme";
        $for = $info['email'];
        Mail::send('emailWelcome',$info, function($msj) use($subject,$for){
            $msj->from("cinextremecol@gmail.com","Cinextreme Col");
            $msj->subject($subject);
            $msj->to($for);
        });
        return  'Ok'; 
    }

    public function resetPassword($request){
        
        $info = json_decode($request, true);

        $subject = "Restablecimiento de contraseña";
        $for = $info->resetPass;
        Mail::send('emailPasswordReset',$info, function($msj) use($subject,$for){
            $msj->from("cinextremecol@gmail.com","Cinextreme Col");
            $msj->subject($subject);
            $msj->to($for);
        });
        return "Ok"; 
    }

  

    public function movie($request){
        
        $info = json_decode($request, true);

        $subject = "Solicitud de película";
        $for = "cinextremecol@gmail.com";
        Mail::send('movie',$info, function($msj) use($subject,$for){
            $msj->from("cinextremecol@gmail.com","Cinextreme Col");
            $msj->subject($subject);
            $msj->to($for);
        });


        return "Ok";
        
        
    }

    public static function welcomeDemo($request){
        
        $info = json_decode($request, true);

        $subject = "Bienvenido a Cinextreme";
        $for = $info['email'];
        Mail::send('emailWelcomeDemo',$info, function($msj) use($subject,$for){
            $msj->from("cinextremecol@gmail.com","Cinextreme Col");
            $msj->subject($subject);
            $msj->to($for);
        });


        return "Ok";
        
        
    }

    

}
