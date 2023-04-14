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
        Schema::create('user_tax_payers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('tp_id')->nullable();
            $table->string('Tin',9)->nullable();
            $table->string('TIN_BranchCode',5)->nullable();
            $table->string('status',3)->nullable()->default('on');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tp_id')->references('tp_id')->on('tax_payers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tax_payers');
    }
};
