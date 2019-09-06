<?php

namespace App\Http\Middleware;

use Closure;

class Capa2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //INICIO - UTILIZANDO VARIOS MIDDLEWARES

            if(!$request->has('lastname')){
                //Aqui se podria utilizar o redireccionar a una pagina que diga
                //"usted no tiene permiso para ingresar a esta pagina, sitio, o contenido al que usted esta queriendo acceder"
                dd('La Capa 2 no deja pasar la peticion sin el Apellido');
                //El siguiente paso es registrar en el archivo Http/Kernel, en la funcion routeMiddleware
            }

        //INICIO - UTILIZANDO VARIOS MIDDLEWARES
        return $next($request);
    }
}
