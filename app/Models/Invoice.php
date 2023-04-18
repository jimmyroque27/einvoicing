<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id' ,
        'buyer_id' ,
        'RegNm'  ,
        'InvoiceDate' ,
        'InvoiceNumber' ,
        'OrderNumber' ,
        'OrderDate' ,
        'Currency' ,
        'ForCur'  ,
        'ConvRate'  ,
        'ForexAmt'  ,
        'TotNetItemSales'  ,
        'ScAmt' ,
        'PwdAmt' ,
        'RegAmt'  ,
        'SpeAmt' ,
        'Rmk2'  ,
        'VATAmt' ,
        'WithholdIncome' ,
        'WithholdBusVAT' ,
        'WithholdBusPT'  ,
        'OtherTaxRev' ,
        'OtherNonTaxCharge'  ,
        'NetAmtPay'  ,
        'VATableSales' ,
        'TotNetSalesAftDisct',
        
         
       
    ];
}
