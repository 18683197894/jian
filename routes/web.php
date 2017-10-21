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
//软包套餐
Route::get('/package/softroll','Home\PackageController@softroll');
Route::get('/home/package/subclass/ajax/','Home\PackageController@ajax');
//设计量房
Route::get('/package/houseroom','Home\PackageController@houseroom');

//合作加盟
Route::get('jsgw/franchise','home\JsgwController@franchise');
Route::post('/jsgw/franchise/zmajax','Home\JsgwController@zmajax');

//廉洁规章
Route::get('jsgw/honest','home\JsgwController@honest');

//采购商入驻
Route::get('/jsgw/cgs','Home\JsgwController@cgs');

//工艺列表
Route::get('/home/gongyi/list/{id}','Home\GongyiController@index');
Route::get('/home/gongyi/play/{id}','Home\GongyiController@play');

//知识学堂
Route::get('home/plate/list/{id}','Home\PlateController@list');
Route::get('/home/plate/play/{id}','Home\PlateController@play');

//装修案例
Route::get('home/case/index','Home\CaseController@index');
Route::get('/home/case/tiaoajax/','Home\CaseController@tiaoajax');
Route::get('/home/case/zaiajax/','Home\CaseController@zaiajax');
Route::get('home/case/zaiindex','Home\CaseController@zaiindex');
Route::post('/home/case/jiaajax','Home\CaseController@jiaajax');

Route::get('/home/case/index/play/{id}','Home\CaseController@play');
Route::post('/home/case/play/ajax','Home\CaseController@playajax');
Route::get('home/case/indexurl','Home\CaseController@indexurl');

Route::get('home/case/zaiindex/play/{id}','Home\CaseController@zaiplay');
Route::get('home/case/zaiplay/zaiurl','Home\CaseController@zaiurl');

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

//软包
Route::get('admin/package/ruan/fashion','Admin\RuanController@fashion');
Route::get('/admin/package/ruan/joylity','Admin\RuanController@joylity');
Route::get('/admin/package/ruan/peghid','Admin\RuanController@peghid');
//风格添加
Route::post('admin/package/ruan/fgadds','Admin\RuanController@fgadds');
Route::get('/admin/package/ruan/fgadd/{id}','Admin\RuanController@fgadd');
Route::post('/admin/package/ruan/fgdel','Admin\RuanController@fgdel');
//风格编辑
Route::get('/admin/package/ruan/fenggeedit/{id}','Admin\RuanController@fenggeedit');
Route::post('/admin/package/ruan/fenggeedits/{id}','Admin\RuanController@fenggeedits');
Route::post('/admin/package/ruan/fgajax','Admin\RuanController@fgajax');
Route::post('/admin/package/ruan/fgajaxs','Admin\RuanController@fgajaxs');

//栏目管理
Route::get('admin/package/ruan/fg/column/{id}','Admin\RuanController@column');
//添加栏目
Route::get('/admin/package/ruan/fg/columnadd/{id}','Admin\RuanController@columnadd');
Route::post('/admin/package/ruan/fg/columnadds','Admin\RuanController@columnadds');

//栏目编辑
Route::get('admin/package/ruan/fg/columnedit/{id}','Admin\RuanController@columnedit');
Route::post('admin/package/ruan/fg/columnedits/{id}','Admin\RuanController@columnedits');
Route::post('admin/package/ruan/fg/columnajax','Admin\RuanController@columnajax');

//子类详情
Route::get('admin/package/ruan/fg/column/subclass/{id}','Admin\RuanController@subclass');
//子类详情
Route::get('admin/package/ruan/fg/column/subclassadd/{id}','Admin\RuanController@subclassadd');
Route::post('admin/package/ruan/fg/column/subclassadds','Admin\RuanController@subclassadds');
//子类编辑
Route::get('admin/package/ruan/fg/column/subclassedit/{id}','Admin\RuanController@subclassedit');
Route::post('admin/package/ruan/fg/column/subclassedits','Admin\RuanController@subclassedits');
Route::post('admin/package/ruan/fg/column/subclassajax','Admin\RuanController@subclassajax');

//装修工艺
Route::get('admin/gongyi/lei/list','Admin\GongyiController@index');
Route::get('admin/gongyi/lei/add','Admin\GongyiController@leiadd');
Route::post('admin/gongyi/lei/adds','Admin\GongyiController@leiadds');
Route::get('admin/gongyi/lei/edit/{id}','Admin\GongyiController@edit');
Route::post('admin/gongyi/lei/edits','Admin\GongyiController@edits');
Route::post('/admin/gongyi/lei/del','Admin\GongyiController@del');

//工艺文章管理
Route::get('/admin/gongyi/lei/newslist/{id}','Admin\GongyiController@newslist');
Route::get('admin/gongyi/lei/gongyinewsadd/{id}','Admin\GongyiController@gongyinewsadd');
Route::post('/admin/gongyi/lei/gongyinewsadds','Admin\GongyiController@gongyinewsadds');
Route::get('/admin/gongyi/lei/gongyi/newsedit/{id}','Admin\GongyiController@newsedit');
Route::post('/admin/gongyi/lei/gongyi/newsedits','Admin\GongyiController@newsedits');
Route::post('/admin/gongyi/lei/gongyi/newsdel','Admin\GongyiController@newsdel');
Route::post('/admin/gongyi/lei/gongyi/newszhi','Admin\GongyiController@newszhi');

//知识学堂
Route::get('admin/plate/add','Admin\PlateController@add');
Route::post('admin/plate/adds','Admin\PlateController@adds');
Route::get('admin/plate/index','Admin\PlateController@index');
Route::get('admin/plate/edit/{id}','Admin\PlateController@edit');
Route::post('admin/plate/edits','Admin\PlateController@edits');
Route::post('/admin/plate/del','Admin\PlateController@del');

Route::get('admin/plate/newslist/{id}','Admin\PlateController@newslist');
Route::get('/admin/plate/newsadd/{id}','Admin\PlateController@newsadd');
Route::post('admin/plate/newsadds','Admin\PlateController@newsadds');
Route::get('/admin/plate/newsedit/{id}','Admin\PlateController@newsedit');
Route::post('/admin/plate/newsedits/','Admin\PlateController@newsedits');
Route::post('/admin/plate/newszhi','Admin\PlateController@newszhi');
Route::post('/admin/plate/newsdel','Admin\PlateController@newsdel');

//案例管理
Route::get('admin/case/index','Admin\CaseController@index');
Route::get('admin/case/add','Admin\CaseController@add');
Route::post('admin/case/adds','Admin\CaseController@adds');
Route::get('admin/case/edit/{id}','Admin\CaseController@edit');
Route::post('admin/case/edits','Admin\CaseController@edits');
Route::post('admin/case/upds','Admin\CaseController@upds');
Route::post('admin/case/del','Admin\CaseController@del');
//数据填充
Route::get('admin/add','Admin\RuanController@subclassajax@add');

});

Route::get('/jslmadmin/login','Admin\LoginController@login');
Route::post('jslmindex/dologin','Admin\LoginController@dologin');