<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/cars', 'CarController');
/*
+--------+-----------+---------------------+--------------+--------------------------------------------+--------------+
| Domain | Method    | URI                 | Name         | Action                                     | Middleware   |
+--------+-----------+---------------------+--------------+--------------------------------------------+--------------+
|        | GET|HEAD  | /                   |              | Closure                                    | web          |
|        | GET|HEAD  | api/cars            | cars.index   | App\Http\Controllers\CarController@index   | api          |
|        | POST      | api/cars            | cars.store   | App\Http\Controllers\CarController@store   | api          |
|        | GET|HEAD  | api/cars/create     | cars.create  | App\Http\Controllers\CarController@create  | api          |
|        | GET|HEAD  | api/cars/{car}      | cars.show    | App\Http\Controllers\CarController@show    | api          |
|        | PUT|PATCH | api/cars/{car}      | cars.update  | App\Http\Controllers\CarController@update  | api          |
|        | DELETE    | api/cars/{car}      | cars.destroy | App\Http\Controllers\CarController@destroy | api          |
|        | GET|HEAD  | api/cars/{car}/edit | cars.edit    | App\Http\Controllers\CarController@edit    | api          |
|        | GET|HEAD  | api/user            |              | Closure                                    | api,auth:api |
+--------+-----------+---------------------+--------------+--------------------------------------------+--------------+


*/