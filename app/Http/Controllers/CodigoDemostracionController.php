<?php

namespace App\Http\Controllers;

use App\codigoDemostracion;
use App\ValidarCodigo;
use App\Suscripcion;
use App\Http\Controllers\EmailController;
use Illuminate\Http\Request;
use App\Log;
use Exception;


class CodigoDemostracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    }   

    public function index(Request $request)
    {
        $valEmailCode =  ValidarCodigo::where('email', '=', $request['email'])
        ->select('code','email')->get();
        
        if(count($valEmailCode) == 0){


            $valEmailCodeGenerate =  ValidarCodigo::where('emailGenerado', '=', $request['email'])
        ->select('code','email')->get();
            
            if (count($valEmailCodeGenerate) == 0) {

                $valEmailUser = Suscripcion::where('email', '=', $request['email'])
            ->select('end_Subcription_Date')->get();

            if (count($valEmailUser) == 0) {

                $code = null;
                
                while($code == null ){
                    
                    $generarCodigo = CodigoDemostracionController::generarCodigo(6);
                    $valCode =  ValidarCodigo::where('code', '=', $generarCodigo)
                    ->select('code','email')->get();
                    if (count($valCode) == 0) {
                        $code = $generarCodigo;
                    }
                    
                }
                 

                ValidarCodigo::insert([
                    'email' => '',
                    'code' => $code,
                    'emailGenerado' => $request['email']
                ]);

                $infoArray = array(
                    'email' => $request['email'],
                    'codigo' => $code
                );

                $info = json_encode($infoArray);

                $envioCodigo = EmailController::codeDemo($info);  

                if ($envioCodigo == 'Ok') {
                    $s = array(
                        'error' => false,
                        'mensaje' => 'Te hemos enviado un correo electronico con el código.'
                    );
                    return $s;
                }else{
                    $s = array(
                        'error' => true,
                        'mensaje' => 'Ocurrio un error al enviar el código, verifica el correo electronico proporcionado.'
                    );
                    return $s;
                }
               

            }else {

                $s = array(
                    'error' => true,
                    'mensaje' => 'Lo sentimos, no se puede asignar un código promocional porque el usuario ya se encuentra registrado en nuestro sistema.'
                );
                return $s;
            }

            }else{

                $s = array(
                    'error' => true,
                    'mensaje' => 'Lo sentimos, ya se envío un código de demostración para este correo.'
                );
                return $s;
            }
            

        }else{

            $s = array(
                'error' => true,
                'mensaje' => 'Lo sentimos, ya se asigno un código de demostración para este correo.'
            );
            return $s;
           
        }

    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\codigoDemostracion  $codigoDemostracion
     * @return \Illuminate\Http\Response
     */
    public function show(codigoDemostracion $codigoDemostracion)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\codigoDemostracion  $codigoDemostracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, codigoDemostracion $codigoDemostracion)
    {
        //
    }

    
}
