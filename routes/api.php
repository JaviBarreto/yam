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

/* Routes System */

/* Routes Application */
Route::post('signup', 'Api\UserApiController@Signup');
Route::post('signin', 'Api\UserApiController@Signin');

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function () {

    //Category
    Route::get('categories' , 'CategoryApiController@GetFoodCategory');

    //Product
    Route::get('products', 'ProductApiController@GetProductList');
    Route::post('search' , 'ProductApiController@SearchProduct');
    Route::get('product-detail' , 'ProductApiController@GetProductDetail');
    Route::get('offers' , 'ProductApiController@GetAllOffer');

    //Offers
    Route::get('dashboardoffer' , 'OfferApiController@GetDashboardOffer');

    //Address
    Route::get('address' , 'AddressApiController@GetAddress');
    Route::post('add-address' , 'AddressApiController@AddUserAddress');
    Route::post('remove-address' , 'AddressApiController@RemoveAddress');

    //Orders
    Route::post('placeorder', 'OrderApiController@PlaceOrder');
    Route::post('add-order-detail', 'OrderApiController@AddOrderDetail');
    Route::get('get-order-detail', 'OrderApiController@GetOrderDetail');
    Route::get('current-order', 'OrderApiController@GetCurrentOrder');
    Route::post('cancel-order', 'OrderApiController@CancelOrder');

    //OrderProducts
    Route::get('orderhistory', 'OrderProductApiController@GetOrderHistory');
    Route::put('updateitemquantity/{orderproduct}', 'OrderProductApiController@UpdateItemQuantity');

    //Store
    Route::get('getstore' , 'StoreApiController@GetStore');
    Route::get('business-store' , 'StoreApiController@GetBusinessStore');

    //StoreStiming
    Route::get('storetiming' , 'StoreTimingApiController@GetStoreTiming');

    //Faqs
    Route::get('questions', 'FaqApiController@GetFrequentlyQuestion');

    //Users
    Route::put('completeprofile', 'UserApiController@CompleteProfile');
    Route::get('profile', 'UserApiController@GetProfile');
    Route::post('signout', 'UserApiController@Signout');

    // Test's JRC
    Route::get('test' , 'TestApiController@test');
    
});
