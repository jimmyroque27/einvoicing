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
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tp_id')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('category_id')->default(0);
            
            $table->string('ItemCode',20)->nullable();
            $table->string('item_name',100)->nullable();
            $table->string('Description',100)->nullable();
            // $table->float('Qty')->nullable();
            $table->string('UnitofMeasure',100)->nullable();
            $table->float('UnitSalesPrice')->default(0);
            $table->string('VAT_Type')->nullable();
            $table->string('ATC')->nullable();
            $table->float('EWT_Rate')->default(0);
            $table->timestamps();

            // item_id	company_id	ItemCode	item_name	Description	item_category	SalesDescription	SalesUnitPrice	SalesAccount	SalesTaxRate	InventoryAssetAccount	CostOfGoodsSoldAccount	PurchaseDescription	PurchasesUnitPrice	PurchasesAccount	PurchasesTaxRate	UnitofMeasure	UnitSalesPrice	*VAT_Type	ATC	EWT_Rate	NET Amount	Original Currency	PHP Equivalent	Tracking options
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
