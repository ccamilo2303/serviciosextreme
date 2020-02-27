<?php

namespace App\Http\Controllers;

use App\ValidarCodigo;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
Use Exception;

class ValidarCodigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        try{
            $validacion = ValidarCodigo::where('code','=', $request['code'])
            ->select('code','email')->get();
            if(count($validacion) == 0){
                $error = array(
                    'error' => true,
                    'mensaje' => 'El código es inválido.'
                );
                return $error;
            }   
            else{
                if($validacion[0]->email == null){
                    $up = ValidarCodigo::where('code','=', $request['code'])
                    ->update(['email' => $request['email']]);
                    $s = array(
                        'error' => false,
                        'mensaje' => 'Okay.'
                    );
                    return $s;  
                }
                else{
                    $error = array(
                        'error' => true,
                        'mensaje' => 'El código ya está en uso.'
                    );
                    return $error;
                }
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($codigo)
    {
        $upCode = ValidarCodigo::where('code', '=', $codigo)
            ->update(['email' => '']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ValidarCodigo  $validarCodigo
     * @return \Illuminate\Http\Response
     */
    public function show(ValidarCodigo $validarCodigo)
    {
        //
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ValidarCodigo  $validarCodigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ValidarCodigo $validarCodigo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ValidarCodigo  $validarCodigo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ValidarCodigo $validarCodigo)
    {
        //
    }
}
