<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('blog_translations', function (Blueprint $table) {
      $table->id();
      $table->foreignId('blog_id')->constrained()->onDelete('cascade');
      $table->enum('language', ['fr', 'ar', 'en']);
      $table->string('title');
      $table->text('content');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('blog_translations');
  }
};
