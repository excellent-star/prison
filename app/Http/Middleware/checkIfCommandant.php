<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class checkIfCommandant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {



        if ($request->session()->has('loggedUserId')){


            $check  = DB::table('users')->where('id', $request->session()->get('loggedUserId'))->first();

               if($check){

                       if($check->type!=1){

                            return back();
                       }
               }
        }else{

               return back();
        }





        return $next($request);




    }
}
