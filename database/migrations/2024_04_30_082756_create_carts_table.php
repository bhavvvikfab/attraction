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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('attraction_id');
            $table->mediumText('options');
            $table->text('more_info')->nullable();
            $table->decimal('subTotal_payableAmount', 10, 2)->nullable();
            $table->decimal('subtTotal_payableToMerchant', 10, 2)->nullable();
            $table->decimal('sub_total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
