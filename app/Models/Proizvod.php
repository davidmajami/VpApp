<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proizvod extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv', 'cena', 'slika', 'grupa_id'];

    protected $searchableFields = ['*'];

    public function grupaProizvoda()
    {
        return $this->belongsTo(GrupaProizvoda::class, 'grupa_id', 'grupa_id');
    }

    public function narudzbinas()
    {
        return $this->belongsToMany(Narudzbina::class, 'stavkenarudzbine');
    }
}
