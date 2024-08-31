<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfUserIsAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $post = $request->route('post');

        if (!auth()->user()->is_admin && $post->user_id !== auth()->id()) {

            return redirect()->route('home')->with('error', 'Unauthorized Access');
        }

        return $next($request);
    }
}
