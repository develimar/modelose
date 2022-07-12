<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'address' => $this->faker->streetAddress(),
            'number' => $this->faker->randomNumber(5),
            'complement' => $this->faker->streetName(),
            'zipcode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'state' => $this->faker->city()
        ];
    }
}
