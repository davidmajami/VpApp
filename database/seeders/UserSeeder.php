<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin korisnik
        DB::table('users')->insert([
            'ime' => 'Petar',
            'prezime' => 'Petrović',
            'username' => 'ppetrovic',
            'password' => Hash::make('petar123'), // HASH obavezno
            'uloga' => 'admin', // mora biti admin, zaposleni ili kupac
            'telefon' => '0611234567',
            'email' => 'petar@example.com',
            'adresa' => 'Beogradska 12, Beograd',
            'jmbg' => '0101990123456',
        ]);

        // Kupac
        DB::table('users')->insert([
            'ime' => 'Ana',
            'prezime' => 'Anić',
            'username' => 'aanic',
            'password' => Hash::make('ana123'),
            'uloga' => 'kupac',
            'telefon' => '0629876543',
            'email' => 'ana@example.com',
            'adresa' => 'Novosadska 45, Novi Sad',
            'jmbg' => '0202990456789',
        ]);

        // Zaposleni
        DB::table('users')->insert([
            'ime' => 'Marko',
            'prezime' => 'Marković',
            'username' => 'mmarkovic',
            'password' => Hash::make('marko123'),
            'uloga' => 'zaposleni',
            'telefon' => '0634567890',
            'email' => 'marko@example.com',
            'adresa' => 'Niška 33, Niš',
            'jmbg' => '0303990789123',
        ]);
    }
}
