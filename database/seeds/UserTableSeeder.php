<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->delete();


    	// User::create(array(
    	// 	'name' => 'Munkh Oto',
    	// 	'email' => 'munkhoto@gmail.com',
    	// 	'password' => Hash::make('2k16Pa$$word')
    	// 	));

        User::create(array(
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('usukh72')
            ));
    }
}