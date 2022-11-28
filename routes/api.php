<?php

use App\Http\Controllers\V1\Admin\ {
    EmployeeController,
    ProductController
};
use App\Http\Controllers\v1\AllSettingsController;
use App\Http\Controllers\V1\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){

   Route::get('auth/profile', [AuthController::class, 'profile']);

   Route::get('settings/profile', [AllSettingsController::class, 'roles']);
   Route::get('settings/roles', [AllSettingsController::class, 'roles']);
   Route::get('settings/products', [ProductController::class, 'index']);

   Route::get('settings/myrole', [AllSettingsController::class, 'myrole']);


   Route::group(['prefix' => 'admin/'], function() {

        Route::group(['prefix' => 'master'], function() {

            Route::apiResource('products', ProductController::class);
        });
   });

});

Route::group(['prefix' => 'admin/'], function() {
    Route::apiResource('employees', EmployeeController::class);
});




