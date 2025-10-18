<?php

namespace App\Providers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        View::composer(['dashboard', 'index'], function ($view) {
            $view->with([
                'doctorsCount' => Doctor::count(),
                'specialitiesCount' => Speciality::count(),
                'doctors' => Doctor::select('prenom', 'nom', 'speciality_id')->get(),
            ]);
        });
        Paginator::useBootstrapFive();
    }
}
