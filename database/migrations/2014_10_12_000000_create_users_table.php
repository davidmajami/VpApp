<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('ime');
            $table->string('prezime')->unique();
            $table->string('username');
            $table->string('password');
            $table->enum('uloga', ['admin', 'zaposleni', 'kupac'])->default('kupac');
            $table->string('telefon');
            $table->string('email');
            $table->string('adresa');
            $table->string('jmbg');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
