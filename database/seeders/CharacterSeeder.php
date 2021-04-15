<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
            'user_id' => 2,
            'name' => 'Oxus',
            'stats' => json_encode([
                'attributes' => [
                    'STR' => 18,
                    'DEX' => 15,
                    'CON' => 17,
                    'INT' => 9,
                    'WIS' => 9,
                    'CHA' => 11
                ], // end attributes
                'weapons' => [
                    'sword',
                    'spear',
                    'dagger'
                ], // end weapons
            ]) // end json array
        ]); // end character entry

        DB::table('characters')->insert([
            'user_id' => 3,
            'name' => 'Boldrick',
            'stats' => json_encode([
                'attributes' => [
                    'STR' => 12,
                    'DEX' => 18,
                    'CON' => 15,
                    'INT' => 13,
                    'WIS' => 12,
                    'CHA' => 10
                ], // end attributes
                'weapons' => [
                    'dagger',
                    'short sword',
                ], // end weapons
            ]) // end json array
        ]); // end character entry

        DB::table('characters')->insert([
            'user_id' => 4,
            'name' => 'Jeronymo',
            'stats' => json_encode([
                'attributes' => [
                    'STR' => 10,
                    'DEX' => 12,
                    'CON' => 13,
                    'INT' => 18,
                    'WIS' => 15,
                    'CHA' => 14
                ], // end attributes
                'weapons' => [
                    'quarterstaff',
                    'hand crossbow'
                ], // end weapons
            ]) // end json array
        ]); // end character entry
    }
}
