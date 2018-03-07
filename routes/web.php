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
Route::get('/used','Home\AdminController@index');
Route::get('/','Newpro\Home\IndexController@index');
//智能家居
Route::get('/newpro/smarthome','Newpro\Home\SmartController@smarthome');
//住宅智能社区
Route::get('/newpro/ressmartunity','Newpro\Home\SmartController@ressmartunity');
//商业智慧商圈
Route::get('/newpro/businsmart','Newpro\Home\SmartController@businsmart');

//关于我们
Route::get('/newpro/about','Newpro\Home\UsedController@about');
//新闻列表
Route::get('/newpro/newslist/{id}','Newpro\Home\NewsController@newslist');
Route::get('/newpro/newslist/play/{id}','Newpro\Home\NewsController@newsplay');
//案例列表
Route::get('/newpro/case/index','Newpro\Home\CaseController@index');
Route::get('/newpro/case/setajax','Newpro\Home\CaseController@setajax');
Route::post('/newpro/case/getmoreajax','Newpro\Home\CaseController@getmoreajax');
Route::post('/newpro/case/zaiajax','Newpro\Home\CaseController@zaiajax');
Route::post('/newpro/case/pagemoreajax','Newpro\Home\CaseController@pagemoreajax');
Route::post('/newpro/case/wanajax','Newpro\Home\CaseController@wanajax');

//完整案例
Route::get('/newpro/case/play/{id}','Newpro\Home\CaseController@play');
Route::get('/newpro/case/playindex','Newpro\Home\CaseController@playindex');

//在建案例
Route::get('/newpro/case/zaiplay/{id}','Newpro\Home\CaseController@zaiplay');

//软包
Route::get('/newpro/style','Newpro\Home\StyleController@styleindex');
Route::post('/newpro/style/paygouajax','Newpro\Home\StyleController@paygouajax');


//登入
Route::get('newpro/login','Newpro\Home\LoginController@login');
Route::post('/newpro/logins','Newpro\Home\LoginController@logins');
Route::get('/newpro/register','Newpro\Home\LoginController@register');
Route::post('/newpro/registers','Newpro\Home\LoginController@registers');
Route::get('/newpro/register/chongajax','Newpro\Home\LoginController@chongajax');
Route::post('/newpro/register/zendcode','Newpro\Home\LoginController@zendcode');
Route::get('/newpro/register/yan','Newpro\Home\LoginController@yan');
//德福调查问卷
Route::get('/newpro/defu/questionnaire/index','Newpro\Home\QuestionController@defuindex');
Route::get('/newpro/defu/questionnaire/name','Newpro\Home\QuestionController@defuname');
Route::get('/newpro/defu/questionnaire/phone','Newpro\Home\QuestionController@defuphone');
Route::get('/newpro/defu/questionnaire/qccupation','Newpro\Home\QuestionController@defuqccupation');
Route::get('/newpro/defu/questionnaire/resident','Newpro\Home\QuestionController@defuresident');
Route::get('/newpro/defu/questionnaire/service','Newpro\Home\QuestionController@defuservice');
Route::get('/newpro/defu/questionnaire/care','Newpro\Home\QuestionController@defucare');
Route::get('/newpro/defu/questionnaire/style','Newpro\Home\QuestionController@defustyle');
Route::get('/newpro/defu/questionnaire/money','Newpro\Home\QuestionController@defumoney');
Route::get('/newpro/defu/questionnaire/intelligence','Newpro\Home\QuestionController@defuintelligence');
Route::get('/newpro/defu/questionnaire/door','Newpro\Home\QuestionController@defudoor');
Route::get('/newpro/defu/questionnaire/feel','Newpro\Home\QuestionController@defufeel');
Route::get('/newpro/defu/questionnaire/ors','Newpro\Home\QuestionController@defuors');

