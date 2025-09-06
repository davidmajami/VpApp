<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Narudzbina extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'datum_narudzbine',
        'nacin_placanja',
        'ukupna_cena',
        'kupac_id',
        'zaposleni_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'datum_narudzbine' => 'datetime',
    ];

    public function narudzbineKupca()
    {
        return $this->belongsTo(User::class, 'kupac_id', 'user_id');
    }

    public function narudzbineZaposleni()
    {
        return $this->belongsTo(User::class, 'zaposleni_id', 'user_id');
    }

    public function stavke_narudzbine()
    {
        return $this->belongsToMany(Proizvod::class, 'stavkenarudzbine');
    }
}
