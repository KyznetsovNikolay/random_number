<?php

use App\Http\Controllers\Number\GenerateAction;
use App\Http\Controllers\Number\RetrieveAction;
use Illuminate\Support\Facades\Route;

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

Route::get('/generate', GenerateAction::class);
Route::get('/retrieve/{id}', RetrieveAction::class);

