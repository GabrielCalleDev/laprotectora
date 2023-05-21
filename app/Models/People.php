<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';
    protected $fillable = [
        'name',
        'last_name',
        'dni',
        'phone',
        'birthdate',
        'street_address',
        'address_number',
        'address_details',
        'city',
        'zip_code',
        'type',
        'observations',
        'occupation',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
