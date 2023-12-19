<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UnitFactory extends Factory {
    protected $model = Unit::class;

    public function definition(): array {
        return [
            'number' => $this->faker->randomNumber(),
            'title' => $this->faker->word(),
            'chapter_id' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
