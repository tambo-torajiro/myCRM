<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $tel = str_replace('-','',$this->faker->phoneNumber);
        $address = mb_substr($this->faker->address,9);

        return [
            'name' => $this->faker->name,
            'work_category' => $this->faker->numberBetween(1,10),
            'tel' => $tel,
            'email' => $this->faker->email,
            'postcode' => $this->faker->postcode,
            'address' => $address,
            'person_in_charge1' => $this->faker->name,
            'person_in_charge2' => $this->faker->name,
            'person_in_charge3' => $this->faker->name,
            'request_date' => $this->faker->dateTime,
            'memo' => $this->faker->realText(50),
        ];
    }
}
