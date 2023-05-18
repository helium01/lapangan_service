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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('id_lapangan');
            $table->text('fasilitas1')->nullable();
            $table->text('fasilitas2')->nullable();
            $table->text('fasilitas3')->nullable();
            $table->text('fasilitas4')->nullable();
            $table->text('fasilitas5')->nullable();
            $table->text('fasilitas6')->nullable();
            $table->text('fasilitas7')->nullable();
            $table->text('fasilitas8')->nullable();
            $table->text('fasilitas9')->nullable();
            $table->text('fasilitas10')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
