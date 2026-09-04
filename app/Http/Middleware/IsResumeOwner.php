<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;

class IsResumeOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $resume = Resume::findOrFail($request->route('id'));

        if($resume->user_id==Auth::id() || Auth::user()->role=='admin'){
            return $next($request);
        }

        return redirect('/');
    }
}
