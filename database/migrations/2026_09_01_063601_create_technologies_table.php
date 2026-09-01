<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name');                       // Tailwind CSS
            $table->string('slug');                       // tailwindcss — slug Simple Icons
            $table->string('color')->nullable();          // override hex, kosongkan = warna brand
            $table->unsignedTinyInteger('row')->default(1); // baris marquee: 1 atau 2
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};