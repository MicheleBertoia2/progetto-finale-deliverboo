<?php

use App\Http\Controllers\Api\RestaurantController;
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

Route::namespace('Api')
        ->prefix('restaurants')
        ->group(function(){
            Route::get('/',[RestaurantController::class, 'index']);


            //route di michele
            Route::get('/typesearch', [RestaurantController::class, 'restaurantTypesSearch']);
            Route::get('/{slug}',[RestaurantController::class, 'getRestaurantDetail']);



        });

