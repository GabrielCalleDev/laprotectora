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

    public function scopeByName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }

    public function scopeBySpecies($query, $species)
    {
        if ($species) {
            return $query->where('species', 'LIKE', "%$species%");
        }
    }

    public function scopeByAge($query, $age)
    {
        if ($age) {
            if ($age == '1') {
                $query->whereDate('age', '>', now()->subYear());
            } else if ($age == '1-2') {
                $query->whereDate('age', '>', now()->subYears(2))
                    ->whereDate('age', '<=', now()->subYear());
            } else if ($age == '2-3') {
                $query->whereDate('age', '>', now()->subYears(3))
                    ->whereDate('age', '<=', now()->subYears(2));
            } else if ($age > '3') {
                $query->whereDate('age', '<=', now()->subYears(3));
            }
        }
        return $query;
    }
    

    public function scopeByGenre($query, $genre)
    {
        if ($genre) {
            return $query->where('sex', 'LIKE', "%$genre%");
        }
    }

    public function scopeBySize($query, $size)
    {
        if ($size) {
            return $query->where('size', 'LIKE', "%$size%");
        }
    }

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
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'pet_id')->withTimestamps();
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
}
