<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SneakerController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors']], function () {

    Route::prefix('v1')->group(function () {

        Route::get('/sneakers/{page?}/{filter_min?}/{filter_max?}', [SneakerController::class, 'index']);
        Route::post('/sneakers', [SneakerController::class, 'store']);
        Route::get('/sneakers/{sneaker}', [SneakerController::class, 'show']);
        Route::put('/sneakers/{sneaker}', [SneakerController::class, 'update']);
        Route::post('/sneakers/{sneaker}', [SneakerController::class, 'update']);
        Route::delete('/sneakers/{sneaker}', [SneakerController::class, 'delete']);

    });
});