//织金调查问卷
Route::get('/newpro/zhijin/questionnaire/index','Newpro\Home\QuestionController@zhijinindex');
Route::get('/newpro/zhijin/questionnaire/name','Newpro\Home\QuestionController@zhijinname');
Route::get('/newpro/zhijin/questionnaire/phone','Newpro\Home\QuestionController@zhijinphone');
Route::get('/newpro/zhijin/questionnaire/qccupation','Newpro\Home\QuestionController@zhijinqccupation');
Route::get('/newpro/zhijin/questionnaire/resident','Newpro\Home\QuestionController@zhijinresident');
Route::get('/newpro/zhijin/questionnaire/service','Newpro\Home\QuestionController@zhijinservice');
Route::get('/newpro/zhijin/questionnaire/care','Newpro\Home\QuestionController@zhijincare');
Route::get('/newpro/zhijin/questionnaire/style','Newpro\Home\QuestionController@zhijinstyle');
Route::get('/newpro/zhijin/questionnaire/money','Newpro\Home\QuestionController@zhijinmoney');
Route::get('/newpro/zhijin/questionnaire/intelligence','Newpro\Home\QuestionController@zhijinintelligence');
Route::get('/newpro/zhijin/questionnaire/door','Newpro\Home\QuestionController@zhijindoor');
Route::get('/newpro/zhijin/questionnaire/feel','Newpro\Home\QuestionController@zhijinfeel');
Route::get('/newpro/zhijin/questionnaire/ors','Newpro\Home\QuestionController@zhijinors');

//楼盘
Route::get('/propertieszshx','Home\PropertiesController@zshx');
Route::get('/propertiesdfhx','Home\PropertiesController@dfhx');
Route::get('/propertieshfhx','Home\PropertiesController@hfhx');
Route::get('/propertieshfhx/details/{id}','Home\PropertiesController@details');
Route::get('/propertieshfhx/newslist','Home\PropertiesController@hfnewslist');
Route::get('/propertieshfhx/newslist/play/{id}','Home\PropertiesController@hfnewsplay');

//关于
Route::get('/jsgw/aboutus','Home\JsgwController@aboutus');

//团队
Route::get('/jsgw/tuandui','Home\JsgwController@tuandui');

//发展战略
Route::get('/jsgw/zhanlui','Home\JsgwController@zhanlui');

//联系我们
Route::get('/jsgw/contact','Home\JsgwController@contact');
Route::get('/jsgw/goujia','Home\JsgwController@goujia');
//用人理念
Route::get('/jsgw/job1','Home\JsgwController@job1');

//新零售品台
Route::get('/jsgw/ls','Home\JsgwController@ls');

//精装房项目
Route::get('/jsgw/jzf','Home\JsgwController@jzf');

//线下体验馆
Route::get('/jsgw/tyg','Home\JsgwController@tyg');

//招聘职位
Route::get('/jsgw/job5','Home\JsgwController@job5');
Route::get('/jsgw/job6','Home\JsgwController@job6');

//首页楼盘预约
Route::post('/home/loupanajax','Home\LiuyanController@loupanajax');

//首页装修预约
Route::post('/home/zhuangxiuajax','Home\LiuyanController@zhaungxiuajax');

//设计风格
Route::get('/design/{id?}','Home\JsgwController@design');

//设计量房
Route::get('/amount','Home\JsgwController@amount');

//NEWS新闻
Route::get('/news/{id}','Home\JsgwController@news');

Route::get('/news/list/{id}','Home\JsgwController@newslist');

//全包套餐
Route::get('/package/allcse','Home\PackageController@allcse');
//软包套餐
Route::get('/package/softroll','Home\PackageController@softroll');
Route::get('/home/package/subclass/ajax/','Home\PackageController@ajax');
//装修报价
Route::get('/package/houseroom','Home\PackageController@houseroom');

//合作加盟
Route::get('/jsgw/franchise','Home\JsgwController@franchise');
Route::post('/jsgw/franchise/zmajax','Home\JsgwController@zmajax');

//产品供应
Route::get('/jsgw/supply','Home\JsgwController@supply');

//廉洁规章
Route::get('/jsgw/honest','Home\JsgwController@honest');

//采购商入驻
Route::get('/jsgw/cgs','Home\JsgwController@cgs');

