<?php

use App\Http\Controllers\Dashboard\Settings\CustomerTypesController;
use App\Http\Controllers\Dashboard\Settings\RolesController;
use App\Http\Controllers\Dashboard\Settings\StatusController;
use App\Http\Controllers\Dashboard\Settings\WorkStatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\ClientController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Website\Loans\LoanApplicationsController;
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
}
);


Auth::routes();

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
}
);


/*
| USERS
*/

Route::group([
    'prefix' => 'users',
    'middleware' => 'auth'
], function () {
    Route::get('profile/{user}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('create', [UserController::class, 'create'])->name('user.create');

    Route::group([
        'prefix' => 'admin',
    ], function () {
        Route::get('index', [UserController::class, 'index'])->name('user.admins');
        Route::get('profile/{user}', [UserController::class, 'profile'])->name('user.admin.profile');
        Route::post('store', [UserController::class, 'store'])->name('user.admin.store');
        Route::post('update/{id}', [UserController::class, 'update'])->name('user.admin.update');
        Route::post('update/image/{user}', [UserController::class, 'image'])->name('user.admin.update.image');
        Route::post('destroy', [UserController::class, 'destroy'])->name('user.admin.destroy');
    });

    Route::group([
        'prefix' => 'client',
    ], function () {
        Route::get('index', [ClientController::class, 'index'])->name('user.clients');
        Route::get('profile/{user}', [ClientController::class, 'profile'])->name('user.client.profile');
        Route::post('store', [ClientController::class, 'store'])->name('user.client.store');
        Route::post('update/{id}', [ClientController::class, 'update'])->name('user.client.update');
        Route::post('destroy', [ClientController::class, 'destroy'])->name('user.client.destroy');
    });

}
);


/*
| SETTINGS
*/

Route::group([
    'prefix' => 'settings',
    'middleware' => 'auth'
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
            Route::post('destroy', [StatusController::class, 'destroy'])->name('statuses.destroy');
        });

        Route::group([
            'prefix' => 'role',
        ], function () {
            Route::get('show/{role}', [RolesController::class, 'show'])->name('role.show');
            Route::get('create', [RolesController::class, 'create'])->name('role.create');
            Route::post('store', [RolesController::class, 'store'])->name('role.store');
            Route::post('update/{role}', [RolesController::class, 'update'])->name('role.update');
            Route::post('destroy', [RolesController::class, 'destroy'])->name('role.destroy');
        });


        Route::group([
            'prefix' => 'customer-type',
        ], function () {
            Route::get('show/{customer_types}', [CustomerTypesController::class, 'show'])->name('customer.type.show');
            Route::get('create', [CustomerTypesController::class, 'create'])->name('customer.type.create');
            Route::post('store', [CustomerTypesController::class, 'store'])->name('customer.type.store');
            Route::post('update/{customer_types}', [CustomerTypesController::class, 'update'])->name('customer.type.update');
            Route::post('destroy', [CustomerTypesController::class, 'destroy'])->name('customer.type.destroy');
        });

        Route::group([
            'prefix' => 'work-status',
        ], function () {
            Route::get('show/{work_status}', [WorkStatusController::class, 'show'])->name('work.status.show');
            Route::get('create', [WorkStatusController::class, 'create'])->name('work.status.create');
            Route::post('store', [WorkStatusController::class, 'store'])->name('work.status.store');
            Route::post('update/{work_status}', [WorkStatusController::class, 'update'])->name('work.status.update');
            Route::post('destroy', [WorkStatusController::class, 'destroy'])->name('work.status.destroy');
        });

    });


