<?php

use Illuminate\Http\Request;

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
Route::apiresource('bookings', 'BookingsController')->middleware('Bookings');
Route::apiresource('foods', 'FoodController')->middleware('Foods');
// Route::post('register', 'RegisterController@register');
Route::apiresource('products', 'ProductsController')->middleware('Products');
Route::apiresource('category', 'CategoryController')->middleware('Category');
Route::apiresource('posts', 'PostsController')->middleware('posts');