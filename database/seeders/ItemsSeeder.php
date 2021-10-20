<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $data = [
            [
                'name' => 'apple',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 1.55,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ],
            [
                'name' => 'banana',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 1.21,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ],
            [
                'name' => 'rice',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 0.55,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ],
            [
                'name' => 'watermelon',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 2.77,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ],
            [
                'name' => 'cooking oil',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 0.95,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ],
            [
                'name' => 'sugar',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 0.32,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ],
            [
                'name' => 'appricots',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 0.99,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ],
            [
                'name' => 'sprite 0.5',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 0.22,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ],
            [
                'name' => 'water 1L',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 0.15,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ],
            [
                'name' => 'pampkin',
                'SKU' => $faker->bothify('?###??##'),
                'price' => 1.04,
                'image' => $faker->imageUrl(640, 480, 'Product', true),
                'measure_id' => random_int(1, 2),
            ]
            
        ];

        foreach ($data as $key => $value) {
            DB::table('items')->insert([
                'name' => $value['name'],
                'SKU' => $value['SKU'],
                'price' => $value['price'],
                'image' => $value['image'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'admin_created_at' => date('Y-m-d H:i:s'),
                'admin_updated_at' => null,
                'measure_id' => $value['measure_id'],
                
            ]);
        }
    }
}
