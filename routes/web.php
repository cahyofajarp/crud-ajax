<?php
namespace App\Http\Controllers;

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


Route::get('/post',[PostController::class,'index'])->name('post.index');

Route::get('/post/create',[PostController::class,'create'])->name('post.create');

Route::post('/post',[PostController::class,'store'])->name('post.store');

Route::get('/post/{id}/edit',[PostController::class,'edit'])->name('post.edit');

Route::post('/post/{id}/update',[PostController::class,'update'])->name('post.update');

Route::delete('/post/{id}/delete',[PostController::class,'destroy'])->name('post.destroy');