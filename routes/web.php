<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/doc');
});

Auth::routes();

Route::group(['middleware' => 'localization'], function() {

    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');

		Route::prefix('/doc')->group(function () {


		// <--------------------------view route---------------------------------->
			Route::get('/', function () 
			{
			    return view('will.InputValue');

			})->name('will.InputValue');

			Route::get('/dashboard', function () 
			{
			    return view('admin.manager.dashboard');

			})->name('doc.dashboard');

			Route::get('/auth', function () 
			{
			    return view('TestAuth.TestAuth');

			})->name('doc.TestAuth');

			Route::post('/laravel', 'HomeController@testme')->name('demo.testme');
			Route::get('/laravel', 'HomeController@testafter')->name('doc.laravel');

			Route::get('/cotoken', function () 
			{
    			return view('will.vidutoken.co');

     		})->name('co.token');

			Route::get('/khongtoken', function () 
			{
			    return view('will.vidutoken.khong');

			})->name('khong.token');

			Route::get('/checkre', function () 
			{
    			return view('will.khiemtrarequest.requestchec');

     		})->name('chec.requ');

     		Route::post('/checkre/dd', ['uses' => 'HomeController@testcheckre', 'as' => 'test.check.request']);

     		Route::get('/reqp', function () 
     		{

    			return response('Hello World', 200)->header('Content-Type', 'text/plain');
			})->name('check.response');

     		Route::get('/user/{user}', 'HomeController@userpage')->name('user.page');

     		Route::get('/error', ['uses' => 'HomeController@testloerror', 'as' => 'doc.check.error']);

     		Route::get('/logging', ['uses' => 'HomeController@logging', 'as' => 'doc.check.logging']);

     		Route::get('/testauth', function () 
     		{
    			return view('will.TestAuth.TestAuth');

     		})->name('doc.testauth');
     		Route::get('/listenmail', function () 
     		{
    			return view('mail.listenermail');

     		})->name('mail.listenermail');

     		Route::get('/mail', function () 
     		{
    			return view('mail.form');

			})->name('mailform');
			Route::get('/tesmailform', function () 
     		{
    			return view('mail.sendform');

			})->name('sendform');
			Route::get('/validate', function () 
     		{
    			return view('will.ValidateTest.ValidateForm');

			})->name('validate.test');

			Route::post('/message/send', ['uses' => 'HomeController@addFeedback', 'as' => 'front.fb']);
			Route::post('/validate/go', 'HomeController@notifi')->name('validate.go');
			Route::get('/demo/manager', 'HomeController@manager')->name('demo.manager');
			Route::post('/adduser', 'HomeController@userfun')->name('demo.userfun');
			Route::get('/delete/{user}', 'HomeController@delete')->name('demo.deleteuser');
			Route::post('/update', 'HomeController@update')->name('demo.updateuser');
			Route::get('/cache', 'HomeController@cachemaintain')->name('demo.cachemain');
			Route::get('/noti/{id}', 'HomeController@markread')->name('demo.markread');
			Route::get('/all', 'HomeController@xoahet')->name('demo.xoahet');
			Route::get('/collectelo', 'HomeController@collectelo')->name('demo.collectelo');
			Route::get('/g', 'HomeController@httpg')->name('demo.g');
			Route::post('/upload', 'HomeController@uploadimage')->name('demo.uploadimage');
     		Route::get('/testmurators', ['uses' => 'HomeController@muratorstest', 'as' => 'muratorstest.muratorstest']);
     		Route::get('/accessorstest', ['uses' => 'HomeController@accessorstest', 'as' => 'muratorstest.accessorstest']);
     		Route::get('/e', ['uses' => 'HomeController@sendEmail', 'as' => 'demo.sendEmail']);
     		Route::get('/serializeelo', ['uses' => 'HomeController@serializeelo', 'as' => 'demo.serializeelo']);
			Route::post('import', 'HomeController@import')->name('demo.import');
			Route::get('export', 'HomeController@export')->name('demo.export');
			Route::get('rela', 'HomeController@rela')->name('demo.rela');


		// <--------------------------view route---------------------------------->


		});
});