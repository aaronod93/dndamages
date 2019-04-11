<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'it.aaron.odonnell@gmail.com', 
            'password' => Hash::make('test01'),
            'username' => 'azza1993',
            'name' => 'Aaron O\'Donnell'
        ]);
    }
}
