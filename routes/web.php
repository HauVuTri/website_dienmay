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
    return view('home');
});
Route::get('trangchu',[
    'as'=>'trangchu',
    'uses'=>'PagesController@getIndex'
]);
Route::get('loaisanpham',[
    'as'=>'loaisanpham',
    'uses'=>'PagesController@getCategory'
]);
Route::get('detail-product/{id}',[
    'as'=>'detailproduct',
    'uses'=>'PagesController@getDetailProduct'
]);
Route::get('category/{id}',[
    'as'=>'category',
    'uses'=>'PagesController@getCategory'
]);
Route::get('contact',[
    'as'=>'contact',
    'uses'=>'PagesController@getContact'
]);
Route::get('about',[
    'as'=>'about',
    'uses'=>'PagesController@getAbout'
]);

//phần này dành riêng cho admin
Route::group(['prefix'=>'admin','middleware'=>['checklevel','auth']],function(){
    Route::group(['prefix'=>'category'],function() {                        // route category
        Route::get('list','CategoryController@getList')->name('catlist');
        Route::get('create', 'CategoryController@create');
        Route::post('create', 'CategoryController@store')->name('create'); // ở đây muốn truy cập được vào ROUTE từ controller hay view thì cần đặt định danh cho ROUTE

        Route::get('edit/{id}','CategoryController@edit');
        Route::post('edit/{id}','CategoryController@update');
        Route::get('delete/{id}','CategoryController@delete');

        Route::get('{id}','CategoryController@show');
    });
    Route::group(['prefix'=>'product'],function() {                         // route product
        Route::get('list','ProductController@getList');
        Route::get('create', 'ProductController@create');
        Route::post('create', 'ProductController@store')->name('create');
        Route::get('edit/{id}','ProductController@edit');
        Route::post('edit/{id}','ProductController@update');
        Route::get('delete/{id}','ProductController@delete');
        Route::get('{id}','ProductController@show');
    });
    Route::group(['prefix'=>'user'],function() {                         // route product
        Route::get('list','UsersController@getList')->name('userlist');
        Route::get('{id}','UsersController@show');
    });


});

//thêm vào giỏ hàng
Route::get('add-to-cart/{id}',[
    'as'=>'addtocart',
    'uses'=>'PagesController@AddToCart'
]);
Route::get('delete-cart/{id}',[
    'as'=>'deletecart',
    'uses'=>'PagesController@DelItemCart'
]);

//auth
Route::get('login',[
    'as'=>'login',
    'uses'=>'PagesController@login'
]);
Route::post('login',[
    'as'=>'login',
    'uses'=>'PagesController@postlogin'
]);
Route::get('register',[
    'as'=>'register',
    'uses'=>'PagesController@register'
]);
Route::post('register',[
    'as'=>'register',
    'uses'=>'PagesController@postregister'
]);
Route::get('logout',[
    'as'=>'logout',
    'uses'=>'PagesController@postLogout'
]);
//endauth


Route::get('search',
    [
        'as'=>'search',
        'uses'=>'PagesController@getSearch'
    ]);
Route::get('dathang',
    [
        'as'=>'dathang',
        'uses'=>'OdersController@getCheckOut'
    ])->middleware('auth');
Route::post('dathang',
    [
        'as'=>'dathang',
        'uses'=>'OdersController@postCheckOut'
    ])->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('historybuy',[
    'as'=>'historybuy',
    'uses'=>'PagesController@historybuy'
])->middleware('auth');
Route::get('background/{id}','UsersController@background')->middleware('auth');
Route::get('changepass/{id}','UsersController@changepass1')->middleware('auth');
Route::post('changepass/{id}','UsersController@changepass')->middleware('auth');
