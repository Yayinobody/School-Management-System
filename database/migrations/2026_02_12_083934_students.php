<?php

use App\Enums\Gender;
use App\Enums\YearLevel;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('fname',50);
            $table->string('mname',50)->nullable();
            $table->string('lname',50);
            $table->enum('gender',  array_column(Gender::cases(), 'value'));
            $table->string('student_number')->unique();
            $table->enum('year_level', array_column(YearLevel::cases(),'value'));
            $table->date('birthday')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};