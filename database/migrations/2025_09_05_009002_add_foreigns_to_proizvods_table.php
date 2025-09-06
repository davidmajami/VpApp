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
        Schema::table('proizvods', function (Blueprint $table) {
            $table
                ->foreign('grupa_id')
                ->references('grupa_id')
                ->on('grupa_proizvodas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proizvods', function (Blueprint $table) {
            $table->dropForeign(['grupa_id']);
        });
    }
};
