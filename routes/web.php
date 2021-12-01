<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postsscontroller;
use App\Http\Controllers\tender;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\user;



use App\Mail\projectCreated;

use App\Http\Controllers\IMS\inventory;
use App\Http\Controllers\IMS\transaction;
use App\Http\Controllers\IMS\shop;
use App\Http\Controllers\IMS\setting;
use App\Http\Controllers\IMS\report;
use App\Http\Controllers\IMS\dashboard;



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



//  IMS routes


Route::group(['middleware' => 'prevent-back-history'],function(){
Route::group(['middleware' => ['auth']], function() {
Route::get('/LendPage',[shop::class,'getLendItems']);
Route::get('/Shop',[shop::class,'getItem']);
Route::get('/getQuantity/{id}',[transaction::class,'gcoandqty']);
Route::get('/transaction',[transaction::class,'getTransForm'])->name('transaction');
Route::get('/dashboard',[dashboard::class,'getDashboard']);
Route::get('/Inventory',[inventory::class,'creatInventory'])->name('ItemList');
Route::get('/Store',[inventory::class,'getStoreItem']);
Route::post('/creatItem',[inventory::class,'creratItem']);
Route::post('/creatTransaction',[transaction::class,'creatNewTransaction']);
Route::get('category', function () {
    return view('Inventory.category');
});
Route::get('bank', function () {
    return view('Inventory.bank');
});
Route::get('/subcategory',[setting::class,'getSubCatagory']);
Route::get('/BankAccount',[setting::class,'getBankAccount']);

// Route::get('subcategory', function () {
//     return view('Inventory.subcategory');
// });
Route::post('/categorySave',[setting::class,'creatCategory']);
Route::post('/subCatSave',[setting::class,'creatSubCategory']);
Route::post('/saveAccount',[setting::class,'creatBankAccount']);
///////////////////transfer///////////////////////////
Route::post('/transferToShop',[inventory::class,'transferToShop']);
Route::post('/payCredit',[inventory::class,'payCreditAmount']);

Route::get('brand', function () {
    return view('Inventory.brand');
});
Route::get('manufacturer', function () {
    return view('Inventory.manufacture');
});
Route::post('/brandSave',[setting::class,'creatBrand']);
Route::post('/manufactureSave',[setting::class,'creatManufacture']);
Route::post('/bankSave',[setting::class,'creatBank']);

Route::get('/getQuantity',[report::class,'getItemQuantity']);


});



});





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/home',[tender::class,'CountRecord']);
Route::get('/Adminhome', [user::class,'countuser']);
Route::get('/UserPanel',[tender::class,'getTenderByRegId']);
Route::get('/Request',[tender::class,'askRequestForm']);
Route::get('/viewuser',[user::class,'viewuser']);
Route::get('/register', function () {
    return view('auth.register');
});
// Route::get('/Carts', function () {
//     return view('User.CartList');
// });
// Route::get('/screaning', function () {
//     return view('posts.Screan');
// });
 
Route::get('/test1', function () {
    return view('posts.test1');
});
Route::get('create', function () {
    return view('posts.createtenderr');
});
//Route::get('/login', function () {
    //return view('auth.login')->name('login');
//});
Route::get('/', function () {
    return view('auth.login');
});
Route::get('areofWork', function () {
    return view('LookUps.areaofWork');
});
Route::get('Portfolio', function () {
    return view('LookUps.portfolio');
});
Route::get('Department', function () {
    return view('LookUps.department');
});
Route::get('Requirnment', function () {
    return view('LookUps.Requirnment');
});
Route::get('testttt', function () {
    return new projectCreated();
});

/*
Route::group(['prefix'->'$admin','middleware'=>'auth'],function(){
Route::get('/tender',[tender::class,'viewtender']);
Route::get('/update/{tenderregisters}/edit',[tender::class,'edit']);
});
Route::get('getTender',[tender::class,'gettender']);
*/
//Route::get('login',[logincontroller::class,'create'])->name('login');
Route::post('register',[RegisterController::class,'create'])->name('register');
Route::get('/TenderRegister',[tender::class,'getScreeaning'])->name('getScreeaning');
//Route::get('/createtenderr',[tender::class,'createtenderr']);
Route::post('Screen',[tender::class,'screaning']);
Route::post('Tender',[tender::class,'createtender']);
Route::put('/post/{tenderregisters}',[tender::class,'update']);
Route::get('/CartList',[tender::class,'getAllCartList']);
Route::get('/AllCartList',[tender::class,'getAllCartListAll']);
Route::get('/tender',[tender::class,'viewtender']);
Route::get('/Posttender',[tender::class,'viewPosttender']);
Route::get('/forcasttender',[tender::class,'viewForcasttender']);
Route::get('/Archivetender',[tender::class,'viewArchivetender']);
Route::get('/update/{tenderregisters}/edit',[tender::class,'edittender']);
Route::get('/document',[tender::class,'GetTenderById']);
Route::get('/viewDocument/{tenderregisters}/edit',[tender::class,'getDocumentById']);
Route::get('/TenderDocumentList/{data}/edit',[tender::class,'getTenderDocumenList'])->name('tenderDocumentList');
Route::get('/documentdetailshow/{id}',[tender::class,'getBIDDocument'])->name('BID');
Route::get('/documentTORshow/{id}',[tender::class,'getTORDocument'])->name('TOR');
Route::get('/documentEligiblitydetailshow/{id}',[tender::class,'getEligiblityDocument'])->name('Eligiblity');
Route::get('/documentEvaluationTORshow/{id}',[tender::class,'getEvaluationDocument'])->name('Evaluation');

Auth::routes();
Route::resource('/updareuser',user::class);
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//this route fore test
Route::get('/tenderr',[tender::class,'tenderbyid']);
Route::post('/areaName',[setting::class,'areaName']);
Route::post('/RequirnmentSave',[setting::class,'RequirnmentSave']);
Route::post('/Portfoliio',[setting::class,'createPortfolio']);
Route::post('/deparmentRegister',[setting::class,'createDepartment']);
Route::get('/StaffRegister',[setting::class,'staffregisterform']);
Route::post('/registerStaff',[setting::class,'createStaff']);
Route::get('/View/{data}/Detail',[tender::class,'getTenderDetail']);
Route::post('/Request',[tender::class,'SaveRequest']);
Route::get('/RequestView',[tender::class,'ViewRequest'])->name('viewrequest');
Route::get('/update/{data}/Request',[tender::class,'updateRequestStatus']);


