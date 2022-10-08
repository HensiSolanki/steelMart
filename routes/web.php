<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LotsController;
use App\Http\Controllers\MaterialsController;
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

Auth::routes();

Route::get('/', [LotsController::class, 'index'])->name('home');
Route::get('/home', [LotsController::class, 'index'])->name('home');

// Materials Routes
Route::get('/materials', [MaterialsController::class, 'index']);
Route::get('/materials/create', [MaterialsController::class, 'create']);
Route::post('/newmaterials', [MaterialsController::class, 'store']);
Route::get('/materials/{materials}', [MaterialsController::class, 'show']);
Route::get('/materials/{materials}/edit', [MaterialsController::class, 'edit']);
Route::patch('/materials/{materials}', [MaterialsController::class, 'update']);
Route::delete('/materials/{materials}', [MaterialsController::class, 'destroy']);

// Categories Routes
Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/categories/create', [CategoriesController::class, 'create']);
Route::post('/newcategories', [CategoriesController::class, 'store']);
Route::get('/categories/{categories}/edit', [CategoriesController::class, 'edit']);
Route::patch('/categories/{categories}', [CategoriesController::class, 'update']);
Route::delete('/categories/{categories}', [CategoriesController::class, 'destroy']);

// Lots Routes
Route::get('/lots', [LotsController::class, 'index']);
Route::get('/lots/create', [LotsController::class, 'create']);
Route::post('/newlots', [LotsController::class, 'store']);
Route::get('/lots/{lots}', [LotsController::class, 'show']);
Route::get('/lots/{lots}/edit', [LotsController::class, 'edit']);
Route::patch('/lots/{lots}', [LotsController::class, 'update']);
Route::delete('/lots/{lots}', [LotsController::class, 'destroy']);