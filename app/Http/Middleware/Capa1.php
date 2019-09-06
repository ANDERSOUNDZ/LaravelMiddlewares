<?php

namespace App\Http\Middleware;

use Closure;

class Capa1
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
        //INICIO FUNCION ESPECIAL dd - Muestra informacion de determinado dato o variable que nosotros le pasemos entre parentesis()
        //Esto funciona para que haya autenticacion, que verifique que el usuario esta identificado en nuestro sitio o aplicacion
        //o tambien para que se sepa que si tiene autorizacion de pasar yenviar datos o etc.., son puertas que tienene que pasar para tener informacion 
            //dd('Se detuvo la Peticion en Capa1');
        //FIN FUNCION ESPECIAL dd - 

        //INICIO FUNCION ESPECIAL dd - Muestra informacion determinada, puertas que tiene que pasar ejercicio con logica
        if(!$request->has('name')){
            dd('La Capa 1, no deja pasar peticiones sin el nombre');
        }
        //REVISAR EN CHROME: ingresar en el brower esta ruta para ver cambios : http://127.0.0.1:8000/?name="Ander"
        //FIN FUNCION ESPECIAL dd - Muestra informacion determinada, puertas que tiene que pasar ejercicio con logica

        return $next($request);
    }
}
