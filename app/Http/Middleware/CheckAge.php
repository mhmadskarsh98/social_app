<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next , $value=20)
    {

        $user = $request->user();
        $bd = new Carbon($user->profile->birthday); //carbon change the bd date to object
        $age =Carbon::now()->diff($bd); // return object dateInterval
        $age->y; // y change object to year

        if($age->y < $value){
            abort(403,'you are child');
        }

        return $next($request);
    }
}
