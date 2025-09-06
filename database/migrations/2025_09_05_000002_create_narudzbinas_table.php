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
        Schema::create('narudzbinas', function (Blueprint $table) {
            $table->bigIncrements('narudzbina_id');
            $table->dateTime('datum_narudzbine');
            $table->string('nacin_placanja');
            $table->integer('ukupna_cena');
            $table->unsignedBigInteger('kupac_id');
            $table->unsignedBigInteger('zaposleni_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('narudzbinas');
    }
};
