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
        Schema::create('hiring_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('worker_id');
            $table->foreign('employer_id')->references('id')->on('users');
            $table->foreign('worker_id')->references('id')->on('users');
            $table->string('projectTitle')->nullable();
            $table->text('projectDescription')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->text('scopeOfWork')->nullable();
            
            // Add Payment Terms Columns
            $table->decimal('totalPayment', 10, 2)->nullable();
            $table->enum('paymentFrequency', ['hourly', 'perDay'])->default('hourly');
            $table->enum('paymentMethod', ['bankTransfer', 'cash'])->default('cash');
        
            $table->text('status')->default('Pending');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiring_form');
    }
};
