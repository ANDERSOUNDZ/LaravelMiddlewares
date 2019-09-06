<?php

namespace App\Http\Middleware;

use Closure;

class Capa3
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //INICIO - PASAR PARAMETROS A UN MIDDLEWARE

    public function handle(
    $request,
    Closure $next,
    
    //Inicio Agregar variables o parametros - Aqui nosotros podemos agregar datos o parametros que requiere para poder ejecutar o utilizar y pasar
    $edad 
   //Fin Agregar variables o parametros - Aqui nosotros podemos agregar datos o parametros que requiere para poder ejecutar o utilizar y pasar
    )
    {
        if($request->get('edad')<$edad){
            dd("Los menores de $edad años, no pueden pasar la Capa 3");
            //Despues hay que registrar la capa 3 en el Kernel (Http/Kernel)
        }




        return $next($request);
    }
    //FIN - PASAR PARAMETROS A UN MIDDLEWARE

}
