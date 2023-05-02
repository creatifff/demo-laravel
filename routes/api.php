<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'controller' => \App\Http\Controllers\Api\OrderController::class,
    'prefix' => '/orders',
    'as' => 'order.'
], function () {
    Route::post('/create', 'store')->name('create');
});
