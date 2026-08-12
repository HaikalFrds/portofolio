<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('web'); // web | ml | mobile | other
            $table->string('summary')->nullable();       // short, buat card
            $table->longText('description')->nullable();  // long, buat halaman detail
            $table->json('tech_stack')->nullable();       // ["Laravel","Tailwind"]
            $table->string('thumbnail')->nullable();      // path/URL gambar cover
            $table->string('repo_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->json('meta')->nullable();             // field khusus ML: {accuracy, model, notebook_url,...}
            $table->boolean('featured')->default(false);  // tampil di home
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
