<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('faqs', function (Blueprint $table) {
      $table->id();
      $table->enum('language', ['fr', 'ar', 'en']);
      $table->foreignId('destination_id')->constrained()->onDelete('cascade');
      $table->text('question');
      $table->text('answer');
      $table->integer('order_index')->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('faqs');
  }
};
