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

Route::group(['middleware' => ['ForceHeaderAcceptJson']], function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::apiResource('users', UserController::class); // It works.
    
    Route::post('client/register', [UserController::class,'store']);    //It works. - Register Clients.
    Route::post('client/login', [UserController::class,'login'])->name('login');   //It works. - Login.
    Route::get('client/logout', [UserController::class,'logout'])->middleware('auth:api'); //It works. - Logout.
    
    Route::post('appointment/create', [AppointmentController::class,'store'])->middleware('auth:api'); //It works. - Create Appointment.
    Route::delete('appointment/cancel/{id}', [AppointmentController::class,'destroy'])->middleware('auth:api'); //It works. - Create Appointment.

    
    Route::middleware('auth:api')->get('/client/ShowClients', [UserController::class, 'index'])->middleware('role:admin'); //It works. - Show Clients.
    
    Route::get('appointment/showAll',[AppointmentController::class,'index'])->middleware('role:admin');  //It works. - Show all Appointments.
    });