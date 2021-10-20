<?php

namespace Database\Factories;

use App\Models\Buyer;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuyerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Buyer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_date = $this->faker->dateTimeBetween('-5 years', 'now');

        return [
            'fullname' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'image' => $this->faker->imageUrl(640, 480, 'Person', true),
            'created_at' => $created_date,
            'updated_at' => null,
            'admin_created_at' => $created_date,
            'admin_updated_at' => null,
        ];
    }
}
