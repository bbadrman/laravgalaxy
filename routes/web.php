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
Route::post('/create', [TargetController::class, 'store']);

Route::get('/edit/{target}', [TargetController::class, 'edit']);
Route::put('/edit/{target}', [TargetController::class, 'update']);

Route::get('/delete/{target}', [TargetController::class, 'delete']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');