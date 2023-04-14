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
        Schema::create('transaction_delivery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transcation_id');
            // Proof of Delivery/Export
            $table->string('DevAddr')->nullable();      //Delivery Address
            $table->string('AirNum',50)->nullable();        //Airway Bill Number
            $table->string('AirNumDt',10)->nullable();      //Airway Bill Number Date
            $table->string('LadNum',50)->nullable();        //Bill of Lading Number
            $table->string('LadNumDt',10)->nullable();      //Bill of Lading Number Date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_delivery');
    }
};
