<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory {
  protected $model = BlogPost::class;
  public function definition() {
    return [
      'slug' => Str::slug($this->faker->unique()->sentence(3)),
    ];
  }
}
