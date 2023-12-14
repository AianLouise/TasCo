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
        Schema::create('sos_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Assuming you have a 'users' table
            $table->decimal('latitude', 10, 7); // Decimal field for latitude with precision 10 and scale 7
            $table->decimal('longitude', 10, 7); // Decimal field for longitude with precision 10 and scale 7
            $table->string('details'); // Add any other fields as needed
            $table->enum('status', ['emergency', 'resolved'])->default('emergency');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sos_alerts');
    }
};
