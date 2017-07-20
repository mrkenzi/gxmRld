<?php

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

Auth::routes();

Route::get('/', 'GameController@_homepage')->name('home');
Route::get('upcoming-game', 'GameController@_upComing');
Route::get('listgame-download', 'GameController@_listAllGames');
Route::get('category/{rqUrl}', 'GameController@_category');
Route::get('game/{rqUrl}', 'GameController@_viewGame');
Route::get('mod/{rqUrl}', 'GameController@_viewMod');
Route::get('download/{rqUrl}', 'GameController@_download');
Route::get('dl-game/{dlUrl}/{nameGame}', 'GameController@_downloadBs64');

Route::resource('request-game', 'RequestGameController');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('admin', 'PostController@index');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/mod-cms', 'ModController');
    Route::resource('admin/category-cms', 'CategoryController');
    Route::get('admin/mod-create/{gameId}', 'ModController@_create');
    Route::get('admin/mod-create-tool', 'ModController@_createTool');

    Route::get('admin/craw-game', 'CrawController@_index');
    Route::get('admin/get-new/{pagestart}/{pageend}', 'CrawController@_getNew');
    Route::get('admin/craw-game/{crawId}', 'CrawController@_getInfo');
    Route::get('admin/craw-remove/{crawId}', 'CrawController@_removeCraw');

});

