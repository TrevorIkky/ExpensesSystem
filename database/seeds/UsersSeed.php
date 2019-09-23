<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'  => 'Jos',
        	'email'  => 'jos@gmail.com',
        	'password' => Hash::make('pass'),
        	'remember_token' => str_random(10),
        ]);
    }
}
