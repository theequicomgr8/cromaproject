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

Route::get('asset-dashboard',[DashboardController::class,'index'])->name('asset.dashboard');
Route::post('save-device',[DashboardController::class,'save'])->name('save.device');
Route::post('save-accessories',[AccessoriesController::class,'save'])->name('save.accessories');
Route::get('laptop-list',[DeviceController::class,'laptop'])->name('laptop.list');
Route::get('laptop-pagination',[DeviceController::class,'getlaptop'])->name('laptop.get');
Route::post('laptop-save',[DeviceController::class,'laptopSave'])->name('laptop.save');

Route::post('laptop-assign',[DeviceController::class,'laptopAssign'])->name('laptop.assign');
Route::get('assignhistory',[DeviceController::class,'assignhistory'])->name('assign.history');
Route::get('devicedelete',[DeviceController::class,'devicedelete'])->name('device.delete');
Route::get('getemp',[EmployeeController::class,'getemp'])->name('get.emp');


//desktop
Route::get('desktop-list',[DeviceController::class,'desktop'])->name('desktop.list');
Route::get('desktop-pagination',[DeviceController::class,'getdesktop'])->name('desktop.get');
Route::post('desktop-save',[DeviceController::class,'desktopSave'])->name('desktop.save');
Route::post('desktop-assign',[DeviceController::class,'desktopAssign'])->name('desktop.assign');


//ram
Route::get('ram-list',[AccessoriesController::class,'ram'])->name('ram.list');
Route::get('ram-pagination',[AccessoriesController::class,'getram'])->name('ram.get');
Route::post('ram-save',[AccessoriesController::class,'ramSave'])->name('ram.save');

Route::post('ram-assign',[AccessoriesController::class,'ramAssign'])->name('ram.assign');
Route::get('asso-assignhistory',[AccessoriesController::class,'assignhistory'])->name('assign.history');

Route::get('product-detail/{id?}',[AccessoriesController::class,'productDetail'])->name('product.detail');


//mouse
Route::get('mouse-list',[MouseController::class,'mouse'])->name('mouse.list');
Route::get('mouse-pagination',[MouseController::class,'getmouse'])->name('mouse.get');
Route::post('mouse-save',[MouseController::class,'mouseSave'])->name('mouse.save');

Route::post('mouse-assign',[MouseController::class,'mouseAssign'])->name('mouse.assign');
// Route::get('assignhistory',[MouseController::class,'assignhistory'])->name('assign.history');

//keyboard
Route::get('keyboard-list',[KeyboardController::class,'keyboard'])->name('keyboard.list');
Route::get('keyboard-pagination',[KeyboardController::class,'getkeyboard'])->name('keyboard.get');
Route::post('keyboard-save',[KeyboardController::class,'keyboardSave'])->name('keyboard.save');

//Harddisk
Route::get('harddisk-list',[HarddiskController::class,'harddisk'])->name('harddisk.list');
Route::get('harddisk-pagination',[HarddiskController::class,'getharddisk'])->name('harddisk.get');
Route::post('harddisk-save',[HarddiskController::class,'harddiskSave'])->name('harddisk.save');

//Graphic card
Route::get('graphiccard-list',[GraphiccardController::class,'graphiccard'])->name('graphiccard.list');
Route::get('graphiccard-pagination',[GraphiccardController::class,'getgraphiccard'])->name('graphiccard.get');
Route::post('graphiccard-save',[GraphiccardController::class,'graphiccardSave'])->name('graphiccard.save');

//Monitor
Route::get('monitor-list',[MonitorController::class,'monitor'])->name('monitor.list');
Route::get('monitor-pagination',[MonitorController::class,'getmonitor'])->name('monitor.get');
Route::post('monitor-save',[MonitorController::class,'monitorSave'])->name('monitor.save');

//Headphone
Route::get('headphone-list',[HeadphoneController::class,'headphone'])->name('headphone.list');
Route::get('headphone-pagination',[HeadphoneController::class,'getheadphone'])->name('headphone.get');
Route::post('headphone-save',[HeadphoneController::class,'headphoneSave'])->name('headphone.save');


Route::get('/', function () {
    return view('welcome');
});
