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
        Schema::create('orphanages', function (Blueprint $table) {
            $table->id();
            $table->text('about1');
            $table->text('about2');
            $table->string('image1');
            $table->string('image2');
            $table->text('vision');
            $table->text('mission');
            $table->string('image3');
            $table->string('qris')->nullable();
            $table->string('youtube', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orphanages');
    }
};
