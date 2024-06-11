<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Closure;

class ApiAuthorization
{
    public function handle(Request $request, Closure $next){
        //Simple authorization middleware, via api key
        if(!$request->header('Authorization')){
            return false;
        }

    // $key = Hash::make(env('API_KEY'));
       $key = env('API_KEY');
       $requestKey = $request->header('Authorization');
       
       if( $key == $requestKey){
            return $next($request);
       } else {
            return false;
       }
    }
}
