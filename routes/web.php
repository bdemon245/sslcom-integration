<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::name('pay.')
    ->controller(PaymentController::class)
    ->group(function () {
        Route::get('/simple', 'simple')->name('simple');
        Route::get('/simple-hosted', 'simpleHosted')->name('simpleHosted');
        Route::post('/pay', 'index')->name('index');
        Route::post('/pay-via-ajax', 'viaAjax')->name('viaAjax');
        Route::post('/success', 'success')->name('success');
        Route::post('/fail', 'fail')->name('fail');
        Route::post('/cancel', 'cancel')->name('cancel');
        Route::post('/ipn', 'ipn')->name('ipn');
    });
    // Route::post('ssl-pay', [PaymentController::class, 'index'])->name('ssl.pay');
