<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("/users", [UserController::class, 'index']);
Route::post("/user/store", [UserController::class, 'store']);
Route::get("/user/{id}", [UserController::class, 'show']);
Route::put("/user/{id}", [UserController::class, 'update']);
Route::patch("/user/change-password/{id}", [UserController::class, 'change_password']);
Route::delete("/user/{id}", [UserController::class, 'destroy']);
