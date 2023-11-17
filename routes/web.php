<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//All listing
Route::get('/', [ListingController::class, 'index']);

Route::get('/user_dashboard', [ListingController::class, 'index_user'])->name('user.dashboard');

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store Listing Data
Route::post('/listings/store', [ListingController::class, 'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}' , [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}' , [ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}',
[ListingController::class, 'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'adminIndex'])->name('admin.dashboard');
    Route::get('listings/admin_manage', [App\Http\Controllers\ListingController::class, 'admin_manage'])->name('admin.manage');
    Route::get('listings/{listing}', [App\Http\Controllers\ListingController::class, 'admin_show'])->name('admin.show');
    Route::get('listings/{listing}/edit', [App\Http\Controllers\ListingController::class, 'admin_edit'])->name('admin.edit');
    Route::put('listings/{listing}/update-status', [App\Http\Controllers\ListingController::class, 'admin_update'])->name('admin.update');
    Route::delete('listings/{listing}/delete', [App\Http\Controllers\ListingController::class, 'admin_delete'])->name('admin.delete');
});




