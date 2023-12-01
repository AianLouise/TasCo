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
        Schema::create('jobseeker_application', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Assuming a foreign key relationship with the users table
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('resume');
            $table->string('valid_id');
            $table->string('barangay_clearance');
            $table->string('police_clearance');
            $table->string('latest_picture');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeker_application');
    }
};
