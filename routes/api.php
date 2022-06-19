<?php

use App\Http\Controllers\AdminController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollectionIterator;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route Authentication

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth:api', 'role:customer|admin'], 'prefix' => 'customer'], function () {
    Route::get('/', [CustomerController::class, 'index']);
    Route::post('/update', [CustomerController::class, 'update']);
});

Route::group(['middleware' => ['auth:api', 'role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/confirm/{id}', [AdminController::class, 'confirm']);
});

Route::group(['middleware' => ['auth:api', 'role:customer|admin'], 'prefix' => 'booking'], function () {
    Route::get('/', [BookingController::class, 'index']);
    Route::post('/', [BookingController::class, 'store']);
});
