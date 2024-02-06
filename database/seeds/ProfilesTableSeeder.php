<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
        	'title'  			=> 'Tentang Kami',
        	'detail' 			=> '',
        	'image' 			=> ''
        ]);
    }
}
