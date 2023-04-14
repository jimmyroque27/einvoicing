<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxPayer extends Model
{
    use HasFactory;
    protected $fillable = [
           // 'tp_id	TIN	TIN_BranchCode	tp_classification	private_or_government	registered_name	
            // trade_name	last_name	first_name	middle_name	SEC_Registration_No.	
            // SEC_Registration_date.	cor_ocn	cor_issued_date	industry	vat_registered	
            // registered_activities	address_line1	address_line2	Barangay	
            // Town/City	Province	ZIPCode	RDO	business_email_address	contact_number	registration_type'

        'tp_classification',
        'first_name',
        'middle_name',
        'last_name',
        'registered_name',
        'trade_name',
        'private_or_government', 
        'BirthDate',
        'Tin',
        'TIN_BranchCode',
        'cor_issued_date',
        'cor_ocn',
        'SEC_Registration_date',
        'SEC_Registration_No',
        'industry',
        'registered_activities',
        'address_line1',
        'address_line2',
        'Barangay',
        'District',
        'City',
        'Province',
        'ZIPCode',
        'RDO',
        'CalFiscal',
        'FiscalEnd',
        'business_email_address',
        'contact_number',
        'registration_type',
        'vat_registered',
        'PtuNum',
        'tp_id'
    ];
    
    
    
}
