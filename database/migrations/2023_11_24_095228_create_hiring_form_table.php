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
            $table->unsignedBigInteger('employer_id')->nullable();
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->foreign('employer_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('worker_id')->references('id')->on('users')->nullOnDelete();
            $table->string('projectTitle')->nullable();
            $table->string('projectDescription')->nullable();
            $table->date('startDate')->nullable();
            $table->date('endDate')->nullable();
            $table->string('scopeOfWork')->nullable();
            
            // Add Payment Terms Columns
            $table->decimal('totalPayment', 10, 2)->nullable();
            $table->enum('paymentFrequency', ['hourly', 'perDay'])->default('hourly');
            $table->enum('paymentMethod', ['bankTransfer', 'cash'])->default('cash');
        
            $table->string('status')->default('Pending');
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
