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
        Schema::create('sub_categoreis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abber');
            $table->string('direction');
            $table->string('translation_lang');
            $table->string('translation_of');
            $table->foreignId('category_id')->constrained('main_categories')->references('id');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categoreis');
    }
};
