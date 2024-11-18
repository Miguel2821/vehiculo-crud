<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\vehiculoController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
//

Route::get("/vehiculo", [vehiculoController::class, 'index']);

Route::get("/vehiculo/{id}", [vehiculoController::class, 'show']);

Route::post("/vehiculo", [vehiculoController::class, 'store']);

Route::delete("/vehiculo/{id}", [vehiculoController::class, 'destroy']);

Route::put("/vehiculo/{id}", [vehiculoController::class, 'update']);

Route::patch("/vehiculo/{id}", [vehiculoController::class, 'updatePartial']);



