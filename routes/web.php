<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\CheckoutController;

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
    return view('home');
})->name('/');

Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.login.callback');

Route::middleware(['auth'])
    ->group(function () {

        //checkout route
        Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
        Route::get('checkout/{camps:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
        Route::post('checkout/{camps}', [CheckoutController::class, 'store'])->name('checkout.store');

        //user dashboard route
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('checkout.invoice');
    });

require __DIR__ . '/auth.php';
