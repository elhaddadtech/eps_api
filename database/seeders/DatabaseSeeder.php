<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Consultation;
use App\Models\Contact;
use App\Models\Destination;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  public function run() {
    User::factory(10)->create();
    Service::factory(5)->create();
    Consultation::factory(10)->create();
    Destination::factory(5)->create();
    BlogPost::factory(5)->create();
    Contact::factory(5)->create();
  }
}
