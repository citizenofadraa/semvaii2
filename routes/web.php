<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravelCrud;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\ResultsController;

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
Route::view('/update', 'update');
Route::view('/drivers', 'drivers');
Route::view('/teams', 'teams');
Route::view('/resultsdriver', 'resultsdriver');
Route::view('/resultsdriveredit', 'resultsdriveredit');

Route::get('edit/{id}', [LaravelCrud::class, 'edit']);
Route::get('/', [LaravelCrud::class, 'index']);
Route::get('/teams', [TeamsController::class, 'teamsIndex']);
Route::get('/teamsedit', [TeamsController::class, 'teamsEditIndex']);
Route::get('/driversedit', [DriversController::class, 'driverEditIndex']);
Route::get('/tracksedit', [LaravelCrud::class, 'editIndex']);
Route::get('/drivers', [DriversController::class, 'driverIndex']);
Route::get('/resultsdriveredit', [ResultsController::class, 'indexEdit']);
Route::get('/results', [ResultsController::class, 'index']);
Route::get('delete/{id}', [LaravelCrud::class, 'delete']);

Route::post('update', [LaravelCrud::class, 'update'])->name('update');
Route::post('/results', [ResultsController::class, 'table'])->name('table');
Route::post('/teamsedit', [TeamsController::class, 'teamsAction'])->name('teams.action');
Route::post('/tracksedit', [LaravelCrud::class, 'action'])->name('action');
Route::post('/driversedit', [DriversController::class, 'driverAction'])->name('drivers.action');
Route::post('/resultsdriveredit', [ResultsController::class, 'resultsAction'])->name('results.action');
Route::post('/teams', [TeamsController::class, 'teamsUpdate'])->name('teams.update');
Route::post('/drivers', [DriversController::class, 'driversUpdate'])->name('drivers.update');
Route::post('/', [LaravelCrud::class, 'tracksUpdate'])->name('tracks.update');
Route::post('/resultsdriver', [ResultsController::class, 'resultsUpdate'])->name('results.update');

require __DIR__ . '/auth.php';
