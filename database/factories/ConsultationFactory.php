<?php

namespace Database\Factories;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultationFactory extends Factory {
  protected $model = Consultation::class;

  public function definition() {
    return [
      'name'           => $this->faker->name(),
      'email'          => $this->faker->unique()->safeEmail(),
      'destination_id' => 1, // Remplacez par un ID existant dans votre base
      'message'        => $this->faker->sentence(),
    ];
  }
}
