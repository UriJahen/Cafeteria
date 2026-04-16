<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertaLoginCorreo;
use Illuminate\Support\Facades\Cache;

class EnviarCorreo
{
    public function __construct()
    {
        //
    }

    public function handle(Login $event): void
    {
        //obtener la informacion del usuario en cuanto inicia sesion
        $user = $event->user;

        //Registrar el envio del correo en cache
        $registro = 'login_'.$user -> id;

        //evaluar si el usuario ya recibio un correo
        if(cache::has($registro)){
            return;
        }

        //Registrar envio de correo en el cache y borrarlo despues 
        Cache::put($registro, true, now()->addSeconds(10));

        Mail::to($user->email)->send(new AlertaLoginCorreo($user));
    }
}
