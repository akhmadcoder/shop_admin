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
        $this->call(UsersSeeder::class);
        $this->call(MeasuresSeeder::class);
        $this->call(ItemsSeeder::class);
        \App\Models\Buyer::factory(200)->create();
        \App\Models\Storage::factory(3000)->create();
        \App\Models\Purchase::factory(2000)->create();

    }
}
