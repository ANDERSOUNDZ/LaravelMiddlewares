<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        //INICIO REGISTRO DE MIDDLEWARE DE MANERA GLOBAL - para utilizar los middlewares debemos registrar, y se lo hace de esta manera:
            
            //\App\Http\Middleware\Capa1::class,
        
        //FIN REGISTRO DE MIDDLEWARE DE MANERA GLOBAL - para utilizar los middlewares debemos registrar, y se lo hace de esta manera:
        
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],

        //INICIO - Creando nuestro propio  grupo de middlewares
        
        'nankingsgrupomiddlewares'=>[
            //Utilizo los middlewares que ya utilize para los ejemplos anteriores (middleware global , ruta y varios)
            'middlewarenankings' => \App\Http\Middleware\Capa1::class,
            'nuevomiddlewarenankings'=> \App\Http\Middleware\Capa2::class,

        ]
            
            
        //FIN - Creando nuestro propio grupo de middlewares

    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // INICIO -  Middleware Rutas especificas
        
        //Podemos asignarle un nombre que nosotros deseemos, de esta manera 
            
            //'middlewarenankings' => \App\Http\Middleware\Capa1::class,
        
        // FIN -  Middleware Rutas especificas

        //INICIO - VARIOS MIDDLEWARES

            //'nuevomiddlewarenankings'=> \App\Http\Middleware\Capa2::class,

        //FIN - VARIOS MIDDLEWARES

        //INICIO - REGISTRANDO MIDDLEWARE CON PARAMETROS

            'edadnankings'=> \App\Http\Middleware\Capa3::class,

        //FIN - REGISTRANDO MIDDLEWARE CON PARAMETROS
    ];

    /**
     * The priority-sorted list of middleware.
     *
     * This forces non-global middleware to always be in the given order.
     *
     * @var array
     */
    protected $middlewarePriority = [
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\Authenticate::class,
        \Illuminate\Routing\Middleware\ThrottleRequests::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Illuminate\Auth\Middleware\Authorize::class,
    ];
}
