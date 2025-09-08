<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProizvodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Proizvod')->insert([
            [
                'naziv' => 'Set tanjira 6 kom',
                'cena' => 3500.00,
                'slika' => 'tanjiri.jpg',
                'grupa_id' => 1,
            ],
            [
                'naziv' => 'Čaše za vino 4 kom',
                'cena' => 2200.00,
                'slika' => 'case.jpg',
                'grupa_id' => 2,
            ],
            [
                'naziv' => 'Stočna lampa',
                'cena' => 4800.00,
                'slika' => 'lampa.jpg',
                'grupa_id' => 3,
            ],
            [
                'naziv' => 'LED plafonjerka',
                'cena' => 5500.00,
                'slika' => 'plafonjerka.jpg',
                'grupa_id' => 6,
            ],
            [
                'naziv' => 'Laptop Lenovo',
                'cena' => 75000.00,
                'slika' => 'laptop.jpg',
                'grupa_id' => 4,
            ],
            [
                'naziv' => 'Bluetooth zvučnik',
                'cena' => 8500.00,
                'slika' => 'zvucnik.jpg',
                'grupa_id' => 4,
            ],
            [
                'naziv' => 'Frižider Beko',
                'cena' => 62000.00,
                'slika' => 'frizider.jpg',
                'grupa_id' => 5,
            ],
            [
                'naziv' => 'Veš mašina Samsung',
                'cena' => 58000.00,
                'slika' => 'vesmasina.jpg',
                'grupa_id' => 5,
            ],
            [
                'naziv' => 'Stona lampa moderna',
                'cena' => 3100.00,
                'slika' => 'stonalampa.jpg',
                'grupa_id' => 3,
            ],
            [
                'naziv' => 'Televizor LG 50"',
                'cena' => 95000.00,
                'slika' => 'tv.jpg',
                'grupa_id' => 3,
            ],
        ]);
    }
}
