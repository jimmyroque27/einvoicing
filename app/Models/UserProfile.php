<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'address1',
        'address2',
        'city',
        'province',
        'country',
        'zipcode',
        'contactno',
        'birthdate'

    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
