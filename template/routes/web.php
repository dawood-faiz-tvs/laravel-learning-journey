<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\public_site\About;
use App\Http\Controllers\public_site\Clients;
use App\Http\Controllers\public_site\Contact_us;
use App\Http\Controllers\public_site\Home;
use App\Http\Controllers\public_site\Services;
use App\Http\Controllers\public_site\Team;

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

Route::get('/about', [About::class, 'index']);
Route::get('/clients', [Clients::class, 'index']);
Route::get('/contact-us', [Contact_us::class, 'index']);
Route::get('/', [Home::class, 'index']);
Route::get('/services', [Services::class, 'index']);
Route::get('/team', [Team::class, 'index']);