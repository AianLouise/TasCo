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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hiring_form_id')->nullable();
            $table->unsignedBigInteger('employer_id')->nullable();
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->string('status')->default('Pending');
            $table->timestamps();

            // Adding the foreign key constraints
            $table->foreign('hiring_form_id')
                ->references('id')
                ->on('hiring_forms')
                ->onDelete('cascade');

            $table->foreign('employer_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('worker_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
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
