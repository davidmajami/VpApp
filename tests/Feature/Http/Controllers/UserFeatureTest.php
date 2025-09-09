<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_moze_da_se_kreira_direktno()
    {
        $user = User::factory()->create([
            'ime' => 'Marko',
            'prezime' => 'Markovic',
            'username' => 'marko123',
            'email' => 'marko@example.com',
            'telefon' => '0601234567',
            'adresa' => 'Ulica 1',
            'jmbg' => '1234567890123',
            'uloga' => 'kupac',
            'password' => bcrypt('tajna123'),
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'marko@example.com',
            'uloga' => 'kupac',
        ]);

        $this->assertTrue(Hash::check('tajna123', $user->password));
    }

    /** @test */
    public function user_moze_da_se_prijavi_koristeci_actingAs()
    {
        $user = User::factory()->create([
            'email' => 'marko@example.com',
            'password' => bcrypt('tajna123'),
            'uloga' => 'kupac',
        ]);

        
        $this->actingAs($user, 'web');

        $this->assertAuthenticatedAs($user, 'web');
    }

            /** @test */
        public function samo_admin_moze_da_pristupi_testne_admin_stranice()
        {
            
            $this->app['router']->get('/test-admin', function () {
                return 'Admin page';
            })->middleware('auth', 'can:access-admin');

            
            Gate::define('access-admin', function ($user) {
                return $user->uloga === 'admin';
            });

            $admin = User::factory()->create(['uloga' => 'admin']);
            $kupac = User::factory()->create(['uloga' => 'kupac']);

            
            $this->actingAs($admin)->get('/test-admin')->assertStatus(200);

           
            $this->actingAs($kupac)->get('/test-admin')->assertStatus(403);
        }
}
