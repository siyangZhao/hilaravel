<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Session;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
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
        if(Auth::check()){
            if(Auth::user()->is_admin == 1) 
            {
                return redirect(url('home/admin')); 
            }else {
                return $next($request);
            }
        }
        
        $returnInf = [];
        array_push($returnInf,'请您先登录');
        Session::flash('operationResult','am-alert-warning');
        Session::flash('returnInf',$returnInf);

        return view('layouts.home.login');
    }
}
