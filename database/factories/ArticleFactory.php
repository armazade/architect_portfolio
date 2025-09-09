<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(4),
            'excerpt'     => $this->faker->sentence(10),
            'summary'     => $this->faker->paragraph(),
            'description' => $this->faker->paragraphs(3, true),
            'date'        => $this->faker->date(), // Y-m-d
        ];
    }

}
