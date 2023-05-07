<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetHistory extends Model
{
    use HasFactory;

    protected $table = 'pets_histories';
    protected $fillable = [
        'pet_id',
        'date',
        'type',
        'description',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