//工艺列表
Route::get('/home/gongyi/list/{id}','Home\GongyiController@index');
Route::get('/home/gongyi/play/{id}','Home\GongyiController@play');

//知识学堂
Route::get('/home/plate/list/{id}','Home\PlateController@list');
Route::get('/home/plate/play/{id}','Home\PlateController@play');

//装修案例
Route::get('home/case/index','Home\CaseController@index');
Route::get('/home/case/tiaoajax/','Home\CaseController@tiaoajax');
Route::get('/home/case/zaiajax/','Home\CaseController@zaiajax');
Route::get('/home/case/zaiindex','Home\CaseController@zaiindex');
Route::post('/home/case/jiaajax','Home\CaseController@jiaajax');

Route::get('/home/case/index/play/{id}/{es?}','Home\CaseController@play');
Route::post('/home/case/play/ajax','Home\CaseController@playajax');
Route::get('/home/case/indexurl','Home\CaseController@indexurl');

Route::get('/home/case/zaiindex/play/{id}','Home\CaseController@zaiplay');
Route::get('/home/case/zaiplay/zaiurl','Home\CaseController@zaiurl');

//搜索
Route::get('/home/sou','Home\AdminController@sou');

//***************************************************************************
Route::group(['middleware' => ['Login']], function () {
//主页
Route::get('/jslmadmin/index','Admin\IndexController@index');
//退出
Route::get('/jslmext','Admin\LoginController@jslmext');



Route::group(['middleware'=>['Yxb']],function(){
//用户管理
Route::get('/jslmadmin/userhome/index','Admin\HomeController@index');
//用户的购物车
Route::get('/jslmadmin/userhome/playgou/{id}','Admin\HomeController@playgou');

Route::post('/jslmadmin/userhome/index/statusajax','Admin\HomeController@statusajax');



//新闻动态
Route::get('jslmadmin/newsleiadd','Admin\NewsController@newsleiadd');
Route::post('jslmadmin/newsleiadds','Admin\NewsController@newsleiadds');
Route::get('/jslmadmin/newsleiindex','Admin\NewsController@newsleiindex');
Route::get('/jslmadmin/newsleiedit/{id}','Admin\NewsController@newsleiedit');
Route::post('jslmadmin/newsleiedits','Admin\NewsController@newsleiedits');
Route::post('/jslmadmin/newsleidel','Admin\NewsController@newsleidel');

Route::get('jslmadmin/newslei/newsindex/{id}','Admin\NewsController@newsindex');
Route::get('jslmadmin/newslei/newsadd/{id}','Admin\NewsController@newsadd');
Route::post('jslmadmin/newslei/newsadds','Admin\NewsController@newsadds');
Route::get('jslmadmin/newslei/newsedit/{id}','Admin\NewsController@newsedit');
Route::post('jslmadmin/newslei/newsedits','Admin\NewsController@newsedits');
Route::post('/jslmadmin/newslei/newsdel','Admin\NewsController@newsdel');
Route::post('/jslmadmin/newslei/newszhi','Admin\NewsController@newszhi');

Route::get('/jslmadmin/newslei/newszhiindex/{id}','Admin\NewsController@newszhiindex');
Route::get('/jslmadmin/newslei/newszhiindex/ban/{id}','Admin\NewsController@ban');
Route::post('/jslmadmin/newslei/newszhiindex/bans','Admin\NewsController@bans');
Route::get('/jslmadmin/newslei/newszhiindex/zhiadd/{id}','Admin\NewsController@zhiadd');
Route::post('/jslmadmin/newslei/newszhiindex/zhiadds','Admin\NewsController@zhiadds');
Route::get('/jslmadmin/newslei/newszhiindex/zhiedit/{id}','Admin\NewsController@zhiedit');
Route::post('/jslmadmin/newslei/newszhiindex/zhiedits','Admin\NewsController@zhiedits');
Route::post('/jslmadmin/newslei/newszhiindex/zhidel','Admin\NewsController@zhidel');

//Newpro 风格 包
Route::get('/admin/product/style/index','Admin\StyleController@styleindex');
Route::get('/admin/product/style/styleadd','Admin\StyleController@styleadd');
Route::post('/admin/product/style/styleadds','Admin\StyleController@styleadds');
Route::get('/admin/product/style/styleedit/{id}','Admin\StyleController@styleedit');
Route::post('/admin/product/style/styleedits/{id}','Admin\StyleController@styleedits');
Route::post('/admin/product/style/styledel','Admin\StyleController@styledel');
Route::get('/admin/product/style/qingedit','Admin\StyleController@qingedit');
Route::post('/admin/product/style/qingedits/{id}','Admin\StyleController@qingedits');

Route::get('/admin/product/style/doorindex/{id}','Admin\StyleController@doorindex');
Route::get('/admin/product/style/dooradd/{id}','Admin\StyleController@dooradd');
Route::post('/admin/product/style/dooradds','Admin\StyleController@dooradds');
Route::get('/admin/product/style/dooredit/{id}','Admin\StyleController@dooredit');
Route::post('/admin/product/style/dooredits','Admin\StyleController@dooredits');
Route::post('/admin/product/style/doordel','Admin\StyleController@doordel');
Route::get('/admin/product/style/mainindex/{id}','Admin\StyleController@mainindex');

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


//全包套餐
Route::get('admin/package/all','Admin\AllController@all');
Route::get('admin/package/alladd','Admin\AllController@alladd');
Route::post('admin/package/alladds','Admin\AllController@alladds');
Route::get('admin/package/alledit/{id}','Admin\AllController@alledit');
Route::post('admin/package/alledits','Admin\AllController@alledits');

Route::get('/admin/package/all/pei/{id}','Admin\AllController@pei');
Route::get('admin/package/all/peiadd/{id}','Admin\AllController@peiadd');
Route::post('admin/package/all/peiadds','Admin\AllController@peiadds');
Route::get('admin/package/all/peiedit/{id}','Admin\AllController@peiedit');
Route::post('admin/package/all/peiedits','Admin\AllController@peiedits');
Route::post('/admin/package/all/peidel','Admin\AllController@peidel');

Route::get('admin/package/all/pei/sub/{id}','Admin\AllController@sub');
Route::get('admin/package/all/pei/subadd/{id}','Admin\AllController@subadd');
Route::post('admin/package/all/pei/subadds','Admin\AllController@subadds');
Route::get('admin/package/all/pei/subedit/{id}','Admin\AllController@subedit');
Route::post('admin/package/all/pei/subedits','Admin\AllController@subedits');
Route::post('/admin/package/all/pei/subdel','Admin\AllController@subdel');

Route::get('/admin/package/all/zi/{id}','Admin\AllController@zi');
Route::get('/admin/package/all/ziadd/{id}','Admin\AllController@ziadd');
Route::post('/admin/package/all/ziadds','Admin\AllController@ziadds');
Route::get('/admin/package/all/ziedit/{id}','Admin\AllController@ziedit');
Route::post('/admin/package/all/ziedits','Admin\AllController@ziedits');
Route::post('/admin/package/all/zidel','Admin\AllController@zidel');

Route::get('/admin/package/all/pack','Admin\AllController@pack');
Route::get('/admin/package/all/packadd','Admin\AllController@packadd');
Route::post('/admin/package/all/packadds','Admin\AllController@packadds');
Route::post('/admin/package/all/packdel','Admin\AllController@packdel');
Route::get('/admin/package/all/packedit/{id}','Admin\AllController@packedit');
Route::post('/admin/package/all/packedits','Admin\AllController@packedits');

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

//首页楼盘预约
Route::get('admin/indexpropermake','Admin\MakeController@indexpropermake');
Route::post('admin/indexpropermakeajax','Admin\MakeController@indexpropermakeajax');
Route::post('admin/indexpropermakedel','Admin\MakeController@indexpropermakedel');

//首页装修报价预约
Route::get('admin/indexationmake','Admin\MakeController@indexationmake');
Route::post('/admin/indexationmakeajax','Admin\MakeController@indexationmakeajax');
Route::post('/admin/indexactionmakedel','Admin\MakeController@indexactionmakedel');

//合作伙伴招募
Route::get('admin/franchisezm','Admin\MakeController@franchisezm');
Route::post('/admin/franchisezmajax','Admin\MakeController@franchisezmajax');
Route::post('/admin/franchisezmdel','Admin\MakeController@franchisezmdel');

//案例页装修设计预约
Route::get('admin/caseplay','Admin\MakeController@caseplay');
Route::post('/admin/caseplayajax','Admin\MakeController@caseplayajax');
Route::post('/admin/caseplaydel','Admin\MakeController@caseplaydeldel');

//网页关键字
Route::get('admin/config/webpage','Admin\ConfigController@webpage');
Route::get('admin/config/webpage/edit/{id}','Admin\ConfigController@webpageedit');
Route::post('admin/config/webpage/edits','Admin\ConfigController@webpageedits');
Route::get('/admin/config/wepage/add','Admin\ConfigController@add');
Route::post('/admin/config/webpage/adds','Admin\ConfigController@adds');

//导航栏目
Route::get('admin/config/nav','Admin\ConfigController@nav');
Route::get('/admin/config/nav/add','Admin\ConfigController@navadd');
Route::post('admin/config/nav/navadds','Admin\ConfigController@navadds');
Route::get('/home/config/nav/edit/{id}','Admin\ConfigController@navedit');
Route::post('/admin/config/nav/navedits','Admin\ConfigController@navedits');
Route::post('/admin/config/nav/navdelajax','Admin\ConfigController@navdelajax');
Route::post('/admin/config/nav/navshang','Admin\ConfigController@navshang');
Route::post('/admin/config/nav/navxia','Admin\ConfigController@navxia');

//织金楼盘动态管理
Route::get('admin/properties/details','Admin\PropertiesController@details');
Route::get('admin/properties/detailsedit/{id}','Admin\PropertiesController@detailsedit');
Route::post('admin/properties/detailsedits','Admin\PropertiesController@detailsedits');
Route::post('admin/properties/detailsdel','Admin\PropertiesController@detailsdel');
//织金文章添加
Route::get('admin/properties/detailsadd','Admin\PropertiesController@detailsadd');
Route::post('admin/properties/detailsadds','Admin\PropertiesController@detailsadds');

//织金新闻管理
Route::get('admin/properties/hfnews','Admin\PropertiesController@hfnews');
Route::get('/admin/properties/hfnewsedit/{id}','Admin\PropertiesController@hfnewsedit');
Route::post('/admin/properties/hfnewsedits','Admin\PropertiesController@hfnewsedits');
Route::post('/admin/properties/hfnewsdel','Admin\PropertiesController@hfnewsdel');
//织金新闻添加
Route::get('admin/properties/hfnewsadd','Admin\PropertiesController@hfnewsadd');
Route::post('admin/properties/hfnewsadds','Admin\PropertiesController@hfnewsadds');

//订单
Route::get('jslmadmin/payment/index','Admin\PayController@index');
Route::get('jslmadmin/payment/index/shopping/{id}','Admin\PayController@shopping');
Route::get('/jslmadmin/userhome/orders/{id}','Admin\PayController@userhome_orders');
});
//调查问卷
Route::get('admin/question/zhijin/index','Admin\QuestionController@zhijinindex');
Route::get('admin/question/defu/index','Admin\QuestionController@defuindex');
Route::post('admin/question/index/del','Admin\QuestionController@indexdel');
});

