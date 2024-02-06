<?php

// Route for Frontend
Route::namespace('Web')->group(function () {
	Route::get('/', 'HomepageController@index')->name('index');
	Route::get('/profil/{profil}', 'ProfilController@index')->name('profil');
	Route::get('/fasilitas/{fasilitas}', 'FasilitasController@index')->name('fasilitas');
	Route::get('/lembaga/{lembaga}', 'LembagaController@index')->name('lembaga');
	Route::get('/berita', 'BeritaController@index')->name('berita');
	Route::get('/berita/{berita}', 'BeritaController@detail')->name('berita.detail');
	Route::get('/prestasi', 'PrestasiController@index')->name('prestasi');
	Route::get('/prestasi/{prestasi}', 'PrestasiController@detail')->name('prestasi.detail');
	Route::get('/fasilitas/{fasilitas}', 'FasilitasController@index')->name('fasilitas');
	Route::get('/ekstrakurikuler/{ekstrakurikuler}', 'EkstrakurikulerController@index')->name('ekstrakurikuler');
	Route::get('/galeri-foto', 'GaleriFotoController@index')->name('galeri_foto');
	Route::get('/galeri-video', 'GaleriVideoController@index')->name('galeri_video');
	Route::get('/staff-pengajar', 'StaffPengajarController@index')->name('staff_pengajar');
	Route::get('/staff-pengajar/{staff_pengajar}/detail', 'StaffPengajarController@detail')->name('staff_pengajar.detail');
	Route::get('/pendaftaran', 'PendaftaranController@index')->name('pendaftaran');
	Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap');
});


// Route for Authentication
Route::namespace('Auth')->group(function () {
	Route::get('login', 'LoginController@showLoginForm')->name('login');
	Route::post('login', 'LoginController@login');
	Route::post('logout', 'LoginController@logout')->name('logout');
});


