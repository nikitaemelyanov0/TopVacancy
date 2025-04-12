<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $id = Auth::id();
            $currentuser = null;

            if ($id) {
                $currentuser = User::find($id);
            }

            // $ip = request()->ip();
            // $response = Http::get("http://ip-api.com/json/{$ip}?lang=ru");
            // $location = $response->json();
            // $view->with('location', $location);
            // $location['city']
            
            $view->with('currentuser', $currentuser);
        }); 
    }
}
