<?php

namespace Database\Seeders;

use App\Models\GrupaProizvoda;
use Illuminate\Database\Seeder;

class GrupaProizvodaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GrupaProizvoda::insert([
            [
                'grupa_id' => 1,
                'naziv_grupe' => 'Tanjiri',
                'popust' => 0,
            ],
            [
                'grupa_id' => 2,
                'naziv_grupe' => 'Čaše',
                'popust' => 0,
            ],
            [
                'grupa_id' => 3,
                'naziv_grupe' => 'Lampe',
                'popust' => 0,
            ],
            [
                'grupa_id' => 4,
                'naziv_grupe' => 'Elektronika',
                'popust' => 0,
            ],
            [
                'grupa_id' => 5,
                'naziv_grupe' => 'Bela tehnika',
                'popust' => 0,
            ],
            [
                'grupa_id' => 6,
                'naziv_grupe' => 'Rasveta',
                'popust' => 0,
            ],
        ]);
    }
}
