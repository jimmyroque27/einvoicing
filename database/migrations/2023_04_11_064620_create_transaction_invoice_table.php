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
       
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('buyer_id',20)->nullable();
            $table->string('RegNm',200)->nullable(); //Registered Name
            $table->string('seller_id',20)->nullable(0);
            //SI/OR/SB/DM/CM Management
            $table->string('InvoiceNumber',50)->nullable();     //Company SI/OR/SB/DM/CM No.
            $table->string('InvoiceDate',10)->nullable();          //SI/OR/SB/DM/CM Issuance Date
            $table->string('OrderNumber',50)->nullable();     //Buyer Order Number
            $table->string('OrderDate',10)->nullable();          // Buyer Order Date
                
            // Total Net Item
            $table->float('TotNetItemSales',30)->default(0);
            // Discounting 
            $table->float('ScAmt',30)->default(0); //Senior Citizen Discount Amount	
            $table->float('PwdAmt',30)->default(0); // PWD Discount
            $table->float('RegAmt',30)->default(0); // Regular Discount
            $table->float('SpeAmt',30)->default(0); // Special Discount
            $table->String('Rmk2')->nullable();

            // Total Net Sales After Discounts 
            $table->float('TotNetSalesAftDisct',30)->default(0);
    
            //Tax Information	
            $table->float('VATAmt',30)->default(0);    //VAT Amount
            $table->float('WithholdIncome',30)->default(0);    //Withholding Tax-Income Tax
            $table->float('WithholdBusVAT',30)->default(0);    //Withholding Tax-Business VAT
            $table->float('WithholdBusPT',30)->default(0);    //Withholding Tax-Business Percentage
            // Other Taxable Revenue
            $table->float('OtherTaxRev',30)->default(0);    //Other Taxable Revenue
            //Non-taxable	
            $table->float('OtherNonTaxCharge',30)->default(0);    //Other Non-taxable charges

            // Net Amount Payable	
            $table->float('NetAmtPay')->default(0);    //Net Amount Payable
            
            // VATableSales	
            $table->float('VATableSales')->default(0);    //VATableSales

       

            // Foreign Currency Information	
            $table->string('ForCur',200)->nullable();       //Foreign Currency
            $table->string('Currency',3)->nullable();       //Currency
            $table->float('ConvRate',30)->default(0);    //Conversion Rate
            $table->float('ForexAmt',30)->default(0);    //Currency Amount
            
            //   PTU Information 
            $table->string('PtuNum',50)->nullable();       //PTU Number/Acknowledgment Certificate Control Number	
    
            // $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('cascade');
            // $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->timestamps();
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_invoice');
    }
};
