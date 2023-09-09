<?php

use App\Http\Controllers\PaymentController;
use App\Models\Order;
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
Route::get('/orders', function () {
    $orders = Order::latest()->get();
    return view('orders', compact('orders'));
});


Route::name('pay.')
->prefix('/pay')
    ->controller(PaymentController::class)
    ->group(function () {
        Route::post('/', 'index')->name('index');
        Route::post('/success', 'success')->name('success');
        Route::post('/fail', 'fail')->name('fail');
        Route::post('/cancel', 'cancel')->name('cancel');
        Route::post('/ipn', 'ipn')->name('ipn');
    });
