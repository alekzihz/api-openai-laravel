<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dominio>
 */
class DominioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            "nombre_dominio" => $this->faker->domainName(),
            "url" => $this->faker->url(),
            "data_registro" => $this->faker->dateTime(),
            "data_alta" => $this->faker->dateTime(),
            "data_baja" => $this->faker->dateTime(),
            "actiu" => $this->faker->boolean(),
            //
        ];
    }
}
