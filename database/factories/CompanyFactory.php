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

            'name' => $this->faker->lastName,
            'address' => $this->faker->streetName,
            'address2' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'district' => $this->faker->city,
            'country' => "VietNam",
            'zipcode' =>$this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'logo' => $this->faker->imageUrl(),

        ];
    }
}
