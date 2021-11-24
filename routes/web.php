<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Delivery;
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

<<<<<<< HEAD
//Auth::loginUsingId(1);
=======
// Auth::loginUsingId(1);
>>>>>>> 6559f023fb70f593eb97f68242096e8ea3b2acdd

Route::get('/', Delivery::class)
->name('home')
->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])
->get('/dashboard', Delivery::class)->name('dashboard');

<<<<<<< HEAD
//Route::view('/test', 'delivery_notification', ['delivery' => App\Models\Delivery::all()->first()]);
=======
Route::view('/test', 'delivery_notification', ['delivery' => App\Models\Delivery::find(3)]);
>>>>>>> 6559f023fb70f593eb97f68242096e8ea3b2acdd
