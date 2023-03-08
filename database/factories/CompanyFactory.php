<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'address2' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'district' => $this->faker->city,
            'country' => $this->faker->country,
            'zipcode' =>$this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'logo' => $this->faker->imageUrl(),

        ];
    }
}
