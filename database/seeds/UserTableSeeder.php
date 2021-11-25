<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //      
        User::create([
            'name' => 'Admin',
            'email' => 'bambook1124@gmail.com',
            'email_verified_at' => '1998-11-24 00:00:00',
            'password' => Hash::make('password'),
        ]);
    }
}
