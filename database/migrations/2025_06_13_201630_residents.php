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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('houses_id')->nullable()->index();
            $table->string('name');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->enum('resident_status', ['Kontrak', 'Tetap'])->nullable();
            $table->string('phone');
            $table->enum('married', ['Menikah', 'Belum Menikah']);
            $table->string('img_name')->default('images/profile/profile-img.png');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
