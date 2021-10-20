<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('admin'),
            ]
            
        ];

        foreach ($data as $key => $value) {
            DB::table('users')->insert([
                // 'id' => $value['id'],
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => $value['password'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
