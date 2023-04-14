<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TaxPayer;

class UserTaxPayer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'Tin',
        'TIN_BranchCode',
        'tp_id',
        'status',
    ];
    public function tax_payer($id)
    {
        
        $taxpayer = TaxPayer::where('tax_payers.tp_id','=',$id)->first();
        // DD($taxpayer);
        return $taxpayer;
    }

}
