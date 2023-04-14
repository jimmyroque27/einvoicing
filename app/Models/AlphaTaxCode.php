<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlphaTaxCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'atc_code',
        'description',
        'type',
        'ewt_rate',
        'coverage',
        
    ];

}
