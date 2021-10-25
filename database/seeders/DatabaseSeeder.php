<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ReminderSeeder::class]);
        $this->call(LaratrustSeeder::class);
        $this->call(DummySeeder::class);
        $this->call([UsersTableSeeder::class]);
    }
}
