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
        Schema::create('e_invoice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('einvoice_id')->default(0);
            // Line items Information
            $table->string('Nm',100)->nullable();       //Item Name
            $table->string('Desc',100)->nullable();     //Item Description/Service
            $table->float('Qty')->nullable();           //Item Quantity
            $table->string('Unit',100)->nullable();     //Item Unit of measure
            $table->float('UnitCost')->default(0);      //Unit Cost
            $table->float('SalesAmt')->default(0);      //Item Sales Amount
            $table->float('RegDscntAmt')->default(0);   //Regular Item Discount Amount
            $table->float('SpeDscntAmt')->default(0);   //Special Item Discount Amount
            $table->float('NetSales')->default(0);      //Net of  Item Sales
            $table->string('TaxCd')->nullable();        //Tax Code (for items with different vat classification-eInvoice sending based on different classifications)
            $table->foreign('einvoice_id')->references('id')->on('einvoices')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_invoice_items');
    }
};
