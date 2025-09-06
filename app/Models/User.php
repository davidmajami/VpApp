<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;

    protected $fillable = [
        'ime',
        'prezime',
        'username',
        'password',
        'uloga',
        'telefon',
        'email',
        'adresa',
        'jmbg',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password'];

    public function narudzbineKupca()
    {
        return $this->hasMany(Narudzbina::class, 'kupac_id', 'user_id');
    }

    public function narudzbineZaposleni()
    {
        return $this->hasMany(Narudzbina::class, 'zaposleni_id', 'user_id');
    }

    public function isSuperAdmin(): bool
    {
        return in_array($this->email, config('auth.super_admins'));
    }
}
