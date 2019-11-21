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
// //闭包路由
// Route::get('/', function () {
//     return view('welcome');
// });
// //闭包
// Route::get('/hello',function(){
//     echo 123;
// });

//post路由
// Route::post('/doform',function(){
//     $post=request()->post();
//     dd($post);
// });


// Route::get('/goods/{goods_id}','RegController@goods');
// Route::get('/goods/{goods_id?}','RegController@goods');

// Route::get('/show/{id}/{name?}',function($id,$name='0'){
//     echo $id;
//     echo $name;
// })->where(['id'=>'\d+','name'=>'\w+']);
// Route::get('/show2/{id?}',function($id='0'){
//     echo $id;
// });
//登录
// Route::view('/login','login');
// Route::domain('admin.1905.com')->group(function(){
    //品牌
    Route::prefix('/brand')->middleware('auth')->group(function () {
        Route::get('create','admin\BrandController@create');
        Route::post('store','admin\BrandController@store');  
        Route::get('index','admin\BrandController@index');
        Route::get('destroy/{id}','admin\BrandController@destroy');
        Route::get('edit/{id}','admin\BrandController@edit');   
        Route::post('update/{id}','admin\BrandController@update');  
        Route::post('checkOnly','admin\BrandController@checkOnly');                              
    });
    //分类
    Route::prefix('/cate')->middleware('auth')->group(function () {
        Route::get('create','admin\CateController@create');
        Route::post('store','admin\CateController@store');  
        Route::get('index','admin\CateController@index');
        Route::get('destroy/{id}','admin\CateController@destroy'); 
        Route::get('edit/{id}','admin\CateController@edit');   
        Route::post('update/{id}','admin\CateController@update');                        
    });
    //管理员
    Route::prefix('/admin')->middleware('auth')->group(function () {
        Route::get('create','admin\AdminController@create');
        Route::post('store','admin\AdminController@store');  
        Route::get('index','admin\AdminController@index');
        Route::get('destroy/{id}','admin\AdminController@destroy');  
        Route::get('edit/{id}','admin\AdminController@edit');   
        Route::post('update/{id}','admin\AdminController@update');                         
    });
    //商品
    Route::prefix('/goods')->middleware('auth')->group(function () {
        Route::get('create','admin\GoodsController@create');
        Route::post('store','admin\GoodsController@store');  
        Route::get('index','admin\GoodsController@index');
        Route::get('destroy/{id}','admin\GoodsController@destroy');  
        Route::get('edit/{id}','admin\GoodsController@edit');   
        Route::post('update/{id}','admin\GoodsController@update');                         
    });
    
    Route::get('/reg','RegController@index');
    Route::post('/doform','RegController@doform');
    //登录
    Route::view('login','login')->name('login');
    route::post('/dologin','RegController@dologin');
    //注册
    Route::view('reg','reg');
    route::post('/doReg','RegController@doReg');
    // Auth::routes();

    // Route::get('/home', 'HomeController@index')->name('home');
    //测试
    Route::prefix('/test')->middleware('auth')->group(function () {
        Route::get('create','test\TestController@create');
        Route::post('store','test\TestController@store');  
        Route::get('index','test\TestController@index');
        Route::get('destroy/{id}','test\TestController@destroy');  
        Route::get('edit/{id}','test\TestController@edit');   
        Route::post('update/{id}','test\TestController@update');  
        Route::post('checkOnly','test\TestController@checkOnly');   

    });
    Route::get('/test/list','test\ClaController@list');


//});
// Route::get('/','Index\IndexController@index');
// Route::view('/index/login','index.login.login');
// Route::view('/reg','index.login.reg');
//邮件
Route::get('/send','Index\LoginController@send');
Route::post('/loginDo','Index\LoginController@loginDo');
Route::post('/regDo','Index\LoginController@regDo');

//商品
Route::get('/index','Index\GoodsController@index');







