<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;

class IsVacancyOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $vacancy = Vacancy::findOrFail($request->route('id'));

        if($vacancy->company->user_id==Auth::id() || Auth::user()->role=='admin'){
            return $next($request);
        }

        return redirect('/');
    }
}
