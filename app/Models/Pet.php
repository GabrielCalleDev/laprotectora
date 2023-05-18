<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Pet extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'pets';
    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
        'sex',
        'color',
        'size',
        'weight',
        'adoption_status',
        'admission_date',
        'adoption_date',
        'health_conditions',
        'medications',
        'history',
        'neutered',
        'observations',
        'shelter_house_id'
    ];

    public function shelterHouse()
    {
        return $this->belongsTo(ShelterHouse::class);
    }

    public function petHistories()
    {
        return $this->hasMany(PetHistory::class);
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}
