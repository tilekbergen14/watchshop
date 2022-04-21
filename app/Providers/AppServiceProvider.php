<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Builder::macro('whereLike', function($attribute, $searchTerms) {
            foreach($searchTerms as $searchTerm) {
               $this->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
            }
            return $this;
         });
         Paginator::useBootstrap();
    }
}
