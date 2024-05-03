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
        Schema::table('bookings', function (Blueprint $table) {
            $table->text('reference_no')->nullable()->after('customer_id');
            $table->text('booking_time')->nullable()->after('reference_no');
            $table->text('confirm_time')->nullable()->after('booking_time');
            $table->text('alternate_email')->nullable()->after('confirm_time');
            $table->decimal('local_amt', 10, 2)->nullable()->after('alternate_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
            $table->dropColumn('reference_no');
            $table->dropColumn('booking_time');
            $table->dropColumn('confirm_time');
            $table->dropColumn('alternate_email');
            $table->dropColumn('local_amt');
        });
    }
};
