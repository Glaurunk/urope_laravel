<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sta8is',
            'email' => 'stathis@qwerty.com',
            'password' => Hash::make('stathis'),
            'role' => 'dm'
        ]);
        DB::table('users')->insert([
            'name' => 'Paloulos',
            'email' => 'paloulos@qwerty.com',
            'password' => Hash::make('paloulos'),
            'role' => 'player'
        ]);
        DB::table('users')->insert([
            'name' => 'Agapi',
            'email' => 'agapi@qwerty.com',
            'password' => Hash::make('agapi'),
            'role' => 'player'
        ]);
        DB::table('users')->insert([
            'name' => 'Kostakis',
            'email' => 'kostakis@querty.com',
            'password' => Hash::make('kostakis'),
            'role' => 'player'
        ]);
    }
}
