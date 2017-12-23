<?php

namespace App\Providers;

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

        \View::composer(
            ['visits.edit', 'visits.create'],
            'App\Http\ViewComposers\CounselorTypeahead'
        );

        \View::composer(
            ['visits.edit', 'visits.create'],
            'App\Http\ViewComposers\ClientTypeahead'
        );

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
