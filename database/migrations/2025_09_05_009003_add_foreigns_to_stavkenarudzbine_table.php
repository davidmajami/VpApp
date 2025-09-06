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
        Schema::table('stavkenarudzbine', function (Blueprint $table) {
            $table
                ->foreign('proizvod_id')
                ->references('proizvod_id')
                ->on('proizvods')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('narudzbina_id')
                ->references('narudzbina_id')
                ->on('narudzbinas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stavkenarudzbine', function (Blueprint $table) {
            $table->dropForeign(['proizvod_id']);
            $table->dropForeign(['narudzbina_id']);
        });
    }
};
