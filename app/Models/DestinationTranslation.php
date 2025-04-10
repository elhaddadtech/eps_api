<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationTranslation extends Model {
  use HasFactory;

  protected $fillable = ['destination_id', 'language', 'name', 'description'];

  public function destination() {
    return $this->belongsTo(Destination::class);
  }
}
