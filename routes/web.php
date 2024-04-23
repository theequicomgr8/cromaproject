<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MouseController;
use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\HarddiskController;
use App\Http\Controllers\GraphiccardController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\HeadphoneController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobileController;


Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'auth'])->name('auth');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::get('asset-dashboard',[DashboardController::class,'index'])->name('asset.dashboard')->middleware(['login']);
Route::post('save-device',[DashboardController::class,'save'])->name('save.device')->middleware(['login']);
Route::post('save-accessories',[AccessoriesController::class,'save'])->name('save.accessories')->middleware(['login']);
Route::get('laptop-list',[DeviceController::class,'laptop'])->name('laptop.list')->middleware(['login']);
Route::get('laptop-pagination',[DeviceController::class,'getlaptop'])->name('laptop.get')->middleware(['login']);
Route::post('laptop-save',[DeviceController::class,'laptopSave'])->name('laptop.save')->middleware(['login']);
Route::post('device-update',[DeviceController::class,'deviceUpdate'])->name('device.update')->middleware(['login']);

Route::get('get-ram',[DeviceController::class,'getram'])->name('ram.get')->middleware(['login']);
Route::get('device-product-detail/{id?}/{accessories_type?}/{type?}',[DeviceController::class,'productDetail'])->name('device.product.detail')->middleware(['login']);

Route::post('laptop-assign',[DeviceController::class,'laptopAssign'])->name('laptop.assign')->middleware(['login']);
Route::get('assignhistory',[DeviceController::class,'assignhistory'])->name('assign.history')->middleware(['login']);
Route::get('devicedelete',[DeviceController::class,'devicedelete'])->name('device.delete')->middleware(['login']);
Route::get('getemp',[EmployeeController::class,'getemp'])->name('get.emp')->middleware(['login']);


//desktop
Route::get('desktop-list',[DeviceController::class,'desktop'])->name('desktop.list')->middleware(['login']);
Route::get('desktop-pagination',[DeviceController::class,'getdesktop'])->name('desktop.get')->middleware(['login']);
Route::post('desktop-save',[DeviceController::class,'desktopSave'])->name('desktop.save')->middleware(['login']);
Route::post('desktop-assign',[DeviceController::class,'desktopAssign'])->name('desktop.assign')->middleware(['login']);

//mobile
Route::get('mobile-list',[MobileController::class,'mobile'])->name('mobile.list')->middleware(['login']);
Route::get('mobile-pagination',[MobileController::class,'getmobile'])->name('mobile.get')->middleware(['login']);
Route::post('mobile-save',[MobileController::class,'mobileSave'])->name('mobile.save')->middleware(['login']);
Route::post('mobile-assign',[MobileController::class,'mobileAssign'])->name('mobile.assign')->middleware(['login']);


//ram
Route::get('ram-list',[AccessoriesController::class,'ram'])->name('ram.list')->middleware(['login']);
Route::get('ram-pagination',[AccessoriesController::class,'getram'])->name('ram.get')->middleware(['login']);
Route::post('ram-save',[AccessoriesController::class,'ramSave'])->name('ram.save')->middleware(['login']);
Route::post('accessories-update',[AccessoriesController::class,'accessoriesUpdate'])->name('accessories.update')->middleware(['login']);

Route::post('ram-assign',[AccessoriesController::class,'ramAssign'])->name('ram.assign')->middleware(['login']);
Route::get('asso-assignhistory',[AccessoriesController::class,'assignhistory'])->name('assign.history')->middleware(['login']);

Route::get('product-detail/{id?}/{accessories_type?}/{type?}',[AccessoriesController::class,'productDetail'])->name('product.detail')->middleware(['login']);


//mouse
Route::get('mouse-list',[MouseController::class,'mouse'])->name('mouse.list')->middleware(['login']);
Route::get('mouse-pagination',[MouseController::class,'getmouse'])->name('mouse.get')->middleware(['login']);
Route::post('mouse-save',[MouseController::class,'mouseSave'])->name('mouse.save')->middleware(['login']);

Route::post('mouse-assign',[MouseController::class,'mouseAssign'])->name('mouse.assign')->middleware(['login']);
// Route::get('assignhistory',[MouseController::class,'assignhistory'])->name('assign.history');

//keyboard
Route::get('keyboard-list',[KeyboardController::class,'keyboard'])->name('keyboard.list')->middleware(['login']);
Route::get('keyboard-pagination',[KeyboardController::class,'getkeyboard'])->name('keyboard.get')->middleware(['login']);
Route::post('keyboard-save',[KeyboardController::class,'keyboardSave'])->name('keyboard.save')->middleware(['login']);

//Harddisk
Route::get('harddisk-list',[HarddiskController::class,'harddisk'])->name('harddisk.list')->middleware(['login']);
Route::get('harddisk-pagination',[HarddiskController::class,'getharddisk'])->name('harddisk.get')->middleware(['login']);
Route::post('harddisk-save',[HarddiskController::class,'harddiskSave'])->name('harddisk.save')->middleware(['login']);

//Graphic card
Route::get('graphiccard-list',[GraphiccardController::class,'graphiccard'])->name('graphiccard.list')->middleware(['login']);
Route::get('graphiccard-pagination',[GraphiccardController::class,'getgraphiccard'])->name('graphiccard.get')->middleware(['login']);
Route::post('graphiccard-save',[GraphiccardController::class,'graphiccardSave'])->name('graphiccard.save')->middleware(['login']);

//Monitor
Route::get('monitor-list',[MonitorController::class,'monitor'])->name('monitor.list')->middleware(['login']);
Route::get('monitor-pagination',[MonitorController::class,'getmonitor'])->name('monitor.get')->middleware(['login']);
Route::post('monitor-save',[MonitorController::class,'monitorSave'])->name('monitor.save')->middleware(['login']);

//Headphone
Route::get('headphone-list',[HeadphoneController::class,'headphone'])->name('headphone.list')->middleware(['login']);
Route::get('headphone-pagination',[HeadphoneController::class,'getheadphone'])->name('headphone.get')->middleware(['login']);
Route::post('headphone-save',[HeadphoneController::class,'headphoneSave'])->name('headphone.save')->middleware(['login']);


// Route::get('/', function () {
//     return view('welcome');
// });
