<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model {
  use HasFactory;

  protected $fillable = ['user_id', 'destination_id', 'phone', 'gender', 'agency', 'message', 'status'];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function destination() {
    return $this->belongsTo(Destination::class);
  }
}