//web支付微信
Route::get('webpro/webpay_wechat','Pay\WebpayController@webpay_wechat');
Route::post('webpro/webpay_wechats','Pay\WebpayController@webpay_wechats');
Route::any('/webpro/weixinweb_hui','Pay\WebpayController@weixinweb_hui');
Route::any('/webpro/weixinweb/wechat_notify','Pay\WebpayController@wechat_notify');

Route::get('webpro/webpay_alipay','Pay\WebpayController@webpay_alipay');

//测试
Route::get('home/cs','Home\HomeController@cs');
Route::get('home/css','Home\HomeController@css');

//后台登入
Route::get('/jslmadmin/login','Admin\LoginController@login');
Route::post('jslmindex/dologin','Admin\LoginController@dologin');

//前台登入
Route::get('/home/login/{id?}','Home\LoginController@login');
Route::post('/home/dologin','Home\LoginController@dologin');
//注册
Route::get('/home/register','Home\LoginController@register');
Route::post('/home/register/nameajax','Home\LoginController@nameajax');
Route::post('/home/register/phoneajax','Home\LoginController@phoneajax');
Route::post('/home/register/zendcode','Home\LoginController@zendcode');
Route::post('/home/register/yanajax','Home\LoginController@yanajax');
Route::post('/home/register/doreg','Home\LoginController@doreg');


