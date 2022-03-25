<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Super Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('Password'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);
    }
}
