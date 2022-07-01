<?php

use Illuminate\Support\Facades\Route;


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['admin','auth'],'namespace'=>'admin'],function(){
Route::get('home','AdminController@index')->name('admin.home');
});

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){
Route::get('home','UserController@index')->name('\home');
});



//.............. Frontend Start ............//

Route::get('/','frontend\FrontendController@frontendmethod');
Route::get('product/{id}','frontend\FrontendController@product');
Route::get('allproduct','frontend\FrontendController@allproduct');
Route::get('item/{id}','frontend\FrontendController@item');
Route::get('category/{id}','frontend\FrontendController@category');
Route::get('subcategory/{id}','frontend\FrontendController@subcategory');
Route::get('allbrand','frontend\FrontendController@allbrand');
Route::get('brandproduct/{id}','frontend\FrontendController@brandproduct');
Route::get('searchproduct','frontend\FrontendController@searchproduct');
Route::get('searchbrand','frontend\FrontendController@searchbrand');
Route::get('aboutus','frontend\FrontendController@aboutus');
Route::get('termcondition','frontend\FrontendController@termcondition');
Route::get('privacypolicy','frontend\FrontendController@privacypolicy');
Route::get('FAQ','frontend\FrontendController@FAQ');
Route::get('contactus','frontend\FrontendController@contactus');




 //............... Customer User ..............//

Route::get('usersignin','frontend\CustomerController@usersignin');
Route::get('usersignup','frontend\CustomerController@usersignup');
Route::post('userregistration','frontend\CustomerController@userregistration');
Route::get('userdashboard','frontend\CustomerController@userdashboard');
Route::get('allorder','frontend\CustomerController@allorder');
Route::get('updateinformation','frontend\CustomerController@updateinformation');
Route::get('changepassword','frontend\CustomerController@changepassword');
Route::post('messagesend','frontend\CustomerController@messagesend');


 //............... Shopping Cart ..............//

Route::post('addtocart/{id}','frontend\CustomerController@addtocart');
Route::get('checkcart','frontend\CustomerController@checkcart');
Route::get('productremove/{rowId}','frontend\CustomerController@productremove');
Route::get('allclear','frontend\CustomerController@allclear');
Route::get('checkout','frontend\CustomerController@checkout');
Route::post('qty_update/{rowId}','frontend\CustomerController@qty_update');
Route::post('shippingdetails/{id}','frontend\CustomerController@shippingdetails');
Route::get('ordertracking/{id}','frontend\CustomerController@ordertracking');
Route::post('userinfoupdate/{id}','frontend\CustomerController@userinfoupdate');

//............... Backend ..................//

Route::get('/admin', function () {
    return view('admin.home');
});


//........... Admin User ...............//

Route::get('createadmin','backend\UserController@createadmin');
Route::post('usercreate','backend\UserController@usercreate');
Route::get('manageadmin','backend\UserController@manageadmin');
Route::get('inactiveadmin/{id}','backend\UserController@inactiveadmin');
Route::get('activeadmin/{id}','backend\UserController@activeadmin');
Route::get('admindelete/{id}','backend\UserController@admindelete');
Route::get('adminedit/{id}','backend\UserController@adminedit');
Route::post('usercreateupdate/{id}','backend\UserController@usercreateupdate');


/////// Item ////////

Route::get('item','backend\ItemController@item');
Route::post('iteminsert','backend\ItemController@iteminsert');
Route::get('manageitem','backend\ItemController@manageitem');
Route::get('inactiveitem/{id}','backend\ItemController@inactiveitem');
Route::get('activeitem/{id}','backend\ItemController@activeitem');
Route::get('deleteitem/{id}','backend\ItemController@deleteitem');
Route::get('edititem/{id}','backend\ItemController@edititem');
Route::post('itemupdate/{id}','backend\ItemController@itemupdate');


/////// Category ///////

Route::get('category','backend\CategoryController@category');
Route::post('categoryinsert','backend\CategoryController@categoryinsert');
Route::get('managecategory','backend\CategoryController@managecategory');
Route::get('inactivecategory/{id}','backend\CategoryController@inactivecategory');
Route::get('activecategory/{id}','backend\CategoryController@activecategory');
Route::get('deletecategory/{id}','backend\CategoryController@deletecategory');
Route::get('categoryedit/{id}','backend\CategoryController@categoryedit');
Route::post('categoryupdate/{id}','backend\CategoryController@categoryupdate');


/////// SubCategory ///////

Route::get('subcategory','backend\SubcategoryController@subcategory');
Route::get('categoryget/{item_id}','backend\SubcategoryController@categoryget');
Route::post('subcategoryinsert','backend\SubcategoryController@subcategoryinsert');
Route::get('managesubcategory','backend\SubcategoryController@managesubcategory');
Route::get('inactivesubcategory/{id}','backend\SubcategoryController@inactivesubcategory');
Route::get('activesubcategory/{id}','backend\SubcategoryController@activesubcategory');
Route::get('deletesubcategory/{id}','backend\SubcategoryController@deletesubcategory');
Route::get('subcategoryedit/{id}','backend\SubcategoryController@subcategoryedit');
Route::post('subcategoryupdate/{id}','backend\SubcategoryController@subcategoryupdate');


