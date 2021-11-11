<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Administrator',
           'email' => 'admin@admin.com',
           'user_type' => 'admin',
           'password' => bcrypt('12345678')
        ]);
    }
}