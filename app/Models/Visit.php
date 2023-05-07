<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $table = 'visits';
    protected $fillable = [
        'description',
        'user_id',
        'user_id_responsible',
        'pet_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_responsible()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
