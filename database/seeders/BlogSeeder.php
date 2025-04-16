<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder {
  /**
   * Run the database seeds.
   */
  public function run(): void {
    $faker = \Faker\Factory::create();

    for ($i = 1; $i <= 10; $i++) {
      $blog = Blog::create([
        'image' => "blog{$i}.jpg",
      ]);

      $translations = [
        'en' => [
          'title'   => "Blog Post {$i} - " . Str::title($faker->words(3, true)),
          'content' => $faker->paragraphs(10, true),
        ],
        'fr' => [
          'title'   => "Article de Blog {$i} - " . Str::title($faker->words(3, true)),
          'content' => $faker->paragraphs(10, true),
        ],
        'ar' => [
          'title'   => "المقال {$i} - " . Str::title($faker->words(3, true)),
          'content' => str_repeat("هذا وصف طويل لمقال رقم {$i}. ", 30),
        ],
      ];

      foreach ($translations as $lang => $data) {
        BlogTranslation::create([
          'blog_id'  => $blog->id,
          'language' => $lang,
          'title'    => $data['title'],
          'content'  => $data['content'],
        ]);
      }
    }
  }
}
