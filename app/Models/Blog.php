<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
  use HasFactory;
  protected $fillable = ['image'];
  public function getFormattedCreatedAtAttribute() {
    return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
  }

  public function getFormattedUpdatedAtAttribute() {
    return Carbon::parse($this->attributes['updated_at'])->format('Y-m-d');
  }
  public function translations() {
    return $this->hasMany(BlogTranslation::class);
  }
}
