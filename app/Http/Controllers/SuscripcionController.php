<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EmailController;
use App\Suscripcion;
use App\Log;
use Illuminate\Http\Request;
use Exception;
use Mail; //Importante incluir la clase Mail, que será la encargada del envío


class SuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $user = Suscripcion::where('email', '=', $request['email'])->select('email')->get();
            if (count($user) == 0) {
                Suscripcion::insert([
                    'email' => $request['email'],
                    'id_Pago' => $request['id_Pago'], 'dias_Suscripcion' => $request['dias_Suscripcion']
                ]);
                $s = array(
                    'error' => false,
                    'mensaje' => 'Se ha insertado con éxtio.'
                );
                return $s;
            } else {
                Suscripcion::where('email', '=', $request['email'])
                    ->update([
                        'email' => $request['email'],
                        'id_Pago' => $request['id_Pago'], 'dias_Suscripcion' => $request['dias_Suscripcion'], 'active' => 0, 'start_Subcription_Date' => null, 'end_Subcription_Date' => null, 'id_Transaccion' => null, 'updated_at' => null
                    ]);
                $s = array(
                    'error' => false,
                    'mensaje' => 'Se ha actualizado la cuenta con éxtio.'
                );
                return $s;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
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
        try {
            $day = Suscripcion::where('id_Pago', '=', $request['id_Pago'])->select('dias_Suscripcion')->get();
            $upUser = Suscripcion::where('id_Pago', '=', $request['id_Pago'])
                ->update(['id_Transaccion' => $request['id_Transaccion'], 'active' => 1, 'start_Subcription_Date' => now(), 'end_Subcription_Date' =>
                now()->modify('+' . $day[0]->dias_Suscripcion . ' days')]);
            $s = array(
                'error' => false,
                'mensaje' => 'Ok.'
            );
            return $s;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * responsePAYU a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function responsepayu(Request $request)
    {


        Log::insert(['id_Transaccion' => $request['reference_pol'], 'state_Transaccion' => $request['state_pol'], 'fecha_Creacion' => now()]);

        try {
            if ($request['state_pol'] == 4) {
                $day = Suscripcion::where('id_Pago', '=', $request['reference_sale'])->select('dias_Suscripcion')->get();
                $upUser = Suscripcion::where('id_Pago', '=', $request['reference_sale'])
                    ->update(['id_Transaccion' => $request['reference_pol'], 'active' => 1, 'start_Subcription_Date' => now(), 'end_Subcription_Date' =>
                    now()->modify('+' . $day[0]->dias_Suscripcion . ' days')]);

                $email_User = Suscripcion::where('id_Pago', '=', $request['reference_sale'])->select('email', 'end_Subcription_Date')->get();

                $infoArray = array(
                    'email' => $email_User[0]->email,
                    'fecha' => date("d/m/Y", strtotime($email_User[0]->end_Subcription_Date)),
                    'descripcion' => $request['description'],
                );
                $info = json_encode($infoArray);

                EmailController::welcome($info);
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * valsuscripcion a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function valsuscripcion(Request $request)
    {

        $fecha = Suscripcion::where('email', '=', $request['email'])
            ->select('end_Subcription_Date', 'active')->get();
        if ($fecha[0]->active == 0) {
            $s = array(
                'error' => true,
                'mensaje' => 'Su cuenta está inactiva, lo invitamos a renovar su suscripción.'
            );
            return $s;
        } else {
            if (now() <= $fecha[0]->end_Subcription_Date) {
                $s = array(
                    'error' => false,
                    'mensaje' => 'Cuenta activa.'
                );
                return $s;
            } else {
                Suscripcion::where('email', '=', $request['email'])
                    ->update(['active' => 0]);
                $s = array(
                    'error' => true,
                    'mensaje' => 'Su suscripción finalizo, lo invitamos a renovarla.'
                );
                return $s;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Suscripcion $suscripcion)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscripcion $suscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscripcion $suscripcion)
    {
        //
    }
}
