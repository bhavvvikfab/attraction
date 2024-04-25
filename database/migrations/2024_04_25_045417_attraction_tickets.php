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
        Schema::create('attraction_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attraction_id');
            $table->foreign('attraction_id')->references('id')->on('attractions')->onDelete('cascade');
            $table->longText('attraction_options')->nullable();
            $table->longText('attraction_tickets')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attraction_tickets');
    }
};
