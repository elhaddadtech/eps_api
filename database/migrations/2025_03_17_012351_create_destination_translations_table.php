<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('destination_translations', function (Blueprint $table) {
      $table->id();
      $table->foreignId('destination_id')->constrained()->onDelete('cascade');
      $table->enum('language', ['fr', 'ar', 'en']);
      $table->string('name');
      $table->text('description')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('destination_translations');
  }
};
