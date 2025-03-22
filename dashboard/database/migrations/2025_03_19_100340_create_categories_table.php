<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable(); // Category description
            $table->enum('status', ['active', 'inactive', 'archived'])->default('active'); // Category status
            $table->foreignId('parent_id')->nullable()->constrained('categories'); // Parent category (self-referencing)
            $table->string('image')->nullable(); // Image URL or path
            $table->string('meta_title')->nullable(); // Meta title for SEO
            $table->string('meta_description')->nullable(); // Meta description for SEO
            $table->unsignedBigInteger('created_by')->nullable(); // Creator's user ID
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
