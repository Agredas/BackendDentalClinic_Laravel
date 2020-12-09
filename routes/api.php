<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;


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
Route::get('/', function(){
    return response()->json(['message' => 'up and running!'], 200);
});

Route::post('client/register', [UserController::class,'store']);    //It works. - Register Clients.
Route::post('client/login', [UserController::class,'login'])->name('login');   //It works. - Login.

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::apiResource('users', UserController::class); // It works.
    
    Route::post('client/logout', [UserController::class,'logout']); //It works. - Logout.
    
    Route::post('appointment/create', [AppointmentController::class,'store']); //It works. - Create Appointment.
    Route::get('appointment/show', [AppointmentController::class,'index']);
    Route::delete('appointment/cancel/{id}', [AppointmentController::class,'destroy']); //It works. - Create Appointment.

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/appointment/showAll', [AppointmentController::class, 'indexAll']); //It works. - Show Apps. 
    });
});