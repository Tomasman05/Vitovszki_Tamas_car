<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/getAll", [CarController::class, "getCars"]);
Route::get("/getOneCar/{carName}", [CarController::class, "getOneCar"]);
Route::post("/addCar", [CarController::class, "addCar"]);
Route::post("/addColor", [CarController::class, "addColor"]);
Route::post("/addType", [CarController::class, "addType"]);
Route::put("/modifyCar/{id}", [CarController::class, "modifyCar"]);
Route::delete("/deleteCar/{id} ", [CarController::class, "deleteCar"]);
    