<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShelterHouse extends Model
{
    use HasFactory;

    protected $table = 'shelters_houses';
    protected $fillable = [
        'name',
        'responsible',
        'street_address',
        'street_number',
        'address_details',
        'city',
        'postal_code',
        'coordinates',
        'phone',
        'email',
        'capacity',
        'observations',
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

}
