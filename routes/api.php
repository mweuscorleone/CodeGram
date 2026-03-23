<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin', function(){
    return "Admin only";
});
Route::middleware(['auth:sanctum', 'role:admin, editor'])->get('/edit', function(){
    return "Editor access";
});
Route::middleware('auth:sanctum')->get('/profile', function(Request $request){
    return $request->user();
});
Route::post('/jobs', [JobController::class, 'storeJob']);
Route::get('/jobs', [JobController::class, 'index']);
Route::post('/apply', [JobController::class, 'apply']);