<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('consultations', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('destination_id')->constrained()->onDelete('cascade');
      $table->string('phone');
      $table->string('gender')->nullable();
      $table->string('agency')->nullable();
      $table->text('message')->nullable();
      $table->enum('status', ['pending', 'confirmed', 'rejected'])->default('pending');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('consultations');
  }
};
