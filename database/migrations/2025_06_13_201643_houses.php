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
            Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('resident_status', ['Berpenghuni', 'Tidak Berpenghuni'])->default('Tidak Berpenghuni');
            $table->text('address');
            $table->text('resident_history')->default('Belum Berpenghuni');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
