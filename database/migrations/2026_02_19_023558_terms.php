<?php

use App\Enums\Semester;
use App\Enums\TermStatus;
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
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('school_year_id')->constrained()->cascadeOnDelete();
            $table->enum('semester', array_column(Semester::cases(), 'value'));
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', array_column(TermStatus::cases(), 'value'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms');

    }
};
