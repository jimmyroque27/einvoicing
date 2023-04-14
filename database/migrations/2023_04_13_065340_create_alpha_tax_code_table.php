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
        Schema::create('alpha_tax_codes', function (Blueprint $table) {
            $table->id();
            $table->string('atc_code',10)->nullable();
            $table->string('description')->nullable();
            $table->string('coverage')->nullable();
            $table->string('type')->nullable();
            $table->float('ewt_rate',10,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alpha_tax_code');
    }
};
