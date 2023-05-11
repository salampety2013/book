<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LanguagesMiddleware;

use App\Http\Controllers\Dashboard\LocalizationController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\optionsController;


use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\MainCategoriesController;

use App\Http\Controllers\Dashboard\AdvertismentsController;



 use App\Http\Controllers\Dashboard\CouponsController;

  use App\Http\Controllers\Dashboard\OrdersController;
 
  use App\Http\Controllers\Dashboard\CurrenciesController ;
  use App\Http\Controllers\Dashboard\PagesController ;
  use App\Http\Controllers\Dashboard\SlidersController ;
  use App\Http\Controllers\Dashboard\RolesController ;
  use App\Http\Controllers\Dashboard\ManagersController ;


/*******************************************************/

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/







    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {

        Route::get('login', [LoginController::class, 'login'])->name('admin.login');
        Route::post('login',[LoginController::class, 'postLogin'])->name('admin.post.login');

    });

	
       

       ##################################################################
       Route::group(
         [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
         ], function(){

 /////////////////////////////////////////
   // Route::group(['namespace' => 'Dashboard', 'middleware' =>  'auth:admin' , 'prefix' => 'admin'], function ()
  //  Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth:admin','LanguagesMiddleware'], 'prefix' => 'admin'], function ()
    Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth:admin','AdminMiddleware'], 'prefix' => 'admin'], function ()
    {
        //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');  // the first page admin visits if authenticated
        Route::get('logout',[LoginController::class, 'logout'] )->name('admin.logout');

 Route::get('lang/{lang?}', [LocalizationController::class, 'switchLang'])->name('admin.lang.switch');

//--------------------------------------
 Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', [ProfileController::class, 'editProfile'])->name('admin.edit.profile');
            Route::put('update',[ProfileController::class, 'updateprofile'] )->name('admin.update.profile');
        });


     ################################## categories routes ######################################



	 ################################## members routes ######################################

     Route::group(['prefix' => 'members', 'middleware' => 'can:members'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('admin.members');


        Route::get('show/{id}',[ProfileController::class, 'show'])->name('admin.members.show');

		 Route::get('activate/{id}', [ProfileController::class, 'activate'])->name('admin.members.activate');
        Route::get('deactivate/{id}', [ProfileController::class, 'deactivate'])->name('admin.members.deactivate');

        Route::get('delete/{id}', [ProfileController::class, 'destroy'])->name('admin.members.delete');
        Route::post('delAll',[ProfileController::class, 'delAll'] )->name('admin.members.delAll');


     });

    ################################## end      #######################################


     Route::group(['prefix' => 'main_categories', 'middleware' => 'can:categories'], function () {
        Route::get('/', [MainCategoriesController::class, 'index'])->name('admin.maincategories');
        Route::get('/show{id}', [MainCategoriesController::class, 'show'])->name('admin.maincategories.show');

        Route::get('/create', [MainCategoriesController::class, 'create'])->name('admin.maincategories.create');
        Route::post('store',[MainCategoriesController::class, 'store'] )->name('admin.maincategories.store');

        Route::get('edit/{id}',[MainCategoriesController::class, 'edit'])->name('admin.maincategories.edit');
        Route::post('update/{id}',[MainCategoriesController::class, 'update'])->name('admin.maincategories.update');
        Route::get('delete/{id}', [MainCategoriesController::class, 'destroy'])->name('admin.maincategories.delete');
        Route::post('delAll',[MainCategoriesController::class, 'delAll'] )->name('admin.maincategories.delAll');


     });

    ################################## end categories    #######################################
################################## advertisments routes ######################################

     Route::group(['prefix' => 'advertisments'], function () {
        Route::get('/', [AdvertismentsController::class, 'index'])->name('admin.advertisments')->middleware('can:list_advertisments');
        Route::get('/create/', [AdvertismentsController::class, 'create'])->name('admin.advertisments.create')->middleware('can:add_advertisment');



          Route::post('store',[AdvertismentsController::class, 'store'] )->name('admin.advertisments.store')->middleware('can:add_advertisment');
         Route::get('edit/{id}',[AdvertismentsController::class, 'edit'])->name('admin.advertisments.edit')->middleware('can:edit_advertisment');
        Route::post('update/{id}',[AdvertismentsController::class, 'update'])->name('admin.advertisments.update')->middleware('can:edit_advertisment');
        Route::get('activate/{id}', [AdvertismentsController::class, 'activate'])->name('admin.advertisments.activate');
        Route::get('deactivate/{id}', [AdvertismentsController::class, 'deactivate'])->name('admin.advertisments.deactivate');
        Route::get('delete/{id}', [AdvertismentsController::class, 'destroy'])->name('admin.advertisments.delete')->middleware('can:delete_advertisment');
        Route::post('delAll',[AdvertismentsController::class, 'delAll'] )->name('admin.advertisments.delAll')->middleware('can:delete_advertisment');

        ///////////////////////////////////////images///////
		 	Route::get('images/{id}',[AdvertismentsController::class, 'addImages'])->name('admin.advertisments.images');
            Route::post('images',[AdvertismentsController::class, 'saveadvertismentImages'])->name('admin.advertisments.images.store');
            Route::post('images/db',[AdvertismentsController::class, 'saveadvertismentImagesDB'])->name('admin.advertisments.images.store.db');
            Route::post('del_dropzone_images',[AdvertismentsController::class, 'delDropzoneImages'])->name('admin.advertisments.images.delete');

		  Route::get('images/delete/{id}',[AdvertismentsController::class, 'deleteImage'])->name('admin.advertisments.deleteIimage');


 });
    ################################## end advertisments    #######################################
   ################################# options routes ######################################
    
   Route::group(['prefix' => 'options','middleware' => 'can:subCategories'], function () {
      Route::get('/', [optionsController::class, 'index'])->name('admin.options');
      Route::get('/create/', [optionsController::class, 'create'])->name('admin.options.create');
      
      
      
      Route::post('store',[optionsController::class, 'store'] )->name('admin.options.store');
      Route::get('edit/{id}',[optionsController::class, 'edit'])->name('admin.options.edit');
      Route::post('update/{id}',[optionsController::class, 'update'])->name('admin.options.update') ;
      Route::get('activate/{id}', [optionsController::class, 'activate'])->name('admin.options.activate');
      Route::get('deactivate/{id}', [optionsController::class, 'deactivate'])->name('admin.options.deactivate');
      Route::get('delete/{id}', [optionsController::class, 'destroy'])->name('admin.options.delete') ;
      Route::post('delAll',[optionsController::class, 'delAll'] )->name('admin.options.delAll') ;
   });
      ################################## end options    #######################################

   
	 ################################## sliders routes ######################################

     Route::group(['prefix' => 'sliders', 'middleware' => 'can:sliders'], function () {
        Route::get('/', [SlidersController::class, 'index'])->name('admin.sliders');
        Route::get('/create', [SlidersController::class, 'create'])->name('admin.sliders.create');
        Route::get('/createMultiple', [SlidersController::class, 'createMultiple'])->name('admin.sliders.createMultiple');

         Route::post('store',[SlidersController::class, 'store'] )->name('admin.sliders.store');
         Route::post('storeMultiple',[SlidersController::class, 'storeMultiple'] )->name('admin.sliders.storeMultiple');

        Route::get('edit/{id}',[SlidersController::class, 'edit'])->name('admin.sliders.edit');
        Route::post('update/{id}',[SlidersController::class, 'update'])->name('admin.sliders.update');

		 Route::get('activate/{id}', [SlidersController::class, 'activate'])->name('admin.sliders.activate');
        Route::get('deactivate/{id}', [SlidersController::class, 'deactivate'])->name('admin.sliders.deactivate');

        Route::get('delete/{id}', [SlidersController::class, 'destroy'])->name('admin.sliders.delete');
        Route::post('delAll',[SlidersController::class, 'delAll'] )->name('admin.sliders.delAll');

         ///////////////////////////////////////images///////
		 	//Route::get('images/{id}',[SlidersController::class, 'addImages'])->name('admin.sliders.images');
            Route::post('images',[SlidersController::class, 'saveSliderImages'])->name('admin.sliders.images.store');
          //  Route::post('images/db',[SlidersController::class, 'saveProductImagesDB'])->name('admin.sliders.images.store.db');


            Route::post('del_dropzone_images',[SlidersController::class, 'delDropzoneImages'])->name('admin.sliders.images.delete');

     });


    ################################## end sliders    #######################################





	
	################################## copunes routes ######################################



	 Route::group(['prefix' => 'coupons', 'middleware' => 'can:coupons'], function () {
        Route::get('/', [CouponsController::class, 'index'])->name('admin.coupons');
       // Route::get('/create', [CouponsController::class, 'create'])->name('admin.coupons.create');
          Route::match(['get','post'],'/create_update/{id?}', [CouponsController::class, 'create_update'])->name('admin.coupons.create_update');
	   Route::match(['get','post'],'add_edit_coupon/{id?}', [CouponsController::class, 'add_edit_coupon'])->name('admin.coupons.add_edit_coupon');


         Route::post('store',[CouponsController::class, 'store'] )->name('admin.coupons.store');

        Route::get('edit/{id}',[CouponsController::class, 'edit'])->name('admin.coupons.edit');
        Route::post('update/{id}',[CouponsController::class, 'update'])->name('admin.coupons.update');

		 Route::get('activate/{id}', [CouponsController::class, 'activate'])->name('admin.coupons.activate');
        Route::get('deactivate/{id}', [CouponsController::class, 'deactivate'])->name('admin.coupons.deactivate');
		Route::get('deactivate/ajax', [CouponsController::class, 'deactivateAjax'])->name('admin.coupons.deactivate.ajax');

        Route::get('delete/{id}', [CouponsController::class, 'destroy'])->name('admin.coupons.delete');
        Route::post('delAll',[CouponsController::class, 'delAll'] )->name('admin.coupons.delAll');


     });

    ################################## end coupons    #######################################


	################################## orders routes ######################################

     Route::group(['prefix' => 'orders', 'middleware' => 'can:orders'], function () {
        Route::get('/{order_status?}', [OrdersController::class, 'index'])->name('admin.orders');
     //   Route::get('/orderDetails/{id}', [OrdersController::class, 'ViewOrderDetails'])->name('admin.orders.viewOrderDetails');
        Route::get('/orderDetails/{id}&{type?}', [OrdersController::class, 'ViewOrderDetails'])->name('admin.orders.viewOrderDetails');
	 Route::get('/PDFOrderDetails/{id}', [OrdersController::class, 'PDFOrderDetails'])->name('admin.orders.PDFOrderDetails');
	 Route::get('/sendEmail/{id}', [OrdersController::class, 'sendEmail'])->name('admin.orders.sendEmail');

			    Route::post('updateStatus',[OrdersController::class, 'updateStatus'] )->name('admin.orders.updateStatus');
				 Route::get('edit_shipping/{id}', [OrdersController::class, 'edit_shipping'])->name('admin.orders.edit_shipping');
        Route::post('add_edit_shipping/', [OrdersController::class, 'AddEditShipping'])->name('admin.orders.add_edit_shipping');

        Route::get('delete/{id}', [OrdersController::class, 'destroy'])->name('admin.orders.delete');

        Route::get('fileExport/{type?}', [OrdersController::class, 'fileExport'])->name('admin.orders.fileExport');





     });


	################################## end orders    #######################################


     ################################## currencies routes ######################################

     Route::group(['prefix' => 'currencies', 'middleware' => 'can:currencies'], function () {
        Route::get('/', [CurrenciesController::class, 'index'])->name('admin.currencies');
        Route::get('/create', [CurrenciesController::class, 'create'])->name('admin.currencies.create');

         Route::post('store',[CurrenciesController::class, 'store'] )->name('admin.currencies.store');

        Route::get('edit/{id}',[CurrenciesController::class, 'edit'])->name('admin.currencies.edit');
        Route::post('update/{id}',[CurrenciesController::class, 'update'])->name('admin.currencies.update');

		 Route::get('activate/{id}', [CurrenciesController::class, 'activate'])->name('admin.currencies.activate');
        Route::get('deactivate/{id}', [CurrenciesController::class, 'deactivate'])->name('admin.currencies.deactivate');

        Route::get('delete/{id}', [CurrenciesController::class, 'destroy'])->name('admin.currencies.delete');
        Route::post('delAll',[CurrenciesController::class, 'delAll'] )->name('admin.currencies.delAll');


     });

    ################################## end currencies    #######################################

	      ################################## pages routes ######################################

     Route::group(['prefix' => 'pages', 'middleware' => 'can:pages'], function () {
        Route::get('/', [PagesController::class, 'index'])->name('admin.pages');
        Route::get('/create', [PagesController::class, 'create'])->name('admin.pages.create');

         Route::post('store',[PagesController::class, 'store'] )->name('admin.pages.store');

        Route::get('edit/{id}',[PagesController::class, 'edit'])->name('admin.pages.edit');
        Route::post('update/{id}',[PagesController::class, 'update'])->name('admin.pages.update');

		 Route::get('activate/{id}', [PagesController::class, 'activate'])->name('admin.pages.activate');
        Route::get('deactivate/{id}', [PagesController::class, 'deactivate'])->name('admin.pages.deactivate');

        Route::get('delete/{id}', [PagesController::class, 'destroy'])->name('admin.pages.delete');
        Route::post('delAll',[PagesController::class, 'delAll'] )->name('admin.pages.delAll');


     });

    ################################## end pages    #######################################



	
	 ################################## Roles routes ######################################

 Route::group(['prefix' => 'roles'], function () {
            Route::get('/', [RolesController::class, 'index'])->name('admin.roles.index');
            Route::get('create', [RolesController::class, 'create'])->name('admin.roles.create');
            Route::post('store', [RolesController::class, 'saveRole'])->name('admin.roles.store');
            Route::get('/edit/{id}', [RolesController::class, 'edit']) ->name('admin.roles.edit') ;
            Route::post('update/{id}',[RolesController::class, 'update'])->name('admin.roles.update');
         });
    ################################## end Roles    #######################################

	 ################################## managers routes ######################################


 Route::group(['prefix' => 'managers'], function () {
            Route::get('/', [ManagersController::class, 'index'])->name('admin.managers.index');
            Route::get('create', [ManagersController::class, 'create'])->name('admin.managers.create');
            Route::post('store', [ManagersController::class, 'store'])->name('admin.managers.store');
          //  Route::get('/edit/{id}', [ManagersController::class, 'edit']) ->name('admin.managers.edit') ;
          //  Route::post('update/{id}',[ManagersController::class, 'update'])->name('admin.managers.update');
         });
    ################################## end Roles    #######################################



 


});	//end admin prefix

//}); //end localization







 