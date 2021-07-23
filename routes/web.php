<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::resource('products','Productcontroller');
Route::resource('user','AjaxCrudController');
Route::post('user/update', 'AjaxCrudController@update')->name('user.update');
Route::get('user/destroy/{id}', 'AjaxCrudController@destroy');
 Route::get('product', 'Productss_controller@index');
//Route::post('subs', 'Productss_controller@sub');
Route::get('subs/new', 'Productss_controller@sub')->name('l.i');
//Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');
Route::get('package', 'Products@index')->name('datail.view');
Route::post('deails/add', 'Products@store')->name('detail.store');
Route::post('deails/up', 'Products@get_products')->name('detail.update');
Route::put('deails/updated', 'Products@update_product')->name('detail.updated');
Route::delete('deails/delete', 'Products@delete_package')->name('detail.delete');
Route::get('dynamic-field', 'DynamicFieldController@index');
Route::post('dynamic-field/insert', 'DynamicFieldController@insert')->name('dynamic-field.insert');
Route::get('/shop', 'AjaxCrudController@indes');
Route::get('add-to-cart/{id}', 'AjaxCrudController@addToCart');
Route::patch('update-cart', 'AjaxCrudController@updates');
Route::delete('remove-from-cart', 'AjaxCrudController@remove');
Route::get('cart', 'AjaxCrudController@cart');
Route::get('carts', 'AjaxCrudController@carts');
Route::get('online', 'AjaxCrudController@online');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
