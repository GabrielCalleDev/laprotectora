<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $table = 'questionnaires';
    protected $fillable = [
        'observation',
        'answers',
    ];
    protected $casts = [
        'answers' => 'string',
    ];

    public function adoption()
    {
        return $this->hasOne(Adoption::class);
    }


}
