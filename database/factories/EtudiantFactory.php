<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
use App\Models\User;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'dateNaissance' => $this->faker->date($format = 'Y-m-d', $max = '2010-01-01'),
            'villes_id' => Ville::inRandomOrder()->first()->id,
            'users_id' => User::factory()->create()->id
        ];
    }
}
