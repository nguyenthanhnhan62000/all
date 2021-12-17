<?php

use Illuminate\Support\Facades\Route;

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




Route::group(['prefix' => 'admin','namespace' =>'admin', 'middleware'=> 'auth' ], function()
{
    Route::get('/','AdminController@index') -> name('admin');
    route::get('/logout','AdminController@logout') -> name('logout');
    route::get('/file','FileController@index') -> name('file');
    Route::resources([
        'category' => 'CategoryController',
        'user' => 'UserController',
        'account' => 'AccountController',
        'banner' => 'BannerController',
        'product' => 'ProductController',
    ]);

    
});

route::get('admin/login','Admin\AdminController@login') -> name('login');

route::post('admin/login','Admin\AdminController@post_login') -> name('login');


route::get('/','HomeController@index') -> name('home');

route::get('/login','HomeController@login') -> name('home.login');

route::post('/login','HomeController@post_login') -> name('home.login');

route::get('/logout','HomeController@logout') -> name('home.logout');
route::get('gioi-thieu','HomeController@about') -> name('about');

route::get('/home/contact','HomeController@contact') -> name('contact');
route::post('/home/contact','HomeController@post_contact') -> name('contact');

route::get('/{slug}','HomeController@view') -> name('view');

route::group(['prefix' => 'cart'],function ()
{
    route::get('view','CartController@view') -> name('cart.view');
    route::get('add/{id}','CartController@add') -> name('cart.add');
    route::get('remove/{id}','CartController@remove') -> name('cart.remove');
    route::get('update/{id}','CartController@update') -> name('cart.update');
    route::get('clear/','CartController@clear') -> name('cart.clear');
});
route::group(['prefix' => 'checkout'],function ()
{
    route::get('/form','CheckoutController@form') -> name('checkout');
    route::post('/form','CheckoutController@post_form') -> name('checkout');

    route::get('checkout->success','CheckoutController@success') -> name('checkout.success');

   
});











