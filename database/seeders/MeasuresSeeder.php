<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MeasuresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'kg',
            ],
            [
                'name' => 'piece',
            ]
            
        ];

        foreach ($data as $key => $value) {
            DB::table('measures')->insert([
                'name' => $value['name'],
            ]);
        }
    }
}
