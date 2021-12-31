<?php

namespace App\Providers;

use App\Models\Loans\LoanProducts;
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
        $loan_products = LoanProducts::all() ;
        \view()->share('loan_lists',$loan_products);
    }
}
