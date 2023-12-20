<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route::get('/',function(){
    return view('inicio'); 
 })->name('inicio');

Route::resource('/posts', PostController::class)->only(['index','show','create','edit','destroy']);

Route::get('/posts/modificarPrueba',[PostController::class,'editarPrueba'])->name('editarPrueba');
Route::get('/posts/crearPrueba/{id}',[PostController::class,'crearPrueba'])->name('crearPrueba');