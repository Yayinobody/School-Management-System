<?php

use App\Enums\Gender;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("teachers", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("program_id")->constrained()->cascadeOnDelete();
            $table->string("fname", 50);
            $table->string("mname", 50)->nullable();
            $table->string("lname", 50);
            $table->enum("gender", array_column(Gender::cases(), "value"));
            $table->string("employee_number")->unique();
            $table->date("birthday")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("teachers");
    }
};
