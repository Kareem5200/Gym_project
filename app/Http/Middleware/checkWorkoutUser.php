<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkWorkoutUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if($user_id = $request->route('user_id')){

            $user=User::find($user_id);
        }else{
            $user = $request->route('user');
        }

        if(!$user){
            abort(403);
        }

        $membership_exists = $user->withActiveMemberships()->categoryPlan('workoutPlan')->exists();

        if(!$membership_exists){
            abort(403);
        }

        return $next($request);
    }
}
