<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\LotsController;
use App\Http\Controllers\Admin\MaterialsController;
use App\Http\Controllers\Admin\UserController;

// Dashboard
Route::get('/', 'HomeController@index')->name('home');

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

Route::resource('auctions', 'AuctionController');
Route::resource('users', 'UserController');

// Route::get('/lots-dashboard', [LotsController::class, 'index'])->name('home');
Route::get('/lots', [LotsController::class, 'index'])->name('home');

// Materials Routes
Route::get('/materials', [MaterialsController::class, 'index'])->name('materials');
Route::get('/materials/create', [MaterialsController::class, 'create']);
Route::post('/newmaterials', [MaterialsController::class, 'store']);

Route::get('/materials/{materials}', [MaterialsController::class, 'show']);
Route::get('/materials/{materials}/edit', [MaterialsController::class, 'edit']);
Route::patch('/materials/{materials}', [MaterialsController::class, 'update']);
Route::delete('/materials/{materials}/destroy', [MaterialsController::class, 'destroy']);

// Categories Routes
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoriesController::class, 'create']);
Route::get('/categories/show/{categories}', [CategoriesController::class, 'show']);
Route::post('/categories/store', [CategoriesController::class, 'store']);
Route::get('/categories/{categories}/edit', [CategoriesController::class, 'edit']);
Route::patch('/categories/{categories}', [CategoriesController::class, 'update']);
Route::delete('/categories/destroy/{categories}', [CategoriesController::class, 'destroy']);

// Lots Routes
Route::get('/lots', [LotsController::class, 'index'])->name('lots');
Route::get('/lots/create', [LotsController::class, 'create'])->name('create');
Route::post('/newlots', [LotsController::class, 'store']);
Route::get('/lots/{lots}', [LotsController::class, 'show']);
Route::get('/lots/edit/{lots}', [LotsController::class, 'edit']);
Route::patch('/lots/{lots}', [LotsController::class, 'update']);
Route::delete('/lots/{lots}', [LotsController::class, 'destroy']);
// Verify Email
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
