<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('role');                         // jabatan/posisi
            $table->string('organization');                 // perusahaan/organisasi/kampus
            $table->string('type')->default('work');        // work | internship | organization | education | event
            $table->string('location')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();           // null = sampai sekarang
            $table->text('description')->nullable();
            $table->json('highlights')->nullable();         // poin pencapaian (list)
            $table->string('logo')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};