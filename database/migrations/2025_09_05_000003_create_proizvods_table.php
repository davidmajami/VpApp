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
        Schema::create('proizvods', function (Blueprint $table) {
            $table->bigIncrements('proizvod_id');
            $table->string('naziv');
            $table->decimal('cena');
            $table->string('slika');
            $table->unsignedBigInteger('grupa_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proizvods');
    }
};
