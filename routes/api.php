<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use App\Models\Materia;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


// programas CRUD
Route::group(['prefix' => 'program'], function(){
    Route::get('/all', [ProgramController::class, 'getAll']);
    Route::get('{id}/edit', [ProgramController::class, 'edit']);
    Route::post('/store', [ProgramController::class, 'store']);
    Route::put('/{id}/update', [ProgramController::class, 'update']);
    Route::delete('/{id}/destroy', [ProgramController::class, 'destroy']);
    });
// user CRUD
Route::group(['prefix' => 'user'], function(){
    Route::get('/all', [UserController::class, 'getAll']);
    Route::get('{id}/edit', [UserController::class, 'edit']);
    Route::post('/store', [UserController::class, 'store']);
    Route::put('/{id}/update', [UserController::class, 'update']);
    Route::delete('/{id}/destroy', [UserController::class, 'destroy']);
    });

//Route::Route::get('/all', [ProgramController::class, 'getAll'])->middleware('jwt.verify');
/* Route::middleware('jwt.verify')->group(function(){
    Route::get('/all', [ProgramController::class, 'getAll']);
});
 */
