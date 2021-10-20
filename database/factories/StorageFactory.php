<?php

namespace Database\Factories;

use App\Models\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class StorageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Storage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_date = $this->faker->dateTimeBetween('-5 years', 'now');
        
        return [
            'quantity' => random_int(1,20),
            'date' => $created_date,
            'item_id' => random_int(1,10),
            'created_at' => $created_date,
            'updated_at' => null,
            'admin_created_at' => $created_date,
            'admin_updated_at' => null,
        ];
    }
}
