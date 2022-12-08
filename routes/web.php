<?php

use Illuminate\Support\Facades\Route;
use Skcin7\LaravelLinktree\Http\Controllers\LinktreeController;
use Skcin7\LaravelLinktree\Http\Controllers\LinktreeAdminController;

Route::get('/', [LinktreeController::class, 'index'])->name('linktree.index');

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [LinktreeAdminController::class, 'admin'])->name('linktree.admin');
    Route::post('/', [LinktreeAdminController::class, 'admin'])->name('linktree.admin.update_settings');

    Route::group(['prefix' => 'groups'], function() {
        Route::post('/', [LinktreeAdminController::class, 'createGroup'])->name('linktree.admin.create_group');
        Route::put('{groupId}', [LinktreeAdminController::class, 'updateGroup'])->name('linktree.admin.update_group');
        Route::delete('{groupId}', [LinktreeAdminController::class, 'deleteGroup'])->name('linktree.admin.delete_group');
    });

    Route::group(['prefix' => 'links'], function() {
        Route::post('/', [LinktreeAdminController::class, 'createLink'])->name('linktree.admin.create_link');
        Route::put('{linkId}', [LinktreeAdminController::class, 'updateLink'])->name('linktree.admin.update_link');
        Route::delete('{linkId}', [LinktreeAdminController::class, 'deleteLink'])->name('linktree.admin.delete_link');
    });

});






// use Illuminate\Support\Facades\Route;

// Route::group(['prefix' => 'linktree'], function() {

//     Route::get('/', [
//         'uses' => 'LinktreeController@index',
//         'as' => 'index',
//         'middleware' => 'check-linktree-referrer',
//     ]);


//     Route::group(['middleware' => 'linktree-admin', 'prefix' => 'admin'], function() {

//         Route::get('/', [
//             'uses' => 'LinktreeController@admin',
//             'as' => 'admin',
//         ]);

//     });

// });



//Route::middleware(['linktree-admin'])->group(function() {
//    Route::post('/token/refresh', [
//        'uses' => 'TransientTokenController@refresh',
//        'as' => 'token.refresh',
//    ]);
//
//    Route::get('/authorize', [
//        'uses' => 'AuthorizationController@authorize',
//        'as' => 'authorizations.authorize',
//    ]);
//
//    Route::post('/authorize', [
//        'uses' => 'ApproveAuthorizationController@approve',
//        'as' => 'authorizations.approve',
//    ]);
//
//    Route::delete('/authorize', [
//        'uses' => 'DenyAuthorizationController@deny',
//        'as' => 'authorizations.deny',
//    ]);
//
//    Route::get('/tokens', [
//        'uses' => 'AuthorizedAccessTokenController@forUser',
//        'as' => 'tokens.index',
//    ]);
//
//    Route::delete('/tokens/{token_id}', [
//        'uses' => 'AuthorizedAccessTokenController@destroy',
//        'as' => 'tokens.destroy',
//    ]);
//
//    Route::get('/clients', [
//        'uses' => 'ClientController@forUser',
//        'as' => 'clients.index',
//    ]);
//
//    Route::post('/clients', [
//        'uses' => 'ClientController@store',
//        'as' => 'clients.store',
//    ]);
//
//    Route::put('/clients/{client_id}', [
//        'uses' => 'ClientController@update',
//        'as' => 'clients.update',
//    ]);
//
//    Route::delete('/clients/{client_id}', [
//        'uses' => 'ClientController@destroy',
//        'as' => 'clients.destroy',
//    ]);
//
//    Route::get('/scopes', [
//        'uses' => 'ScopeController@all',
//        'as' => 'scopes.index',
//    ]);
//
//    Route::get('/personal-access-tokens', [
//        'uses' => 'PersonalAccessTokenController@forUser',
//        'as' => 'personal.tokens.index',
//    ]);
//
//    Route::post('/personal-access-tokens', [
//        'uses' => 'PersonalAccessTokenController@store',
//        'as' => 'personal.tokens.store',
//    ]);
//
//    Route::delete('/personal-access-tokens/{token_id}', [
//        'uses' => 'PersonalAccessTokenController@destroy',
//        'as' => 'personal.tokens.destroy',
//    ]);
//});
