<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AttachmentController;

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

Route::resource('todos', TodosController::class);
Route::resource('categories', CategoriesController::class);

// Route::post('/upload', 'AttachmentController@store')->name('upload');
// Route::get('/download', 'AttachmentController@show')->name('download');

// Route::resource('attachment', AttachmentController::class);
// Route::get('/download', 'AttachmentController.show')->name('download');

Route::post('upload', [AttachmentController::class, 'store'])->name('upload');
Route::get('download', [AttachmentController::class, 'show'])->name('download');
