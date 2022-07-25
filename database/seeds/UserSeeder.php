<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'first_name'    => 'Admin',
            'last_name'     => 'Admin',
            'phone'         => '1234567890',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('12345678'),
            'role_id'       => 1,
            'image'         => ''
        ]);

        $customerUser = User::create([
            'first_name'    => 'staff',
            'last_name'     => 'staff',
            'phone'         => '1234567890',
            'email'         => 'staff@gmail.com',
            'password'      => Hash::make('12345678'),
            'role_id'       => 2,
            'image'         => ''
        ]);

        $customerUser = User::create([
            'first_name'    => 'Customer',
            'last_name'     => 'Customer',
            'phone'         => '1234567890',
            'email'         => 'customer@gmail.com',
            'password'      => Hash::make('123123'),
            'role_id'       => 3,
            'image'         => ''
        ]);
    }
}
