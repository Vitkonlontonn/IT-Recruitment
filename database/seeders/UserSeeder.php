<?php

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        $arr = [];
        $companies = Company::query()->pluck('id')->toArray();
        $faker = \Faker\Factory:: create();
        for ($i = 1; $i < 100; $i++) {


            $arr = [
                "name" => $faker->name,
                "avatar" => $faker->imageUrl(),
                "email" => $faker->email,
                "password" => $faker->password(),
                "phone" => $faker->phoneNumber,
                "link" => null,
                "role" => $faker->randomElement(UserRoleEnum::getValues()),
                "bio" => $faker->boolean ? $faker->word : null,
                "position" => $faker->jobTitle,
                "gender" => $faker->boolean,
                "city" => $faker->city,
                "company_id" => array_rand($companies),

            ];
            User:: insert($arr);
        }

    }
}
