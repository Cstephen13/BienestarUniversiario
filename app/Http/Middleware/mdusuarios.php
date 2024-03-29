<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Laracasts\Flash\Flash;
class mdusuarios
{
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->ModuloUsuarios()){
            return $next($request);
        }else{
            Flash::error('Lo sentimos '. $this->auth->user()->primernombre. ' usted no posee permisos suficientes
             para acceder a este lugar de la pagina');
            return redirect()->route('index');
        };
    }
}
