<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// List of patterns for route parameters

Route::patterns([
    'ARTICLE' => '^([a-z0-9]+(?:[_-]?[a-z0-9]+)*(?:\/[a-z0-9]+(?:[_-]?[a-z0-9]+)*)*)(?:-{2}([A-Za-z0-9_]+))?$'
]);

// Default controllers

Route::controllers([
    'auth'     => Auth\AuthController::class,
    'password' => Auth\PasswordController::class,
]);

// Pages URL

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('ghi-danh', function () { return view('pages.ghidanh'); });

Route::post('ghi-danh', [
    'as'   => 'ghidanh',
    'uses' => 'ghidanh@dangky'
]);

// Test URL
Route::get('test/{page}', [
    'as'   => 'test',
    'uses' => function ($page) {
        switch ($page) {
            case 'admin':
                return view('_testview/admin_index');
            case 'home':
                return view('_testview/home_index');
            default:
                return 'This URL is only for testing!';
        }
    }
]);

// Controllers within the "App\Http\Controllers\Admin" namespace
// Route name: admin::@dmin-zone...
Route::group([
    'as'        => 'admin::',
    'prefix'    => '@dmin-zone',
    'namespace' => 'Admin',
], function () {

    Route::group([
        'as'         => '',
        'middleware' => ['adminzone', 'auth']
    ], function () {

        Route::get('/', [
            'as'   => 'index',
            'uses' => function () {
                return redirect()->route('admin::@dmin-zone.dashboard.index');
            }
        ]);

        // Dashboard routes
        Route::resource('dashboard', 'DashboardController', [
            'only' => ['index']
        ]);

        // Posts routes
        Route::resource('posts', 'PostController');
        
        // Picture routes
        Route::resource('pics', 'PictureController');
        
        Route::post('pics/upload', [
            'as' => '@dmin-zone.pics.upload',
            'uses'=>'PictureController@upload'
        ]);
        
        Route::post('pics/update/{pic_cate_id}', [
            'as' => '@dmin-zone.pics.update',
            'uses' => 'PictureController@update'
        ]);
        
        Route::get('pics/destroy/{pic_cate_id}', [
            'as' => '@dmin-zone.pics.destroy',
            'uses' => 'PictureController@destroy'
        ]);
    });

});

// Controllers within the "App\Http\Controllers\Api" namespace
// Route name: api::...
Route::group([
    'as'        => 'api::',
    'prefix'    => '_api',
    'namespace' => 'Api'
], function () {

    // UploadFile routes
    Route::group([
        'as'         => 'func::',
        'middleware' => 'auth'
    ], function () {

        // _api/upload_image.py
        Route::match(['post', 'put'], 'upload_image.py', [
            'as'   => 'upload_image.store',
            'uses' => 'FileController@storeImage'
        ]);
        Route::get('upload_image.py', [
            'as'   => 'upload_image.index',
            'uses' => function () {
                return '<code>PUT your image :)</code>';
            }
        ]);

    });

});

// image
Route::get('image/{name?}', [
    'as'   => '_image.index',
    'uses' => 'Api\FileController@indexImage'
])->where('name', '^[a-z0-9_-]+(/[a-z0-9_-]+)*\.(jpg|png|gif)$');

// Define multi-level route

Route::get('tin/{ARTICLE?}', [
    'as'   => 'article.index',
    'uses' => 'ArticleController@index'
]);

Route::get('home/album/{pic_cate_id}', "HomeController@album");

Route::get('{PAGE}', [
    'as'   => 'page',
    'uses' => 'HomeController@page'
]);

