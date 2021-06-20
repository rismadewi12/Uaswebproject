<?php

use Illuminate\Support\Facades\Route;
use\App\Http\Livewire\mahasiswas;
use\App\Http\Livewire\dosens;
use\App\Http\Livewire\Points;


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


Route::group(['middleware'=> ['auth:sanctum', 'verified', 'accessrole']],function() {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');

    Route::get('mahasiswa', mahasiswas::class)->name('mahasiswa');
    Route::get('dosen', dosens::class)->name('dosen');
    Route::get('Point', Points::class)->name('Point');
   
  

});