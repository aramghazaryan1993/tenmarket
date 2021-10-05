<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $SocialNetworks = DB::table('social_networks')->first();

        View::composer('includes.home.footer', function($view) use($SocialNetworks) {
            $view->with('ShowSocialNetworks',$SocialNetworks);
            });

    }
}
