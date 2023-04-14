<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'user_id',
        'tp_id',
        'tp_classification',
        'registered_name',
        'trade_name',
        'private_or_government', 
        'Tin',
        'TIN_BranchCode',
        'address_line1',
        'address_line2',
        'Barangay',
        'District',
        'City',
        'Province',
        'ZipCode',
        'business_email_address',
        'contact_number',
        'VatType'
    ];
    
}
