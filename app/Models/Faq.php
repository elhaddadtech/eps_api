<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model {
  protected $fillable = ['destination_id', 'language', 'question', 'answer', 'order_index'];
  protected $casts    = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
  ];
}
