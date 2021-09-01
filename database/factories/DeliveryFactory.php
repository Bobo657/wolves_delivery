<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Delivery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sender' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'location' => $this->faker->streetAddress,
            'destination' => $this->faker->streetAddress,
            'tracking_number' => $this->faker->creditCardNumber,
            'status' => $this->faker->randomElement($array = ['cancelled', 'delivered', 'pending', 'in transit']),
            'created_at' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null)
        ];
    }
}
