<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        User::create([
            'name' => 'Random user',
            'email' => 'random@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Miloš Glogovac',
            'email' => 'milos.glogovac@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('losmi183'),
            'remember_token' => Str::random(10),
        ]);
    }
}
