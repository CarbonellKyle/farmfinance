<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appdata')->insert([
            'key' => 'reminder',
            'value' => 'You can write some reminders here!'
        ]);

        DB::table('appdata')->insert([
            'key' => 'farmcode',
            'value' => 'urbanozo'
        ]);
    }
}
