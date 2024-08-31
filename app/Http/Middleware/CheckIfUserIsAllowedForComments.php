<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfUserIsAllowedForComments
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $comment = $request->route('comment');

        if (!auth()->user()->is_admin && $comment->user_id !== auth()->id()) {

            return redirect()->route('home')->with('error', 'Unauthorized Access');
        }

        return $next($request);
    }
}
