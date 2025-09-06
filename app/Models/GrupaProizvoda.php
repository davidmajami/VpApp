<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrupaProizvoda extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv_grupe', 'popust'];

    protected $searchableFields = ['*'];

    protected $table = 'grupa_proizvodas';

    public function proizvodi()
    {
        return $this->hasMany(Proizvod::class, 'grupa_id', 'grupa_id');
    }
}
