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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id')->default(0);
            // Line items Information
            $table->string('ItemCode',20)->nullable();       //Item Name
            $table->string('item_name',200)->nullable();     //Item Description/Service
            $table->float('Qty')->nullable();           //Item Quantity
            $table->string('UnitofMeasure',100)->nullable();     //Item Unit of measure
            $table->float('UnitSalesPrice')->default(0);      //Unit Cost
            $table->string('VAT_Type',2)->nullable();      //Item Sales Amount
            $table->float('RegDscntAmt')->default(0);   //Regular Item Discount Amount
            $table->float('SpeDscntAmt')->default(0);   //Special Item Discount Amount
            $table->float('NetUnitPrice')->default(0);      //Net of Unit Price
            $table->float('NetAmount')->default(0);      //Net of  Item Sales
            $table->string('ATC',10)->nullable();
            $table->float('EWT_Rate')->default(0);
            $table->float('Tax_Withheld')->default(0);
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
