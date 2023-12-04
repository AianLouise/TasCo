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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hiring_form_id');
            $table->unsignedBigInteger('employer_id')->default(0);
            $table->unsignedBigInteger('worker_id')->default(0);
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->timestamps();
        
            // Adding the foreign key constraints
            $table->foreign('hiring_form_id')
                ->references('id')
                ->on('hiring_forms')
                ->onDelete('cascade'); // You can adjust the onDelete behavior based on your needs
        
            $table->foreign('employer_id')
                ->references('id')
                ->on('users'); // Assuming 'id' is the primary key in the 'users' table, adjust if needed
        
            $table->foreign('worker_id')
                ->references('id')
                ->on('users'); // Assuming 'id' is the primary key in the 'users' table, adjust if needed
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
