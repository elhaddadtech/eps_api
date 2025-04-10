<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array {
    return [
      'slug'      => Str::slug($this->faker->unique()->words(2, true)), // Générer un slug aléatoire
      'video_url' => 'https://www.youtube.com/watch?v=6v2L2UGZJAM',
    ];
  }
}
