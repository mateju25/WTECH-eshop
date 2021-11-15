<?php

namespace Database\Seeders;

use App\Models\CustomerInfo;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //heslo adminadmin
        $admin = User::create([
            'email' => 'admin@admin.com',
            'admin' => true,
            'password' => '$2y$10$IZGRB1/pZar4QeTmd5UacOiLLIkSQL4lOPKaMj6n7bkEOJQgPXl4S'
        ]);

        CustomerInfo::create([
            'name' => 'Admin',
            'user_id' => $admin->id,
            'street' => '',
            'postalCode' => '',
            'city' => '',
            'phone' => '',
            'email' => 'admin@admin.com',
        ]);

        $user = User::create([
            'email' => 'matej.delincak@gmail.com',
            'admin' => false,
            'password' => '$2y$10$oHKGzgLC8CyBVF1dk.Ny8ObYwUz9H1HSBhwsiFq6gfzZxuYKiywdG'
        ]);

        CustomerInfo::create([
            'name' => 'Matej Delincak',
            'user_id' => $user->id,
            'street' => 'Hviezdoslavova',
            'postalCode' => '02201',
            'city' => 'Cadca',
            'phone' => '0999456789',
            'email' => 'matej.delincak@gmail.com',
        ]);
    }
}
