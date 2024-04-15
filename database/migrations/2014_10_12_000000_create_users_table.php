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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('role')->comment("1=admin,2=agent");
            $table->string('name',191);
            $table->string('email',191)->unique();
            $table->text('phone')->nullable();
            $table->text('country')->nullable();
            $table->text('address')->nullable();
            $table->text('profile')->nullable();
            $table->tinyInteger('status')->comment("0=pending,1=active,2=unactive");
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password',191);
            $table->rememberToken();
            $table->decimal('credit_balance', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
