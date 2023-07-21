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
            Route::get('/type/{slug}',[RestaurantController::class, 'getByType']);
            // Route::get('/categories',[PostController::class, 'getCategories']);
            // Route::get('/tags',[PostController::class, 'getTags']);
            // Route::get('/post-category/{id}',[PostController::class, 'getPostsByCategory']);
            // Route::get('/post-tag/{id}',[PostController::class, 'getPostsByTag']);
            Route::get('/{slug}',[RestaurantController::class, 'getRestaurantDetail']);
            // Route::get('/search/{tosearch}',[PostController::class, 'search']);
            //route di michele
             Route::get('/typesearch', [RestaurantController::class, 'restaurantTypesSearch']);


        });

