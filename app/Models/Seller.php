<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'Tin',
        'BranchCd',
        'Type',
        'RegNm',
        'BusinessNm',
        'Email',
        'RegAddr',
        'seller_cd'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
     
}
