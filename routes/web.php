<?php

use App\Http\Controllers\Users\BankDetailsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\Settings\CustomerTypesController;
use App\Http\Controllers\Dashboard\Settings\LoanCategoryController;
use App\Http\Controllers\Dashboard\Settings\RolesController;
use App\Http\Controllers\Dashboard\Settings\StatusController;
use App\Http\Controllers\Dashboard\Settings\WorkStatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\ClientController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::group([
    'prefix' => 'chalom/company',
], function () {
    Route::get('/faq', [HomeController::class, 'faq'])->name('company.faq');
    Route::get('/contact', [HomeController::class, 'contact'])->name('company.contact');
    Route::get('/about', [HomeController::class, 'about'])->name('company.about');
    Route::get('/team', [HomeController::class, 'team'])->name('company.team');
    Route::get('/how-to-apply', [HomeController::class, 'apply'])->name('company.how_to_apply');
    Route::get('contact-us', [ContactController::class, 'index']);
    Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');
}
);


Auth::routes();

Route::group([
    'middleware' => ['auth', 'active.user']
], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
}
);


/*
| USERS
*/

Route::group([
    'prefix' => 'users',
    'middleware' => ['auth', 'active.user']
], function () {
    Route::get('profile/{user}', [UserController::class, 'profile'])->name('user.profile');
    Route::post('destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::group([
        'prefix' => 'admin',
    ], function () {
        Route::get('index', [UserController::class, 'index'])->name('user.admins');
        Route::get('profile/{user}', [UserController::class, 'profile'])->name('user.admin.profile');
        Route::post('store', [UserController::class, 'store'])->name('user.admin.store');
        Route::post('update/{id}', [UserController::class, 'update'])->name('user.admin.update');
        Route::post('update/image/{user}', [UserController::class, 'image'])->name('user.admin.update.image');
        Route::post('destroy', [UserController::class, 'destroy'])->name('user.admin.destroy');
        Route::get('create', [UserController::class, 'create'])->name('user.admin.create');
    });

    Route::group([
        'prefix' => 'client',
    ], function () {
        Route::get('index', [ClientController::class, 'index'])->name('user.clients');
        Route::get('profile/{user}', [ClientController::class, 'profile'])->name('user.client.profile');
        Route::post('store', [ClientController::class, 'store'])->name('user.client.store');
        Route::post('update/{id}', [ClientController::class, 'update'])->name('user.client.update');
        Route::post('destroy', [ClientController::class, 'destroy'])->name('user.client.destroy');
        Route::get('create', [ClientController::class, 'create'])->name('user.client.create');
    });

    Route::group([
        'prefix' => 'bank-details',
    ], function () {
        Route::get('index', [BankDetailsController::class, 'index'])->name('user.bank-details');
        Route::post('store', [BankDetailsController::class, 'store'])->name('user.bank-details.store');
        Route::get('show/{bankDetails}', [BankDetailsController::class, 'show'])->name('user.bank-details.show');
        Route::post('update/{bankDetails}', [BankDetailsController::class, 'update'])->name('user.bank-details.update');
        Route::post('destroy/{bankDetails}', [BankDetailsController::class, 'destroy'])->name('user.bank-details.destroy');
        Route::get('create', [BankDetailsController::class, 'create'])->name('user.bank-details.create');
        Route::post('search', [BankDetailsController::class, 'search'])->name('user.bank-details.search');

    });

}
);


/*
| SETTINGS
*/

Route::group([
    'prefix' => 'settings',
    'middleware' => ['auth', 'active.user']
],
    function () {

        Route::get('/', [HomeController::class, 'settings'])->name('settings');

        Route::group([
            'prefix' => 'statuses',
        ], function () {
            Route::get('show/{status}', [StatusController::class, 'show'])->name('statuses.show');
            Route::get('create', [StatusController::class, 'create'])->name('statuses.create');
            Route::post('store', [StatusController::class, 'store'])->name('statuses.store');
            Route::post('update/{status}', [StatusController::class, 'update'])->name('statuses.update');
            Route::post('destroy/{status}', [StatusController::class, 'destroy'])->name('statuses.destroy');
        });

        Route::group([
            'prefix' => 'role',
        ], function () {
            Route::get('show/{role}', [RolesController::class, 'show'])->name('role.show');
            Route::get('create', [RolesController::class, 'create'])->name('role.create');
            Route::post('store', [RolesController::class, 'store'])->name('role.store');
            Route::post('update/{role}', [RolesController::class, 'update'])->name('role.update');
            Route::post('destroy/{role}', [RolesController::class, 'destroy'])->name('role.destroy');
        });


        Route::group([
            'prefix' => 'customer-type',
        ], function () {
            Route::get('show/{customer_types}', [CustomerTypesController::class, 'show'])->name('customer.type.show');
            Route::get('create', [CustomerTypesController::class, 'create'])->name('customer.type.create');
            Route::post('store', [CustomerTypesController::class, 'store'])->name('customer.type.store');
            Route::post('update/{customer_types}', [CustomerTypesController::class, 'update'])->name('customer.type.update');
            Route::post('destroy/{customer_types}', [CustomerTypesController::class, 'destroy'])->name('customer.type.destroy');
        });

        Route::group([
            'prefix' => 'work-status',
        ], function () {
            Route::get('show/{work_status}', [WorkStatusController::class, 'show'])->name('work.status.show');
            Route::get('create', [WorkStatusController::class, 'create'])->name('work.status.create');
            Route::post('store', [WorkStatusController::class, 'store'])->name('work.status.store');
            Route::post('update/{work_status}', [WorkStatusController::class, 'update'])->name('work.status.update');
            Route::post('destroy/{work_status}', [WorkStatusController::class, 'destroy'])->name('work.status.destroy');

        });

        Route::group([
            'prefix' => 'loan-category',
        ], function () {
            Route::get('show/{loanCategory}', [LoanCategoryController::class, 'show'])->name('loan.category.show');
            Route::get('create', [LoanCategoryController::class, 'create'])->name('loan.category.create');
            Route::post('store', [LoanCategoryController::class, 'store'])->name('loan.category.store');
            Route::post('update/{loanCategory}', [LoanCategoryController::class, 'update'])->name('loan.category.update');
            Route::post('destroy/{loanCategory}', [LoanCategoryController::class, 'destroy'])->name('loan.category.destroy');

        });

    });


