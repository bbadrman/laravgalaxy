<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\TargetController;

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


Route::get('/demo_url', [DemoController::class, 'test']);

Route::get('/', [TargetController::class, 'index']);

Route::get('/create', [TargetController::class, 'create']);

Route::get('/edit', [TargetController::class, 'edit']);
