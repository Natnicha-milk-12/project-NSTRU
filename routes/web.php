<?php

use App\Http\Controllers\AccidentsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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
})->name('welcome');

Route::get('main-user', function () {
    return view('main-user');
})->name('main-user');

Route::get('user-home', function () {
    return view('user-home');
})->name('user-home');

Route::get('category_1', function () {
    return view('category_1');
})->name('category_1');

Route::get('create_category', function () {
    return view('create_category');
})->name('create_category');

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', [AccidentsController::class, 'chartaccident'])->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [AccidentsController::class, 'getaccident'])->name('home');
// Route::get('/home', [AccidentsController::class, 'chartaccident'])->name('home');

Route::get('app-user', [UserController::class, 'add'])->name('app-user');
Route::post('insert-user', [UserController::class, 'insert']);

Route::get('create', [CategoryController::class, 'create'])->name('create');
Route::post('create', [CategoryController::class, 'store']);

Route::get('category_index', [CategoryController::class, 'index'])->name('category_index');
Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
Route::put('update-category/{id}', [CategoryController::class, 'update']);
Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy']);
//Route::get('form-user', [CategoryController::class, 'getdate'])->name('form-user');

// Route::get('form_accidents', [UserController::class, 'getuser'])->name('form_accidents');

Route::get('form_accidents', [AccidentsController::class, 'create'])->name('form_accidents');
Route::post('form_accidents', [AccidentsController::class, 'storeaccidents']);
Route::get('index_accidents', [AccidentsController::class, 'index'])->name('index_accidents');
Route::get('print_accidents', [AccidentsController::class, 'printaccidents'])->name('print_accidents');

Route::get('edit_accidents/{id}', [AccidentsController::class, 'edit']);
Route::put('update_accidents/{id}', [AccidentsController::class, 'update']);
Route::get('view_accidents/{id}', [AccidentsController::class, 'viewaccident']);

Route::delete('deleteimage/{id}', [AccidentsController::class, 'deleteimage']);
Route::delete('/delete/{id}', [AccidentsController::class, 'destroy']);

// Route::get('index_accidents', function () {
//     return view('Accidents.index_accidents');
// })->name('index_accidents');
