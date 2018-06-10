<?php

namespace App\Providers;

use Auth;
use View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../resources/assets/js' => public_path('js'),
            __DIR__.'/../../resources/assets/css' => public_path('css'),
        ], 'public');

        View::composer(
            ['layouts.address'],
            'App\Http\ViewComposers\StateList'
        );

        View::composer(
            ['counselors.form'],
            'App\Http\ViewComposers\ParishTypeahead'
        );

        View::composer(
            ['visits.form'],
            'App\Http\ViewComposers\CounselorTypeahead'
        );

        View::composer(
            ['visits.requests.form'],
            'App\Http\ViewComposers\ActionList'
        );

        View::composer(
            ['visits.form', 'loans.form', 'programs.form'],
            'App\Http\ViewComposers\ClientTypeahead'
        );

        Blade::if('verified', function() {
            if (Auth::user()) {
                return Auth::user()->isVerified();
            }
            return false;
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
