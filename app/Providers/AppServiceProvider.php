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
            ['clients.create', 'clients.edit', 'counselors.create', 'counselors.edit', 'parishes.form'],
            'App\Http\ViewComposers\StateList'
        );

        \View::composer(
            ['counselors.form'],
            'App\Http\ViewComposers\ParishTypeahead'
        );

        \View::composer(
            ['visits.form'],
            'App\Http\ViewComposers\CounselorTypeahead'
        );

        \View::composer(
            ['visits.form', 'loans.form'],
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
