<?php
namespace App\Models;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Extend the correct base class

class User extends Authenticatable// Extending Authenticatable instead of Model
{
  use HasFactory, Notifiable;

  protected $fillable = ['name', 'email', 'password', 'role'];

  public function consultations() {
    return $this->hasMany(Consultation::class);
  }
}
