<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;

class BlogArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre'             => $this->faker->words(3, true),
            'titre_fr'          => $this->faker->words(3, true),
            'body'              => $this->faker->text(300),
            'body_fr'           => $this->faker->text(300),
            'etudiants_id'      => Etudiant::inRandomOrder()->first()->id,
        ];
    }
}
