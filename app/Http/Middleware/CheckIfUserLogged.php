<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfUserLogged
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

        if (!$request->session()->has('loggedUserId') && ($request->path() !='/')){


              return redirect('/')->with('fail','vous devez vous connecter !');
        }

        if($request->session()->has('loggedUserId') && ($request->path() =='/')){


               return back();
        }

        // return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
        // ->header('Pragma','no-cache')
        // ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');

        // return $next($request);

        $response = $next($request);

    $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');

        $response->headers->set('Pragma','no-cache');

        $response->headers->set('Expires','Sun, 02 Jan 1990 00:00:00 GMT');

        return $response;
    }
}
