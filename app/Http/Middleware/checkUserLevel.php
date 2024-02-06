<?php

namespace App\Http\Middleware;

use Closure;

class checkUserLevel
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
        $user_level = auth()->user()->user_level;
        switch($user_level){
            case "Admin" :
                return redirect()->to('/admin');
                break;
            case "User" :
                return redirect()->to('/user');
            break;
        }

        return abort(403);
    }
}
