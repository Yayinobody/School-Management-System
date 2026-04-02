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
    Schema::create('curriculums', function (Blueprint $table) {
        $table->id();
        $table->foreignId('program_id')->constrained()->cascadeOnDelete();
        $table->foreignId('subject_id')->constrained()->cascadeOnDelete();
        $table->integer('year');
        $table->integer('semester');
        $table->softDeletes();
        $table->timestamps();

        $table->unique(['program_id','subject_id','year','semester']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculums');

    }
};
