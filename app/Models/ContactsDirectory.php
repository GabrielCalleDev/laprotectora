<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactsDirectory extends Model
{
    use HasFactory;

    protected $table = 'contacts_directory';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'company',
        'position',
        'notes',
        'type',
    ];
}
