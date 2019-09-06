<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//INICIO - Middleware ejemplo manera global

Route::get('/', function () {
    return 'hi ' . request('name');
});

//Si creamos otra peticion , otra ruta quiere acceder, no va a poder porque se utilizo un middleware de manera global
//y esta necesita de un parametro( que en este caso es el nombre) para que pase y deje entrara a la pagina que queremos llegar
//o al dato que queremos conocer, o a la ruta que queremos llegar, asi trabaja un middleware de manera GLOBALÑ
    Route::get('chao', function(){
        return 'chao';
    });

//FIN - Middleware ejemplo manera global

//INICIO - Aplicando Middleware

    Route::get('middleware', function(){
        return 'hi ' . request('name') . ' Mensaje de confirmacion: !Se aplico el middleware!';

    })
    //Se aplica con el nombre que se le puso en el archivo que esta en /HTTP/Kernel (en $routeMiddleare)

    ->middleware('middlewarenankings');

    //Si queremos pasar y ver esa ruta o pagina debemos poner de esta manera en el navegador: http://127.0.0.1:8000/middleware/?name="Ander"
    ;
//FIN - Aplicando Middleware

//  INICIO - Apolicando varios middlewares

    route::get('variosmiddleware', function(){
        return 'hi ' . request('name').' '. request('lastname');
    })
    //Aplicando varios middlewares
    ->middleware(
        //Puedo utilizar un Array, donde le digo que primero pasa por la primera puerta en este caso el nombre, y la segunda puerta es el apellidop
        //aqui los nombres estan asignados como yo queria pero todos terminan en nankings xdxd
        //osea, aqui van los nombres de los middlewares
        ['middlewarenankings','nuevomiddlewarenankings']
        )
        //Para revisar el cambio que existio basta con utilizar esta ruta en el navegador: http://127.0.0.1:8000/variosmiddleware/?name="Ander"
        //Despues agregamos el apellido y ahi si se muestra el mensaje completo con esta ruta: http://127.0.0.1:8000/variosmiddleware/?name="Ander"&lastname="Chanchay"
    ;

//  FIN - Apolicando varios middlewares

//INICIO - Grupos de middlewares

Route::get('grupomiddleware', function (){

    return 'hi ' . request('name').' '. request('lastname');
    }
)
//Aplicando Grupo de middleware
->middleware(
    //En vez de nombrar los middlewares que tenemos, mejor utilizamos el nombre del grupo de middleware que ya nombramos en el Kernel
    // y asi pasan por todas las capas de seguridad
    ['nankingsgrupomiddlewares']
    )
    //Para revisar los cambios hay que ir
    //1: ruta : http://127.0.0.1:8000/grupomiddleware/?name="Ander" (Esta pasa por el middleware de la Capa 1)
    //2: ruta : http://127.0.0.1:8000/grupomiddleware/?name="Ander"&lastname="Chanchay" (Este pasa por el middleware de la Capa 2)
;

//FIN - grupos de middlewares

//INICIO - Creando ruta con middleware con parametros, y tambien agregandolo con grupo de middleware

Route::get('middlewareparametro',function (){
    return 'hi ' . request('name').' '. request('lastname').', Tu edad es '.request('edad');
})
//Agregando middleware, Agregando grupo de middleware con middleware con parametro
->middleware(['nankingsgrupomiddlewares','edadnankings:18'])
//Para revisar los cambios hay que ir:
//1. http://127.0.0.1:8000/middlewareparametro/?name="Ander"
//2. http://127.0.0.1:8000/middlewareparametro/?name="Ander"&lastname="Chanchay"
//3. http://127.0.0.1:8000/middlewareparametro/?name="Ander"&lastname="Chanchay"&edad=18
;

//FIN - Creando ruta con middleware con parametros, y tambien agregandolo con grupo de middleware