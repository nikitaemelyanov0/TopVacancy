<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

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
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
        
        View::composer('*', function ($view) {
            $id = Auth::id();
            $currentuser = null;

            if ($id) {
                $currentuser = User::find($id);
            }

            $ip = $_SERVER['REMOTE_ADDR'];
            
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]; 
            }            
            if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                $ip = 'Не удалось получить IP';
            }
            $response = Http::get("http://ip-api.com/json/{$ip}?lang=ru");
            $location = $response->json();

            $view->with('location', $location);            
            $view->with('currentuser', $currentuser);
        }); 
    }
}
