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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('profession');
            $table->string('photo');
            $table->string('phone');
            $table->enum('gender', ['male', 'female']);
            $table->string('city');
            $table->dateTime('date_of_birth');
            $table->integer('salary_expectation')->unsigned();
            $table->string('education');
            $table->string('educational_institution');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
