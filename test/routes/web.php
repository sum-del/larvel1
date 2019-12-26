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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::post('/user',function (){
//    return 'post';
//});
//Route::match(['get','post'],'/user',function (){
//    return 'hello';
//});
//Route::any('/user',function (){
//    return '我是夏利';
//});
//Route::get("/user/{id}",function ($id){
//    return'id-'.$id;
//})->where('id','[0-9]+');
//Route::get("/user/{id}/{name?}",function (){
//    return'hello';
//})->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);
//取别名,获得路径名,调用route函数
//Route::get('order/center',['as'=>'center',function (){
//    return route('center');
//}]);
//路由群组
//Route::group(['prefix'=>'user'],function (){
//    Route::get('/center',function (){
//       return 'hello';
//    });
//});
//Route::get('/center',function (){
//    return 'hello';
//});
//Route::get('/user/{id?}','UserController@info');
//Route::get('/user/exec','UserController@db1');
//群组user
Route::group(['prefix'=>'user'],function (){
    Route::get('/query','UserController@query');
    Route::get('/orm','UserController@orm');
    Route::get('/orm2','UserController@orm2');
    Route::get('/orm3','UserController@orm3');
    Route::get('/orm4','UserController@orm4');
    Route::get('/','UserController@show');
    Route::get('/del/{id}','UserController@del');
    Route::get('/edit/{id}','UserController@edit');
    Route::get('/doedit/{id}','UserController@doedit');
    Route::get('/detail/{id}','UserController@detail');
    Route::get('/adds','UserController@add');
    Route::get('/add',function (){
        return view('add');
    });
});


