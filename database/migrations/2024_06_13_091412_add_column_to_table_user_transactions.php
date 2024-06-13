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
        Schema::table('user_transactions', function (Blueprint $table) {
            //
            $table->tinyInteger('paylater')->default(0)->comment('1=paylater, 0=none')->after('balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_transactions', function (Blueprint $table) {
            //
            $table->dropColumn('paylater');
        });
    }
};