/////// Brand ///////

Route::get('brand','backend\BrandController@brand');
Route::post('brandinsert','backend\BrandController@brandinsert');
Route::get('managebrand','backend\BrandController@managebrand');
Route::get('inactivebrand/{id}','backend\BrandController@inactivebrand');
Route::get('activebrand/{id}','backend\BrandController@activebrand');
Route::get('branddelete/{id}','backend\BrandController@branddelete');
Route::get('brandedit/{id}','backend\BrandController@brandedit');
Route::post('brandupdate/{id}','backend\BrandController@brandupdate');


/////// Product ///////

Route::get('product','backend\ProductController@product');
Route::get('categoryget/{item_id}','backend\ProductController@categoryget');
Route::get('subcategoryget/{category_id}','backend\ProductController@subcategoryget');
Route::post('productinsert','backend\ProductController@productinsert');
Route::get('manageproduct','backend\ProductController@manageproduct');
Route::get('inactivestockstatus/{id}','backend\ProductController@inactivestockstatus');
Route::get('activestockstatus/{id}','backend\ProductController@activestockstatus');
Route::get('inactiveproduct/{id}','backend\ProductController@inactiveproduct');
Route::get('activeproduct/{id}','backend\ProductController@activeproduct');
Route::get('deleteproduct/{id}','backend\ProductController@deleteproduct');
Route::get('editproduct/{id}','backend\ProductController@editproduct');
Route::post('productupdate/{id}','backend\ProductController@productupdate');
Route::get('viewallproduct','backend\ProductController@viewallproduct');


/////// Slider ///////

Route::get('slider','backend\SliderController@slider');
Route::post('sliderinsert','backend\SliderController@sliderinsert');
Route::get('manageslider','backend\SliderController@manageslider');
Route::get('deleteslider/{id}','backend\SliderController@deleteslider');
Route::get('editslider/{id}','backend\SliderController@editslider');
Route::post('sliderupdate/{id}','backend\SliderController@sliderupdate');


/////// Setting ///////

Route::get('setting','backend\WebsiteSettingController@setting');
Route::post('updatesetting/{id}','backend\WebsiteSettingController@updatesetting');


/////// About ///////

Route::get('about','backend\WebsiteSettingController@about');
Route::post('aboutupdate/{id}','backend\WebsiteSettingController@aboutupdate');


/////// Contact ///////

Route::get('contact','backend\WebsiteSettingController@contact');
Route::post('contactupdate/{id}','backend\WebsiteSettingController@contactupdate');


/////// Privacy & Policy ///////

Route::get('privacy&policy','backend\WebsiteSettingController@privacypolicy');
Route::post('updateprivacypolicy/{id}','backend\WebsiteSettingController@updateprivacypolicy');


/////// Term & Condition ///////

Route::get('term&condition','backend\WebsiteSettingController@termcondition');
Route::post('termconditionupdate/{id}','backend\WebsiteSettingController@termconditionupdate');


/////// How to Buy ///////

Route::get('howtobuy','backend\WebsiteSettingController@howtobuy');
Route::post('howtobuyupdate/{id}','backend\WebsiteSettingController@howtobuyupdate');


/////// FAQ ///////

Route::get('faq','backend\WebsiteSettingController@faq');
Route::post('faqinsert','backend\WebsiteSettingController@faqinsert');
Route::get('managefaq','backend\WebsiteSettingController@managefaq');
Route::get('deletefaq/{id}','backend\WebsiteSettingController@deletefaq');
Route::get('editfaq/{id}','backend\WebsiteSettingController@editfaq');
Route::post('faqupdate/{id}','backend\WebsiteSettingController@faqupdate');

/////// Order Information ///////

Route::get('orderinfomation','backend\OrderInfoController@orderinfomation');
Route::get('pendingorder','backend\OrderInfoController@pendingorder');
Route::get('processingorder','backend\OrderInfoController@processingorder');
Route::get('shippingorder','backend\OrderInfoController@shippingorder');
Route::get('completdorder','backend\OrderInfoController@completdorder');
Route::get('monthlyorderreport','backend\OrderInfoController@monthlyorderreport');
Route::post('searchordermonthly','backend\OrderInfoController@searchordermonthly');
Route::post('updatestatus/{id}','backend\OrderInfoController@updatestatus');
Route::get('invoice/{id}','backend\OrderInfoController@invoice');
Route::view('barcode', 'barcode');

/////// Customer Message ///////

Route::get('customermessage','backend\CustomerController@customermessage');
