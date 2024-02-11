<?php

namespace App\Helper;

class Menu
{
	public function __construct()
	{
	}

	/**
	 * @function get the menu by user_level
	 * @param $user_level
	 */
	public static function get($user_level)
	{
		return self::arrayToJson(self::getMenus($user_level));
	}

	// get menu for master level
	public static function adminMenu($user_level)
	{
		return [
			[
				'name' 	=> 'Beranda',
				'class' => 'c-black-500 ti-dashboard',
				'route'	=> route($user_level . './')
			],
			[
				'name' 	=> 'Data Instansi',
				'class' => 'c-black-500 ti-home',
				'route'	=> route($user_level . '.office')
			],
			[
				'name' 	=> 'Profil',
				'class' => 'c-black-500 ti-tag',
				'route'	=> route($user_level . '.profile')
			],
			// [
			// 	'name' 	=> 'Lembaga',
			// 	'class' => 'c-black-500 ti-bookmark-alt',
			// 	'route'	=> route($user_level . '.lembaga')
			// ],
			// [
			// 	'name' 	=> 'Paket Keahlian',
			// 	'class' => 'c-black-500 ti-target',
			// 	'route'	=> route($user_level.'.paket_keahlian')
			// ],
			[
				'name' 	=> 'Berita',
				'class' => 'c-black-500 ti-announcement',
				'route'	=> route($user_level . '.news')
			],
			[
				'name' 	=> 'Galeri Foto',
				'class' => 'c-black-500 ti-image',
				'route'	=> route($user_level . '.gallery')
			],
			// [
			// 	'name' 	=> 'Galeri Video',
			// 	'class' => 'c-black-500 ti-video-camera',
			// 	'route'	=> route($user_level . '.video')
			// ],
			[
				'name' 	=> 'Download',
				'class' => 'c-black-500 ti-download',
				'route'	=> route($user_level . '.download')
			],
			[
				'name' 	=> 'Staff Pengajar',
				'class' => 'c-black-500 ti-user',
				'route'	=> route($user_level . '.staff')
			],
			[
				'name' 	=> 'Slideshow',
				'class' => 'c-black-500 ti-video-clapper',
				'route'	=> route($user_level . '.slideshow')
			],
			[
				'name' 	=> 'Ekstrakurikuler',
				'class' => 'c-black-500 ti-hand-open',
				'route'	=> route($user_level . '.ekstrakurikuler')
			],
			[
				'name' 	=> 'Fasilitas',
				'class' => 'c-black-500 ti-direction',
				'route'	=> route($user_level . '.fasilitas')
			],
			[
				'name' 	=> 'Portal',
				'class' => 'c-black-500 ti-link',
				'route'	=> route($user_level . '.portal')
			],
			// [
			// 	'name' 	=> 'Kurikulum',
			// 	'class' => 'c-black-500 ti-book',
			// 	'route'	=> route($user_level . '.kurikulum')
			// ],
			// [
			// 	'name' 	=> 'Pendaftar',
			// 	'class' => 'c-black-500 ti-user',
			// 	'route'	=> route($user_level.'.pendaftar')
			// ],
			// [
			// 	'name' 	=> 'Daftar Ulang',
			// 	'class' => 'c-black-500 ti-reload',
			// 	'route'	=> route($user_level.'.daftar_ulang')
			// ],
			// [
			// 	'name' 	=> 'Pengaduan Online',
			// 	'class' => 'c-black-500 ti-location-arrow',
			// 	'route'	=> route($user_level.'.pengaduan')
			// ],
			// [
			// 	'name' 	=> 'Kritik dan Saran',
			// 	'class' => 'c-black-500 ti-marker',
			// 	'route'	=> route($user_level.'.kritik_saran')
			// ],
			// [
			// 	'name' 	=> 'File Manager',
			// 	'class' => 'c-black-500 ti-file',
			// 	'route'	=> route($user_level . '.file-manager')
			// ],
		];
	}

	public static function getMenus($user_level)
	{
		$user_level = strtolower($user_level);

		if ($user_level == "admin") {
			return self::adminMenu($user_level);
		} else if ($user_level == "user") {
			return self::userMenu($user_level);
		}

		return self::clusterAdminMenu($user_level);
	}


	public static function arrayToJson($array)
	{
		return json_decode(json_encode($array));
	}
}
