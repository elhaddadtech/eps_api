<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model {
  use HasFactory;
  protected $fillable = ['blog_id', 'language', 'title', 'content'];
  protected $appends  = ['formatted_created_at', 'formatted_updated_at'];

  public function getFormattedCreatedAtAttribute() {
    return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
  }

  public function getFormattedUpdatedAtAttribute() {
    return Carbon::parse($this->attributes['updated_at'])->format('Y-m-d');
  }
  public function blog() {
    return $this->belongsTo(Blog::class);
  }
}
