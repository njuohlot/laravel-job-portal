<?php

use App\Http\Controllers\ListingController;
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
//index route
Route::get('/', [ListingController::class, 'index']);
//single listing route
Route::get('/{id}', [ListingController::class, 'show']);
//delete listing
Route::delete('/listings/delete/{listing}', [ListingController::class, 'destroy']);
//show listing edit form
Route::get('/listings/edit/{listing}', [ListingController::class, 'edit']);
//update listing
Route::put('/listings/update/{listing}', [ListingController::class, 'update']);
//show create listing form
Route::get('/listings/create', [ListingController::class, 'create']);
//create listings
Route::post('/listings/creates', [ListingController::class, 'store']);
//show register form
Route::get('/users/create', [UserController::class, 'create']);
//register user
Route::post('/users/register', [UserController::class, 'store']);
//show login form
Route::get('/users/signup', [UserController::class, 'login']);
//authenticate user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
//manage listings
Route::get('/listings/manage', [ListingController::class, 'manage']);
//logout user
Route::post('/users/logout', [UserController::class, 'logout']);