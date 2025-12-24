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
        Schema::create('company_review', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Company::class)->constrained('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Review::class)->constrained('reviews')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_review');
    }
};
