<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'address' => 'jl.Wonosari,Bantul,Yogyakarta',
            'number_phone' => '6282271829090',
        ]);

        $admin->assignRole('admin');
    }
}
