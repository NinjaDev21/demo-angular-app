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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();

//    Route::get('heros-index',[
//        'uses' => 'HerosController@index'
//    ]);
// });

/** Get the list of heros */
Route::get('get-heros', 'HerosController@index');
/** add heros */
Route::post('add-hero','HerosController@addHero');
/** delete hero */
Route::delete('delete-hero/{id}','HerosController@deleteHero');
/** view hero*/
Route::get('get-hero/{id}', 'HerosController@getHero');
/** update hero */
Route::post('update-hero','HerosController@updateHero');
/** search heros*/
Route::get('search-hero', 'HerosController@searchHero');

