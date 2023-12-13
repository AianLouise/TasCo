<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hiring_form_id');
            $table->unsignedBigInteger('event_id'); // Add the foreign key for event_id
            $table->text('job_description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        
            // Add columns for Image 1, Image 2, and Image 3
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
        
            $table->timestamps();
        
            // Adding the foreign key constraint for hiring_form_id
            $table->foreign('hiring_form_id')
                ->references('id')
                ->on('hiring_forms')
                ->onDelete('cascade'); // You can adjust the onDelete behavior based on your needs
        
            // Adding the foreign key constraint for event_id
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade'); // You can adjust the onDelete behavior based on your needs
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employments');
    }
};
