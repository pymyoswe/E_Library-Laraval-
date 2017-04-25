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


Route::get('/',[
    'uses'=>'HomeController@toHome',
    'as'=>'/'

    ]);

Route::get('/bookCoverView/{fileName}',[
    'uses'=>'HomeController@getBookCover',
    'as'=>'bookCoverView'
]);
Route::get('/bookDownload/{bookFile}',[
    'uses'=>'HomeController@getBookDownload',
    'as'=>'bookDownload'

]);
Route::get('/viewByCat/{category}',[
    'uses'=>'HomeController@viewByCategory',
    'as'=>'viewByCat'
]);

Route::group(['prefix'=>'auth'],function (){
    Route::get('login',[
        'uses'=>'AuthController@login',
        'as'=>'login'

    ]);
    Route::get('register',[
        'uses'=>'AuthController@register',
        'as'=>'register'

    ]);
    Route::post('signUp',[
        'uses'=>'AuthController@signUp',
        'as'=>'signUp'
    ]);
    Route::post('signIn',[
        'uses'=>'AuthController@signIn',
        'as'=>'signIn'
    ]);



});

Route::group(['middleware'=>'auth'],function (){

    Route::group(['prefix'=>'book'],function()
    {
        Route::get('book',[
            'uses'=>'BookController@book',
            'as'=>'book'
        ]);
        Route::get('category',[
           'uses'=>'BookController@category',
            'as'=>'category'
        ]);
        Route::post('newCategory',[
           'uses'=>'BookController@newCategory',
            'as'=>'newCategory'
        ]);

        Route::get('deleteCategory/{id}',[
           'uses'=>'BookController@deleteCategory',
            'as'=>'deleteCategory'
        ]);
        Route::post('updateCategory',[
            'uses'=>'BookController@updateCategory',
            'as'=>'updateCategory'
        ]);

        Route::post('newBook',[
            'uses'=>'BookController@newBook',
            'as'=>'newBook'
        ]);
        Route::get('/bookCover/{fileName}',[
            'uses'=>'BookController@getBookCover',
            'as'=>'bookCover'
        ]);
        Route::get('/bookFile/{fileName}',[
           'uses'=>'BookController@getBookFile',
            'as'=>'bookFile'
        ]);

        Route::get('deleteBook/{id}',[
            'uses'=>'BookController@deleteBook',
            'as'=>'deleteBook'

        ]);
        Route::post('updateBook',[
            'uses'=>'BookController@updateBook',
            'as'=>'updateBook'
        ]);


    });

    Route::group(['prefix'=>'user'],function (){

        Route::get('dashboard',[
            'uses'=>'UserController@dashboard',
            'as'=>'dashboard',
            'middleware'=>'auth'
        ]);

    });


    Route::get('logout',[
        'uses'=>'AuthController@logout',
        'as'=>'logout',
        'middleware'=>'auth'
    ]);


});



