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
        // Using seeder
        //$this->call(PersonTableSeeder::class);

        // Without using seeder
        //\App\Models\Person::factory(10)->create();

        $this->call(BookTableSeeder::class);
        //\App\Models\Book::factory(50)->create();
    }
}
