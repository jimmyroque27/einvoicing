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
        Schema::create('tax_payers', function (Blueprint $table) {
            // 'tp_id	TIN	TIN_BranchCode	tp_classification	private_or_government	registered_name	
            // trade_name	last_name	first_name	middle_name	SEC_Registration_No.	
            // SEC_Registration_date.	cor_ocn	cor_issued_date	industry	vat_registered	
            // registered_activities	address_line1	address_line2	Barangay	
            // Town/City	Province	ZIPCode	RDO	business_email_address	contact_number	registration_type'

            $table->id();
            $table->string('tp_id')->unique()->nullable();
            $table->string('tp_classification',1)->nullable();
            $table->string('first_name',100)->nullable();
            $table->string('middle_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('registered_name',200)->nullable();
            $table->string('trade_name',200)->nullable();
            $table->boolean('private_or_government',1)->default(1);
            $table->string('BirthDate',10)->nullable();
            $table->string('Tin',9)->nullable();
            $table->string('TIN_BranchCode',5)->nullable();
            $table->string('cor_issued_date',10)->nullable();
            $table->string('cor_ocn')->nullable();
            $table->string('SEC_Registration_date',10)->nullable();
            $table->string('SEC_Registration_No')->nullable();
            $table->string('industry')->nullable();
            $table->string('registered_activities')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('Barangay')->nullable();
            $table->string('District')->nullable();
            $table->string('City')->nullable();
            $table->string('Province')->nullable();
            $table->string('ZIPCode',10)->nullable();
            $table->string('RDO')->nullable();
            $table->string('CalFiscal',1)->nullable();
            $table->boolean('FiscalEnd',2)->default(0);
            $table->string('business_email_address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('registration_type',1)->nullable();
            $table->boolean('vat_registered',1)->default(0);
            //   PTU Information 
            $table->string('PtuNum',50)->unique();       //PTU Number/Acknowledgment Certificate Control Number	
 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TaxPayers');
    }
};
