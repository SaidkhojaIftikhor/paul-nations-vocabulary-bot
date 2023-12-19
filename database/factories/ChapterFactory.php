<?php

namespace Database\Factories;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ChapterFactory extends Factory {
    protected $model = Chapter::class;

    public function definition(): array {
        return [
            'number' => $this->faker->randomNumber(),
            'title' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
