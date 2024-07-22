<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WeekController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;

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
Auth::routes();

Route::resource('/weeks', WeekController::class);
Route::resource('/invoices', InvoiceController::class);
Route::resource('/clients', ClientController::class);
Route::resource('/inventory', ProductController::class);
Route::get('/clients/{id}', [App\Http\Controllers\ClientController::class, 'getClientDetails']);
Route::get('/invoices/client-details/{id}', [App\Http\Controllers\InvoiceController::class, 'getClientDetails']);
Route::get('/invoices/service-details/{id}', [App\Http\Controllers\InvoiceController::class, 'getServicetDetails']);

Route::get('/send-scheduled-emails', [InvoiceController::class, 'sendScheduledEmails'])->name('send-scheduled-emails');

Route::resource('/services', App\Http\Controllers\ServiceController::class);
