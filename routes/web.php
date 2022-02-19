<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CrudController::class, 'index'])->name('home');
Route::post('/', [CrudController::class, 'store'])->name('add.store');
Route::get('/hapus-buku/{id}', [CrudController::class, 'delete']);
Route::match(['get', 'post'], '/edit/{id}', [CrudController::class, 'editData']);