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

// Route::get('/', function () {
//     return view('heads');
// });
Route::get('/','Home\AdminController@index');

//楼盘
Route::get('/propertieszshx','Home\PropertiesController@zshx');
Route::get('/propertiesdfhx','Home\PropertiesController@dfhx');
Route::get('/propertieshfhx','Home\PropertiesController@hfhx');

//关于
Route::get('/jsgw/aboutus','Home\JsgwController@aboutus');

//团队
Route::get('/jsgw/tuandui','Home\JsgwController@tuandui');

//发展战略
Route::get('/jsgw/zhanlui','Home\JsgwController@zhanlui');

//联系我们
Route::get('/jsgw/contact','Home\JsgwController@contact');

//用人理念
Route::get('/jsgw/job1','Home\JsgwController@job1');

//新零售品台
Route::get('/jsgw/ls','Home\JsgwController@ls');

//精装房项目
Route::get('/jsgw/jzf','Home\JsgwController@jzf');

//精装房项目
Route::get('/jsgw/tyg','Home\JsgwController@tyg');

//招聘职位
Route::get('/jsgw/job5','Home\JsgwController@job5');
Route::get('/jsgw/job6','Home\JsgwController@job6');

//首页楼盘预约
Route::post('/home/loupanajax','Home\LiuyanController@loupanajax');

//首页装修预约
Route::post('/home/zhaungxiuajax','Home\LiuyanController@zhaungxiuajax');

//设计风格
Route::get('/design/{id?}','Home\JsgwController@design');

//设计量房
Route::get('/amount','Home\JsgwController@amount');

//NEWS新闻
Route::get('/news','Home\JsgwController@news');

Route::get('/news/list/{id}','Home\JsgwController@newslist');

//全包套餐
Route::get('/package/allcse','Home\PackageController@allcse');


Route::group(['middleware' => ['Login']], function () {

//主页
Route::get('/jslmadmin/index','Admin\IndexController@index');
//退出
Route::get('/jslmext','Admin\LoginController@jslmext');
//新闻添加
Route::get('jslmadmin/newsadd','Admin\NewsController@newsadd');    
Route::post('jslmadmin/newsadds','Admin\NewsController@newsadds');
//新闻列表
Route::get('jslmadmin/newsindex','Admin\NewsController@newsindex');
Route::get('jslmadmin/newsedit/{id}','Admin\NewsController@newsedit');
Route::post('jslmadmin/newsedits','Admin\NewsController@newsedits');
Route::post('jslmadmin/newsajaxshan','Admin\NewsController@newsajaxshan');
Route::post('jslmadmin/newsajaxzhi','Admin\NewsController@newsajaxzhi');
});

Route::get('/jslmadmin/login','Admin\LoginController@login');
Route::post('jslmindex/dologin','Admin\LoginController@dologin');