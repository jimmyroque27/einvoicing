<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'tp_id',
        'ItemCode',
        'user_id',
        'item_name',
        'Description',
        'UnitofMeasure',
        'UnitSalesPrice',
        'VAT_Type',
        'ATC',
        'EWT_Rate',
        'category_id',
        'category_name',
        // 
    ];
     
}
