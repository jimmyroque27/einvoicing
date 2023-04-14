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
        Schema::create('contacts', function (Blueprint $table) {
            // 'tp_id	TIN	TIN_BranchCode	tp_classification	private_or_government	registered_name	
            // trade_name	last_name	first_name	middle_name	SEC_Registration_No.	
            // SEC_Registration_date.	cor_ocn	cor_issued_date	industry	vat_registered	
            // registered_activities	address_line1	address_line2	Barangay	
            // Town/City	Province	ZIPCode	RDO	business_email_address	contact_number	registration_type'
            $table->id();
            $table->string('company_id',20)->unique()->nullable();
            $table->string('tp_id')->nullable();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('tp_classification',1)->nullable();
            $table->string('registered_name',200)->nullable();
            $table->string('trade_name',200)->nullable();
            $table->boolean('private_or_government',1)->default(1);
            $table->string('Tin',9)->nullable();
            $table->string('TIN_BranchCode',5)->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('Barangay')->nullable();
            $table->string('District')->nullable();
            $table->string('City')->nullable();
            $table->string('Province')->nullable();
            $table->string('ZipCode',10)->nullable();
            $table->string('business_email_address')->nullable();
            $table->string('contact_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
