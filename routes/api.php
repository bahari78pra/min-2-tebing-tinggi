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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('API')->group(function(){
	Route::get('/slide-show', 'SlideShowController@index')->name('slide-show');
	Route::get('/profile/{profile}', 'ProfileController@index')->name('profile');
	Route::get('/news/{from}/{end}', 'NewsController@index')->name('news');
	Route::get('/headline-news', 'NewsController@headline')->name('headline.news');
	Route::get('/news/{id}', 'NewsController@detail')->name('news.detail');
	Route::get('/agenda', 'AgendaController@index')->name('agenda');
	Route::get('/agenda/{id}', 'AgendaController@detail')->name('agenda.detail');
	Route::get('/service', 'ServiceController@index')->name('service');
	Route::get('/service/{id}', 'ServiceController@detail')->name('service.detail');
	Route::get('/survey', 'SurveyController@index')->name('survey');
	Route::get('/gallery', 'GalleryController@index')->name('gallery');
	Route::get('/video', 'VideoController@index')->name('video');
	Route::get('/video-latest', 'VideoController@latest')->name('video.latest');
	
	Route::get('/check-bdt', 'BdtController@index')->name('check-bdt');
	Route::get('/check-bdt/{id}', 'BdtController@detail')->name('check-bdt.detail');
	Route::get('/check-bpnt', 'KksController@index')->name('check-kks');
	Route::get('/check-bpnt/{id}', 'KksController@detail')->name('check-kks.detail');
	Route::get('/check-pkh', 'PkhController@index')->name('check-pkh');
	Route::get('/check-pkh/{id}', 'PkhController@detail')->name('check-pkh');

	Route::get('/kecamatan', 'KecamatanController@index')->name('kecamatan');
	Route::get('/kelurahan/{id_kecamatan}', 'KecamatanController@getKelurahan')->name('kelurahan');

	Route::post('/complaint', 'ComplaintController@store')->name('complaint.insert');
	Route::post('/complaint/upload', 'ComplaintController@uploadPhoto')->name('complaint.upload');
	Route::post('/submission', 'SubmissionController@store')->name('submission.insert');
});
