<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\EmployeeController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::get('getEmployees', [EmployeeController::class, 'index']);
Route::post('createEmployees', [EmployeeController::class, 'create']);
Route::get('getEmployee/{id}', [EmployeeController::class, 'detail']);
Route::put('updateEmployees/{id}', [EmployeeController::class, 'update']);
Route::get('deleteEmployee/{id}', [EmployeeController::class, 'delete']);