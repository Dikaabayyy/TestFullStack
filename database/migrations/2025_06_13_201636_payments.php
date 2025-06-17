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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('payment_price');
            $table->enum('payment_term', ['Bulanan', 'Tahunan']);
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('payment_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('residents_id')->nullable()->index();
            $table->enum('security_term', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
            $table->bigInteger('security_price')->default(100000);
            $table->enum('security_time', ['Bulanan', 'Tahunan'])->default('Bulanan');
            $table->enum('cleaning_term', ['Lunas', 'Belum Lunas'])->default('Belum Lunas');
            $table->bigInteger('cleaning_price')->default(15000);
            $table->enum('cleaning_time', ['Bulanan', 'Tahunan'])->default('Bulanan');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('payment_history');
    }
};
