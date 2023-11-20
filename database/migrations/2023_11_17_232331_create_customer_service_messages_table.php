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
        Schema::create('customer_service_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('subject');
            $table->text('message');
            $table->timestamps();
        });

        // Migration for replies table
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_service_message_id')->constrained(); // foreign key
            $table->foreignId('user_id')->nullable()->constrained(); // optional user who made the reply
            $table->text('message');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_service_messages');
    }
};
