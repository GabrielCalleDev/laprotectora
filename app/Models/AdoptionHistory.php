<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptionHistory extends Model
{
    use HasFactory;

    protected $table = 'adoptions_histories';
    protected $fillable = [
        'adoption_id',
        'status',
        'update',
    ];

    public function adoption()
    {
        return $this->belongsTo(Adoption::class);
    }
}
