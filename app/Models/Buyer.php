<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'buyer_cd',
        'Tin',
        'BranchCd',
        'RegNm',
        'BusinessNm',
        'Email',
        'RegAddr'
    ];
}
