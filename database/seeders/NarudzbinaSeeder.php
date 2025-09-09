<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NarudzbinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        DB::table('narudzbine')->insert([
            [
                'narudzbina_id' => 1,
                'datum_narudzbine' => Carbon::now()->subDays(3),
                'nacin_placanja' => 'gotovina',
                'ukupna_cena' => 2500,
                'kupac_id' => 2,       
                'zaposleni_id' => 3,   
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'narudzbina_id' => 2,
                'datum_narudzbine' => Carbon::now()->subDays(1),
                'nacin_placanja' => 'kartica',
                'ukupna_cena' => 4800,
                'kupac_id' => 2,
                'zaposleni_id' => 3,
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ]);
    }
}
