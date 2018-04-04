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

Route::get('/newpro/home/sou','Newpro\Home\NewsController@sou');

//Package
Route::get('/newpro/package/jizhuang','Newpro\Home\PackageController@jizhuangindex');
Route::get('/newpro/package/ruanzhuang','Newpro\Home\PackageController@ruanzhuangindex');
Route::get('/newpro/package/zhineng','Newpro\Home\PackageController@zhinengindex');
Route::post('/newpro/package/playgou','Newpro\Home\PackageController@playgou');
Route::post('/newpro/package/playgouors','Newpro\Home\PackageController@playgouors');
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
Route::post('/newpro/case/playajax','Newpro\Home\CaseController@playajax');

//在建案例
Route::get('/newpro/case/zaiplay/{id}','Newpro\Home\CaseController@zaiplay');

//软包
Route::get('/newpro/style','Newpro\Home\StyleController@styleindex');
Route::post('/newpro/style/paygouajax','Newpro\Home\StyleController@paygouajax');

//楼盘
Route::get('/newpro/estate/defu','Newpro\Home\EstateController@defu');
Route::get('/newpro/estate/defu/details','Newpro\Home\EstateController@defudetails');

Route::get('/newpro/estate/zheshang','Newpro\Home\EstateController@zheshang');
Route::get('/newpro/estate/zheshang/details','Newpro\Home\EstateController@zheshangdetails');

Route::get('/newpro/estate/zhijin','Newpro\Home\EstateController@zhijin');
Route::get('/newpro/estate/zhijin/details','Newpro\Home\EstateController@zhijindetails');
Route::get('/newpro/estate/zhijin/inter/{id}','Newpro\Home\EstateController@zhijininter');
Route::get('/newpro/estate/zhijin/newsplay/{id}','Newpro\Home\EstateController@zhijinnewsplay');
Route::get('/newpro/estate/zhijin/newslist','Newpro\Home\EstateController@zhijinnewslist');

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

//智能家居调查问卷
Route::get('/newpro/defu/smartquestionnaire/index','Newpro\Home\QuestionController@defusmartindex');
Route::get('/newpro/defu/smartquestionnaire/home','Newpro\Home\QuestionController@defusmarthome');
//assas
Route::post('/newpro/defu/smartquestionnaire/home/ajax','Newpro\Home\QuestionController@defusmarthomeajax');


//***************************************************************************
Route::group(['middleware' => ['Login']], function () {
//主页
Route::get('/jslmadmin/index','Admin\IndexController@index');
//退出
Route::get('/jslmext','Admin\LoginController@jslmext');



Route::group(['middleware'=>['Yxb']],function(){

//产品管理
Route::get('newpro/index/package/packageindex','Admin\PackageController@packageindex');
Route::get('newpro/index/package/packageadd','Admin\PackageController@packageadd');
Route::post('newpro/index/package/packageadds','Admin\PackageController@packageadds');
Route::get('newpro/index/package/packageedit','Admin\PackageController@packageedit');
Route::post('newpro/index/package/packageedits','Admin\PackageController@packageedits');
Route::post('newpro/index/package/packagedel','Admin\PackageController@packagedel');



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

//文章列表置顶
Route::get('/jslmadmin/newslei/newszhiindex/{id}','Admin\NewsController@newszhiindex');
Route::get('/jslmadmin/newslei/newszhiindex/ban/{id}','Admin\NewsController@ban');
Route::post('/jslmadmin/newslei/newszhiindex/bans','Admin\NewsController@bans');
Route::get('/jslmadmin/newslei/newszhiindex/zhiadd/{id}','Admin\NewsController@zhiadd');
Route::post('/jslmadmin/newslei/newszhiindex/zhiadds','Admin\NewsController@zhiadds');
Route::get('/jslmadmin/newslei/newszhiindex/zhiedit/{id}','Admin\NewsController@zhiedit');
Route::post('/jslmadmin/newslei/newszhiindex/zhiedits','Admin\NewsController@zhiedits');
Route::post('/jslmadmin/newslei/newszhiindex/zhidel','Admin\NewsController@zhidel');

//文章首页置顶
Route::post('jslmadmin/newslei/newsszhiindex/szhiadd','Admin\NewsController@szhiadd');
Route::get('jslmadmin/newslei/newsszhiindex/index','Admin\NewsController@szhiindex');



//案例管理
Route::get('admin/case/index','Admin\CaseController@index');
Route::get('admin/case/add','Admin\CaseController@add');
Route::post('admin/case/adds','Admin\CaseController@adds');
Route::get('admin/case/edit/{id}','Admin\CaseController@edit');
Route::post('admin/case/edits','Admin\CaseController@edits');
Route::post('admin/case/upds','Admin\CaseController@upds');
Route::post('admin/case/del','Admin\CaseController@del');


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
Route::get('admin/question/defu/smartindex','Admin\QuestionController@defusmartindex');
Route::post('admin/question/index/del','Admin\QuestionController@indexdel');

Route::get('admin/paymentdiy/diyindex','Admin\PayController@diyindex');
Route::post('admin/paymentdiy/diyindexdel','Admin\PayController@diyindexdel');
});

//web支付微信
Route::get('webpro/webpay_wechat','Pay\WebpayController@webpay_wechat');
Route::post('webpro/webpay_wechats','Pay\WebpayController@webpay_wechats');
Route::any('/webpro/weixinweb_hui','Pay\WebpayController@weixinweb_hui');
Route::any('/webpro/weixinweb/wechat_notify','Pay\WebpayController@wechat_notify');

Route::get('webpro/webpay_alipay','Pay\WebpayController@webpay_alipay');

//后台登入
Route::get('/jslmadmin/login','Admin\LoginController@login');
Route::post('jslmindex/dologin','Admin\LoginController@dologin');
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
Route::get('/newpro/center/my_orders_details','Newpro\Home\CenterController@my_orders_details');

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

});

//自定义支付
Route::get('/newspro/payment/diyindex','Newpro\Home\PayController@diyindex');
Route::post('/newspro/payment/diyindexs','Newpro\Home\PayController@diyindexs');
Route::get('/payments/pay/paymentsdiyget','Pay\PayController@paymentsdiyget');

//支付回调
Route::any('/payment/wechat/notify','Pay\PayController@wechatnotify');
Route::any('/payment/alipay/notify','Pay\PayController@alipaynotify');