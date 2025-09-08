<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stavkenarudzbine extends Model
{
    use HasFactory;

   
    protected $table = 'stavkenarudzbine';


    protected $primaryKey = 'stavka_id';

   
    protected $fillable = [
        'kolicina',
        'proizvod_id',
        'narudzbina_id',
    ];

  
    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class, 'proizvod_id');
    }

    public function narudzbina()
    {
        return $this->belongsTo(Narudzbina::class, 'narudzbina_id');
    }
}
