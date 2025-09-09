<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_moze_da_se_kreira_sa_validnom_uloga()
    {
        $users = User::factory()->create([
            'uloga' => 'kupac', 
            'password' => bcrypt('tajna123')
        ]);

        $this->assertDatabaseHas('users', [
            'user_id' => $users->user_id,
            'uloga' => 'kupac',
        ]);

        $this->assertTrue(Hash::check('tajna123', $users->password));
    }

    /** @test */
    public function user_ima_validnu_ulogu()
    {
        $users = User::factory()->create([
            'uloga' => 'admin',
        ]);

        $validneUloge = ['admin', 'zaposleni', 'kupac'];
        $this->assertTrue(in_array($users->uloga, $validneUloge));
    }
}
