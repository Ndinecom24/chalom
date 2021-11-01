<?php

use App\Http\Controllers\CustomerTypesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
| USERS
*/

Route::group([
    'prefix' => 'users',
    'middleware' => 'auth'
], function () {


    Route::group([
        'prefix' => 'admin',
    ], function () {
        Route::get('index', [UserController::class, 'index'])->name('user.admins');
        Route::post('store', [UserController::class, 'store'])->name('user.admin.store');
        Route::post('update', [UserController::class, 'update'])->name('user.admin.update');
        Route::post('destroy', [UserController::class, 'destroy'])->name('user.admin.destroy');
    });

    Route::group([
        'prefix' => 'client',
    ], function () {
        Route::get('index', [UserController::class, 'store'])->name('user.clients');
        Route::post('store', [UserController::class, 'store'])->name('user.client.store');
        Route::post('update', [UserController::class, 'update'])->name('user.client.update');
        Route::post('destroy', [UserController::class, 'destroy'])->name('user.client.destroy');
    });

}
);


/*
| SETTINGS
*/

Route::group([
    'prefix' => 'settings',
    'middleware' => 'auth'
], function () {


    Route::get('/', [HomeController::class, 'settings'])->name('settings');

    Route::group([
        'prefix' => 'statuses',
    ], function () {
        Route::post('store', [StatusController::class, 'store'])->name('statuses.store');
        Route::post('update', [StatusController::class, 'update'])->name('statuses.update');
        Route::post('destroy', [StatusController::class, 'destroy'])->name('statuses.destroy');
    });

    Route::group([
        'prefix' => 'role',
    ], function () {
        Route::post('store', [RolesController::class, 'store'])->name('role.store');
        Route::post('update', [RolesController::class, 'update'])->name('role.update');
        Route::post('destroy', [RolesController::class, 'destroy'])->name('role.destroy');
    });


    Route::group([
        'prefix' => 'customer-type',
    ], function () {
        Route::post('store', [CustomerTypesController::class, 'store'])->name('customer.type.store');
        Route::post('update', [CustomerTypesController::class, 'update'])->name('customer.type.update');
        Route::post('destroy', [CustomerTypesController::class, 'destroy'])->name('customer.type.destroy');
    });

});
