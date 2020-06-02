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
/*Route::namespace('Auth')->group(function () {
    Route::get('cart/login', 'CartLoginController@showLoginForm')->name('cart.login');
    Route::post('cart/login', 'CartLoginController@login')->name('cart.login');
    Route::get('logout', 'LoginController@logout');
});*/

//Route::resource('staff', 'ControllerStaff');
Route::group(['namespace' => 'Api\v01'], function () {

	Route::post('v01/register', 'CustomerController@register');
	Route::post('v01/login', 'LoginController@login');

   	Route::resource('v01/staff', 'StaffController');
   	Route::resource('v01/produk', 'ProdukController');
   	/*Route::resource('v01/kategori', 'KategoriController');*/
});
