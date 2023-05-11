<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LanguagesMiddleware;

use App\Http\Controllers\owners\LocalizationController;
use App\Http\Controllers\Owners\DashboardController;
use App\Http\Controllers\Owners\LoginController;
use App\Http\Controllers\owners\ProfileController;


use App\Http\Controllers\Dashboard\BrandsController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\MainCategoriesController;
use App\Http\Controllers\Dashboard\SubCategoriesController;
use App\Http\Controllers\Dashboard\PoductsController;
use App\Http\Controllers\Dashboard\AjaxController;
use App\Http\Controllers\Dashboard\AttributesController;
use App\Http\Controllers\Dashboard\SizesController;
use App\Http\Controllers\Dashboard\ColorsController;
 use App\Http\Controllers\Dashboard\CouponsController;
 
  use App\Http\Controllers\Dashboard\OrdersController; 
  use App\Http\Controllers\Dashboard\ImportExportController;
  use App\Http\Controllers\Dashboard\CurrenciesController ;
  use App\Http\Controllers\Dashboard\PagesController ;
  use App\Http\Controllers\Dashboard\SlidersController ;
  use App\Http\Controllers\Dashboard\RolesController ;
  use App\Http\Controllers\Dashboard\ManagersController ;
  
  
  use App\Http\Controllers\Dashboard\WebNotificationController;
  use App\Http\Controllers\Dashboard\RealTimeDatabaseController;

 
/*************************************************/
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\OfferController;
use App\Http\Controllers\Dashboard\AddRemoveFieldController;
use App\Http\Controllers\Dashboard\ImageController;


/*******************************************************/

/*
|--------------------------------------------------------------------------
|  owners Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the " owners" middleware group. Now create something great!
|
*/


//note that the prefix is owners for all file route

 

 /**
 
 
         *  ownerss Routes
         */
		 
		 


 
    Route::group(['namespace' => 'Owners', 'middleware' => 'guest:admin', 'prefix' => 'owners'], function () {

        Route::get('login', [LoginController::class, 'login'])->name('owners.login');
        Route::post('login',[LoginController::class, 'postLogin'])->name('owners.post.login');

    });
	
	/*Route::get('/', function () {
    return redirect(app()->getLocale());
});
Route::group([
  'prefix' => '{locale}', 
  'where' => ['locale' => '[a-zA-Z]{2}'], 
  'middleware' => 'LanguagesMiddleware'], function() {});//end locale prefix
   */
   
   
  // Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

   // Route::group(['prefix' => 'offers'], function () {});
         
 Route::group(['namespace' => 'Owners', 'middleware' => ['auth:admin','OwnersMiddleware'], 'prefix' => 'owners'], function () 
     {
  
 
        Route::get('/', [DashboardController::class, 'index_owner'])->name('owners.dashboard');  // the first page admin visits if authenticated
        // the first page admin visits if authenticated
         Route::get('logout',[LoginController::class, 'logout'] )->name('owners.logout');
     
  //Route::get('lang/{lang?}', [LocalizationController::class, 'switchLang'])->name('admin.lang.switch');
  
 //--------------------------------------
 Route::group(['prefix' => 'profile'], function () {
  Route::get('edit', [ProfileController::class, 'editProfile'])->name('edit.profile');
  Route::put('update',[ProfileController::class, 'updateprofile'] )->name('update.profile');
});
 
Route::group(['prefix' => 'main_categories' ], function () {
  Route::get('/', [MainCategoriesController::class, 'index'])->name(' owners.maincategories');
  Route::get('/show{id}', [MainCategoriesController::class, 'show'])->name(' owners.maincategories.show');

  Route::get('/create', [MainCategoriesController::class, 'create'])->name(' owners.maincategories.create');
  Route::post('store',[MainCategoriesController::class, 'store'] )->name(' owners.maincategories.store');
 
  Route::get('edit/{id}',[MainCategoriesController::class, 'edit'])->name(' owners.maincategories.edit');
  Route::post('update/{id}',[MainCategoriesController::class, 'update'])->name(' owners.maincategories.update');
  Route::get('delete/{id}', [MainCategoriesController::class, 'destroy'])->name(' owners.maincategories.delete');
  Route::post('delAll',[MainCategoriesController::class, 'delAll'] )->name(' owners.maincategories.delAll');

  
});

################################## end categories    #######################################

 });	//end owners prefix
 
    

     
//}); //end localization  

 
    
 