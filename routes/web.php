<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravelCrud;

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

Route::view('/', 'welcome');
Route::view('/prehlad', 'prehlad');
Route::view('/results', 'results');
Route::view('/teamresults', 'teamresults');
Route::view('/update', 'update');
Route::get('edit/{id}', [LaravelCrud::class, 'edit']);
Route::get('delete/{id}', [LaravelCrud::class, 'delete']);
Route::post('update', [LaravelCrud::class, 'update'])->name('update');

require __DIR__ . '/auth.php';
