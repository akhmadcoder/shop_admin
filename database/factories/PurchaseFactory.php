<?php

namespace Database\Factories;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Purchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_date = $this->faker->dateTimeBetween('-5 years', 'now');
        
        return [
            'buyer_id' => random_int(1,200),
            'item_id' => random_int(1,10),
            'quantity' => random_int(1,20),
            'created_at' => $created_date,
            'updated_at' => null,
        ];
    }
}
