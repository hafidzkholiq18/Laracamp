<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\State\StateController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as AdminCheckout;

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

Route::get('error403', [StateController::class, 'forbiden403'])->name('error403');


Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.login.callback');

Route::middleware(['auth'])
    ->group(function () {

        //checkout route
        Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('ensureUserRole:user');
        Route::get('checkout/{camps:slug}', [CheckoutController::class, 'create'])->name('checkout.create')->middleware('ensureUserRole:user');
        Route::post('checkout/{camps}', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('ensureUserRole:user');

        //dashboard route
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('checkout.invoice');

        //User Dashboard
        Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function () {
            Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
        });

        //Admin Dashboard
        Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function () {
            Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');

            //admin checkout
            Route::post('checkout/{checkout}', [AdminCheckout::class, 'update'])->name('checkout.update');
        });
    });

require __DIR__ . '/auth.php';
