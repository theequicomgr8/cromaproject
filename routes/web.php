<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});
