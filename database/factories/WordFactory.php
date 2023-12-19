<?php

namespace Database\Factories;

use App\Models\Word;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WordFactory extends Factory {
    protected $model = Word::class;

    public function definition(): array {
        return [
            'value' => $this->faker->word(),
            'unit_id' => $this->faker->randomNumber(),
            'options' => $this->faker->words(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
