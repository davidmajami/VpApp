<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Narudzbina;
use App\Models\Proizvod;

class NarudzbinaTest extends TestCase
{
    /** @test */
    public function ukupna_cena_se_ispravno_racuna()
    {
        $narudzbina = Narudzbina::factory()->create();

        $proizvod1 = Proizvod::factory()->make(['cena' => 200]);
        $proizvod2 = Proizvod::factory()->make(['cena' => 300]);

        $ukupno = $proizvod1->cena + $proizvod2->cena;

        $this->assertEquals(500, $ukupno);
    }
}
