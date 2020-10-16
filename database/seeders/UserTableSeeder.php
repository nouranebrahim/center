<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => '2'

        ]);
        $admin->assignRole('admin');

        $admin = User::create([
            'name' => 'nor',
            'email' => 'nor@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => '1'

        ]);
        $admin->assignRole('student');
    }
}