// Route for Backend
Route::middleware('auth')->group(function () {
	Route::get('/admin')->middleware('checkUserLevel');

	Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('admin')->group(function () {
		Route::get('/', 'DashboardController@index')->name('/');

		Route::get('change-password', 'UserController@index')->name('change-password');
		Route::post('', 'UserController@savePassword')->name('save-password');

		Route::prefix('office')->name('office')->group(function () {
			Route::get('', 'OfficeController@index')->name('');
			Route::put('', 'OfficeController@update')->name('.update');
		});

		Route::prefix('profile')->name('profile')->group(function () {
			Route::get('', 'ProfileController@index')->name('');
			Route::post('', 'ProfileController@store')->name('.insert');
			Route::get('create', 'ProfileController@create')->name('.create');
			Route::get('{profile}/edit', 'ProfileController@edit')->name('.edit');
			Route::put('', 'ProfileController@update')->name('.update');
			Route::delete('', 'ProfileController@delete')->name('.delete');
		});

		Route::prefix('kurikulum')->name('kurikulum')->group(function () {
			Route::get('', 'KurikulumController@index')->name('');
			Route::post('', 'KurikulumController@store')->name('.insert');
			Route::get('create', 'KurikulumController@create')->name('.create');
			Route::get('{kurikulum}/edit', 'KurikulumController@edit')->name('.edit');
			Route::put('', 'KurikulumController@update')->name('.update');
			Route::delete('', 'KurikulumController@delete')->name('.delete');
		});

		Route::prefix('fasilitas')->name('fasilitas')->group(function () {
			Route::get('', 'FasilitasController@index')->name('');
			Route::post('', 'FasilitasController@store')->name('.insert');
			Route::get('create', 'FasilitasController@create')->name('.create');
			Route::get('{fasilitas}/edit', 'FasilitasController@edit')->name('.edit');
			Route::put('', 'FasilitasController@update')->name('.update');
			Route::delete('', 'FasilitasController@delete')->name('.delete');
		});

		Route::prefix('lembaga')->name('lembaga')->group(function () {
			Route::get('', 'LembagaController@index')->name('');
			Route::post('', 'LembagaController@store')->name('.insert');
			Route::get('create', 'LembagaController@create')->name('.create');
			Route::get('{lembaga}/edit', 'LembagaController@edit')->name('.edit');
			Route::put('', 'LembagaController@update')->name('.update');
			Route::delete('', 'LembagaController@delete')->name('.delete');
		});

		Route::prefix('ekstrakurikuler')->name('ekstrakurikuler')->group(function () {
			Route::get('', 'EkstraKurikulerController@index')->name('');
			Route::post('', 'EkstraKurikulerController@store')->name('.insert');
			Route::get('create', 'EkstraKurikulerController@create')->name('.create');
			Route::get('{ekstrakurikuler}/edit', 'EkstraKurikulerController@edit')->name('.edit');
			Route::put('', 'EkstraKurikulerController@update')->name('.update');
			Route::delete('', 'EkstraKurikulerController@delete')->name('.delete');
		});

		Route::prefix('staff')->name('staff')->group(function () {
			Route::get('', 'StaffController@index')->name('');
			Route::post('', 'StaffController@store')->name('.insert');
			Route::get('create', 'StaffController@create')->name('.create');
			Route::get('{staff}/edit', 'StaffController@edit')->name('.edit');
			Route::put('', 'StaffController@update')->name('.update');
			Route::delete('', 'StaffController@delete')->name('.delete');
		});

		Route::prefix('gallery')->name('gallery')->group(function () {
			Route::get('', 'GalleryController@index')->name('');
			Route::post('', 'GalleryController@store')->name('.insert');
			Route::get('create', 'GalleryController@create')->name('.create');
			Route::delete('', 'GalleryController@delete')->name('.delete');
			Route::get('download/{file}', 'GalleryController@download')->name('.download');
		});

		Route::prefix('video')->name('video')->group(function () {
			Route::get('', 'VideoController@index')->name('');
			Route::post('', 'VideoController@store')->name('.insert');
			Route::get('create', 'VideoController@create')->name('.create');
			Route::get('{video}/edit', 'VideoController@edit')->name('.edit');
			Route::put('', 'VideoController@update')->name('.update');
			Route::delete('', 'VideoController@delete')->name('.delete');
		});

		Route::prefix('news')->name('news')->group(function () {
			Route::get('', 'NewsController@index')->name('');
			Route::post('', 'NewsController@store')->name('.insert');
			Route::get('create', 'NewsController@create')->name('.create');
			Route::get('{news}/edit', 'NewsController@edit')->name('.edit');
			Route::put('', 'NewsController@update')->name('.update');
			Route::delete('', 'NewsController@delete')->name('.delete');
		});

		Route::prefix('file-manager')->name('file-manager')->group(function () {
			Route::get('', 'FileManagerController@index')->name('');
			Route::post('', 'FileManagerController@store')->name('.insert');
			Route::get('create', 'FileManagerController@create')->name('.create');
			Route::delete('', 'FileManagerController@delete')->name('.delete');
			Route::get('download/{file}', 'FileManagerController@download')->name('.download');
		});

		Route::prefix('slideshow')->name('slideshow')->group(function () {
			Route::get('', 'SlideshowController@index')->name('');
			Route::post('', 'SlideshowController@store')->name('.insert');
			Route::get('create', 'SlideshowController@create')->name('.create');
			Route::get('{slideshow}/edit', 'SlideshowController@edit')->name('.edit');
			Route::put('', 'SlideshowController@update')->name('.update');
			Route::delete('', 'SlideshowController@delete')->name('.delete');
		});

		Route::prefix('download')->name('download')->group(function () {
			Route::get('', 'DownloadController@index')->name('');
			Route::post('', 'DownloadController@store')->name('.insert');
			Route::get('create', 'DownloadController@create')->name('.create');
			Route::get('{download}/edit', 'DownloadController@edit')->name('.edit');
			Route::put('', 'DownloadController@update')->name('.update');
			Route::delete('', 'DownloadController@delete')->name('.delete');
		});

		Route::prefix('pengaduan')->name('pengaduan')->group(function () {
			Route::get('', 'PengaduanController@index')->name('');
			Route::post('', 'PengaduanController@store')->name('.insert');
			Route::get('create', 'PengaduanController@create')->name('.create');
			Route::get('{pengaduan}/edit', 'PengaduanController@edit')->name('.edit');
			Route::put('', 'PengaduanController@update')->name('.update');
			Route::delete('', 'PengaduanController@delete')->name('.delete');
		});

		Route::prefix('kritik_saran')->name('kritik_saran')->group(function () {
			Route::get('', 'KritikSaranController@index')->name('');
			Route::post('', 'KritikSaranController@store')->name('.insert');
			Route::get('create', 'KritikSaranController@create')->name('.create');
			Route::get('{kritik_saran}/edit', 'KritikSaranController@edit')->name('.edit');
			Route::put('', 'KritikSaranController@update')->name('.update');
			Route::delete('', 'KritikSaranController@delete')->name('.delete');
		});

		Route::prefix('pendaftar')->name('pendaftar')->group(function () {
			Route::get('', 'PendaftarController@index')->name('');
			Route::post('', 'PendaftarController@store')->name('.insert');
			Route::get('create', 'PendaftarController@create')->name('.create');
			Route::get('{pendaftar}/edit', 'PendaftarController@edit')->name('.edit');
			Route::put('', 'PendaftarController@update')->name('.update');
			Route::delete('', 'PendafarController@delete')->name('.delete');
			Route::post('', 'PendaftarController@verifikasi')->name('.verifikasi');
		});

		Route::prefix('daftar_ulang')->name('daftar_ulang')->group(function () {
			Route::get('', 'DaftarUlangController@index')->name('');
			Route::post('', 'DaftarUlangController@batal')->name('.batal');
		});
	});
});
