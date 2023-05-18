<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Context;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser, HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
      * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'avatar',
        'status',
        'rol',
        'id_people',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canAccessFilament(Context $context): bool
    {
        return $this->email === 'gabriel.calle92@gmail.com';
    }

    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Pet::class, 'favorites')->withTimestamps();
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function contact_forms()
    {
        return $this->hasMany(ContactForm::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50); 
    }
}
