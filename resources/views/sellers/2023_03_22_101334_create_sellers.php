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
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Tin',9)->nullable();
            $table->string('BranchCd',5)->nullable();
            $table->string('Type')->nullable();
            $table->string('RegNm',200)->nullable();
            $table->string('BusinessNm',200)->nullable();
            $table->string('Email',100)->nullable();
            $table->string('RegAddr')->nullable();  
            $table->string('seller_cd',20)->unique()->nullable();      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holdings');
    }
};
