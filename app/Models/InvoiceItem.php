<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id' ,
        'ItemCode' ,
        'item_name'  ,
        'Qty' ,
        'UnitofMeasure' ,
        'UnitSalesPrice' ,
        'RegDscntAmt' ,
        'SpeDscntAmt' ,
        'NetUnitPrice'  ,
        'NetAmount'  ,
        'VAT_Type'  ,
        'ATC',
        'EWT_Rate',
        'Tax_Withheld',
         
         
       
    ];
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

}
