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
        //This seeder is required since these data are necessary for the system to function and are used as default values

        //Creates the default reminder message
        DB::table('appdata')->insert([
            'key' => 'reminder',
            'value' => 'You can write some reminders here!'
        ]);

        //Creates the default farmcode
        DB::table('appdata')->insert([
            'key' => 'farmcode',
            'value' => 'urbanozo'
        ]);
    }
}
