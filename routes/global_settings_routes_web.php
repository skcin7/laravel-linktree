<?php

use Illuminate\Support\Facades\Route;
use Skcin7\LaravelGlobalSettings\Http\Controllers\LaravelGlobalSettingsController;


//Route::get('global_settings', [LaravelGlobalSettingsController::class, 'about'])->name('about');
Route::get('/', [LaravelGlobalSettingsController::class, 'index'])->name('index');
Route::get('about', [LaravelGlobalSettingsController::class, 'about'])->name('about');
Route::post('/', [LaravelGlobalSettingsController::class, 'create'])->name('create');
Route::put('{key}', [LaravelGlobalSettingsController::class, 'update'])->name('update');
Route::delete('{key}', [LaravelGlobalSettingsController::class, 'delete'])->name('delete');

//Route::group(['prefix' => 'admin'], function() {
//    Route::get('/', [LinktreeAdminController::class, 'admin'])->name('global_settings.admin');
//    Route::post('/', [LinktreeAdminController::class, 'admin'])->name('global_settings.admin.update_settings');
//
//    Route::group(['prefix' => 'groups'], function() {
//        Route::post('/', [LinktreeAdminController::class, 'createGroup'])->name('global_settings.admin.create_group');
//        Route::put('{groupId}', [LinktreeAdminController::class, 'updateGroup'])->name('global_settings.admin.update_group');
//        Route::delete('{groupId}', [LinktreeAdminController::class, 'deleteGroup'])->name('global_settings.admin.delete_group');
//    });
//
//    Route::group(['prefix' => 'links'], function() {
//        Route::post('/', [LinktreeAdminController::class, 'createLink'])->name('global_settings.admin.create_link');
//        Route::put('{linkId}', [LinktreeAdminController::class, 'updateLink'])->name('global_settings.admin.update_link');
//        Route::delete('{linkId}', [LinktreeAdminController::class, 'deleteLink'])->name('global_settings.admin.delete_link');
//    });
//
//});
