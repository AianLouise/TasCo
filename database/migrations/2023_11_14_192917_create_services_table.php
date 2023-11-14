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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('provider_id')->constrained('users');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            // Drop existing foreign key constraints, if any
            $table->dropForeign(['category_id']);
            $table->dropForeign(['provider_id']);

            // Add new foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('provider_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