//前台登录中间间
Route::group(['middleware'=>['HomeLogin']],function(){

//购物车
Route::get('/newpro/shoppingcart','Newpro\Home\PayController@shoppingcart');
Route::get('/newpro/shoppingcart/ajax','Newpro\Home\PayController@shoppingcartajax');

//支付页面
Route::any('/newpro/payment','Newpro\Home\PayController@payment');
Route::get('/newpro/payment/addressajax','Newpro\Home\PayController@addressajax');
Route::post('/newpro/shoppingcart/addressadd','Newpro\Home\PayController@addressadd');
Route::get('/newpro/payment/addressstatus','Newpro\Home\PayController@addressstatus');
Route::get('/newpro/payment/addressdel','Newpro\Home\PayController@addressdel');
Route::get('/newpro/payment/addressgetedit','Newpro\Home\PayController@addressgetedit');

Route::any('/newpro/payments','Newpro\Home\PayController@payments');
Route::get('newpro/payments/paymentsget','Newpro\Home\PayController@paymentsget');

//个人中心 我的订单
Route::get('/newpro/center/my_orders','Newpro\Home\CenterController@my_orders');
//收货地址
Route::get('/newpro/center/my_address','Newpro\Home\CenterController@my_address');
//修改密码
Route::get('/newpro/center/my_modify','Newpro\Home\CenterController@my_modify');
Route::post('/newpro/center/my_modify/passajax','Newpro\Home\CenterController@passajax');
//消息
Route::get('/newpro/center/my_notice','Newpro\Home\CenterController@my_notice');
//我的个人中心
Route::get('/newpro/center/my_personal','Newpro\Home\CenterController@my_personal');
Route::get('/newpro/center/my_metion','Newpro\Home\CenterController@my_metion');
Route::post('/newpro/center/my_metion/ajax','Newpro\Home\CenterController@my_metionajax');
Route::post('/newpro/center/my_metion/post','Newpro\Home\CenterController@my_metionpost');
//购物车
Route::get('/home/shoppingcart','Home\HomeController@shoppingcart');
Route::get('/home/shoppingcart/numajax','Home\HomeController@numajax');
Route::post('/home/shoppingcart/del','Home\HomeController@goudel');

//提交订单
Route::get('/home/shoppingcart/payment','Home\HomeController@payment');
Route::post('/home/shoppingcart/payments','Home\HomeController@payments');
Route::get('/home/shoppingcart/payment/dizhiajax','Home\HomeController@dizhiajax');
Route::post('/home/shoppingcart/payment/address','Home\HomeController@address');
Route::get('/home/sohppingcart/payment/editaddress','Home\HomeController@editaddress');
Route::post('/home/shoppingcart/payment/addressedit','Home\HomeController@addressedit');
Route::post('/home/shoppingcart/payment/addressdel','Home\HomeController@addressdel');
Route::get('/home/shoppingcart/payment/addressstatus','Home\HomeController@addressstatus');
Route::get('/home/shoppingcart/payment/ordersajax','Home\HomeController@ordersajax');
Route::get('/payments/pay/paymentsget','Pay\PayController@paymentsget');
//软包加入购物车
Route::post('/home/package/softroll/gouajax','Home\PackageController@gouajax');

});

//支付回调
Route::any('/payment/wechat/notify','Pay\PayController@wechatnotify');
Route::any('/payment/alipay/notify','Pay\PayController@alipaynotify');
