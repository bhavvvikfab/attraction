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
        Schema::table('attractions', function (Blueprint $table) {
            $table->text('original_price')->nullable()->after('country'); // Add new column after 'country'
            $table->text('display_price')->nullable()->after('original_price'); // Add new column after 'original_price'
            $table->text('markup_value')->nullable()->after('display_price'); // Add new column after 'display_price'
            $table->text('markup_type')->nullable()->after('markup_value'); // Add new column after 'markup_value'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attractions', function (Blueprint $table) {
            
            $table->dropColumn('original_price');
            $table->dropColumn('display_price');
            $table->dropColumn('markup_value');
            $table->dropColumn('markup_price');
        });
    }
};
