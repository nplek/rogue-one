<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::group(['middleware' => 'auth:api'], function(){
    Route::name('po.')->group( function(){
        Route::prefix('po')->group( function(){
            Route::get('/', 'API\PurchaseController@index')->name('index');
            Route::get('/docnum/{docnum}', 'API\PurchaseController@findDocnum')->name('docnum');
            Route::get('/project/{project}', 'API\PurchaseController@findPOByProject')->name('project');
            Route::get('/docnum/{docnum}/project/{project}', 'API\PurchaseController@findPOByDocnumProject')->name('docnum.project');
            Route::get('/docnum/{docnum}/items', 'API\PurchaseController@findPOItemByDocnum')->name('docnum.items');
        });
    });
    
    Route::name('item.')->group( function() {
        Route::prefix('item')->group( function() {
            Route::get('/', 'API\ItemController@index')->name('index');
            Route::get('/{itemcode}', 'API\ItemController@findItemCode')->name('itemcode');
        });
    });

    Route::name('itemgrp.')->group( function() {
        Route::prefix('itemgrp')->group( function() {
            Route::get('/', 'API\ItemController@listItemGroup')->name('index');
            Route::get('/{itemGroupCode}', 'API\ItemController@findItemGroup')->name('code');
            Route::get('/name/{itemGroupCode}', 'API\ItemController@findItemGroupName')->name('name');
        });
    });

    Route::name('warehouses.')->group( function() {
        Route::prefix('warehouses')->group( function() {
            Route::get('/', 'API\WarehouseController@index')->name('index');
            Route::get('/{whscode}', 'API\WarehouseController@findWhsCode')->name('whscode');
        });
    });
//});
