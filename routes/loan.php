<?php

use App\Http\Controllers\Dashboard\Loans\LoanEligibilityController;
use App\Http\Controllers\Dashboard\Loans\LoanFeaturesController;
use App\Http\Controllers\Dashboard\Loans\LoanFQAController;
use App\Http\Controllers\Dashboard\Loans\LoanProductsController;
use App\Http\Controllers\Website\Loans\LoanApplicationsController;
use App\Http\Controllers\Website\Loans\LoanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Loan Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
| LOANS
*/

Route::group([
    'prefix' => 'chalom/loan',
], function () {
    Route::get('/list', [LoanController::class, 'index'])->name('loan.index');
    Route::get('/calculator', [LoanController::class, 'calculator'])->name('loan.calculator');
    Route::get('/eligibility', [LoanController::class, 'eligibility'])->name('loan.eligibility');
}
);


/*
| ADMIN
*/


Route::group([
    'prefix' => 'loan/apply',
], function () {
    Route::get('/', [LoanApplicationsController::class, 'apply'])->name('loan.apply');
    Route::post('/save/details', [LoanApplicationsController::class, 'save'])->name('loan.save');
    Route::post('/finish/{loan}/{user}', [LoanApplicationsController::class, 'finish'])->name('loan.finish');
    Route::post('/returning', [LoanApplicationsController::class, 'returningCustomer'])->name('loan.returning.customer');
    Route::post('/new', [LoanApplicationsController::class, 'newCustomer'])->name('loan.new.customer');
    Route::get('/show/{loan}', [LoanApplicationsController::class, 'show'])->name('loan.show')->middleware('auth');
    Route::post('/approve/{loan}', [LoanApplicationsController::class, 'approve'])->name('loan.approve');
    Route::get('/cancel/{loan_id}', [LoanApplicationsController::class, 'cancel'])->name('loan.cancel');
    Route::post('/state/change/{loan}', [LoanApplicationsController::class, 'stateChange'])->name('loan.state.change');

}
);


Route::group([
    'prefix' => 'chalom/admin',
    'middleware' => 'auth'
], function () {

    Route::group([
        'prefix' => 'loan',
    ], function () {
        Route::get('/list', [LoanProductsController::class, 'index'])->name('loan.product.index');
        Route::get('/show/{loanProducts}', [LoanProductsController::class, 'show'])->name('loan.product.show');
        Route::get('/create', [LoanProductsController::class, 'create'])->name('loan.product.create');
        Route::post('/store', [LoanProductsController::class, 'store'])->name('loan.product.store');
        Route::get('/search', [LoanApplicationsController::class, 'search'])->name('loan.product.search');
        Route::post('/update/{loanProducts}', [LoanProductsController::class, 'update'])->name('loan.product.update');
        Route::post('/destroy/{loanProducts}', [LoanProductsController::class, 'destroy'])->name('loan.product.destroy');

        Route::get('/check', [LoanApplicationsController::class, 'index'])->name('loan.list')->middleware('auth');



        Route::group([
            'prefix' => 'feature',
        ], function () {
            Route::get('/list', [LoanFeaturesController::class, 'index'])->name('loan.feature.index');
            Route::get('/show/{LoanFeatures}', [LoanFeaturesController::class, 'show'])->name('loan.feature.show');
            Route::get('/create', [LoanFeaturesController::class, 'create'])->name('loan.feature.create');
            Route::post('/store', [LoanFeaturesController::class, 'store'])->name('loan.feature.store');
            Route::post('/update/{LoanFeatures}', [LoanFeaturesController::class, 'update'])->name('loan.feature.update');
            Route::post('/destroy/{LoanFeatures}', [LoanFeaturesController::class, 'destroy'])->name('loan.feature.destroy');
        }
        );
        Route::group([
            'prefix' => 'faq',
        ], function () {
            Route::get('/list', [LoanFQAController::class, 'index'])->name('loan.faq.index');
            Route::get('/show/{LoanFeatures}', [LoanFQAController::class, 'show'])->name('loan.faq.show');
            Route::get('/create', [LoanFQAController::class, 'create'])->name('loan.faq.create');
            Route::post('/store', [LoanFQAController::class, 'store'])->name('loan.faq.store');
            Route::post('/update/{LoanFeatures}', [LoanFQAController::class, 'update'])->name('loan.faq.update');
            Route::post('/destroy/{LoanFeatures}', [LoanFQAController::class, 'destroy'])->name('loan.faq.destroy');
        }
        );

        Route::group([
            'prefix' => 'eligibility',
        ], function () {
            Route::get('/list', [LoanEligibilityController::class, 'index'])->name('loan.eligibility.index');
            Route::get('/show/{LoanEligibility}', [LoanEligibilityController::class, 'show'])->name('loan.eligibility.show');
            Route::get('/create', [LoanEligibilityController::class, 'create'])->name('loan.eligibility.create');
            Route::post('/store', [LoanEligibilityController::class, 'store'])->name('loan.eligibility.store');
            Route::post('/update/{LoanEligibility}', [LoanEligibilityController::class, 'update'])->name('loan.eligibility.update');
            Route::post('/destroy/{LoanEligibility}', [LoanEligibilityController::class, 'destroy'])->name('loan.eligibility.destroy');
        }
        );

    }
    );
}
);
