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
        Schema::table('narudzbinas', function (Blueprint $table) {
            $table
                ->foreign('kupac_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('zaposleni_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('narudzbinas', function (Blueprint $table) {
            $table->dropForeign(['kupac_id']);
            $table->dropForeign(['zaposleni_id']);
        });
    }
};
