<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aquarium_species', function (Blueprint $table) {

            $table->dropForeign(
                ['species_id']
            );

        });

        Schema::table('aquarium_species', function (Blueprint $table) {

            $table->foreign('species_id')
                ->references('id')
                ->on('species')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('aquarium_species', function (Blueprint $table) {

            $table->dropForeign(
                ['species_id']
            );

        });

        Schema::table('aquarium_species', function (Blueprint $table) {

            $table->foreign('species_id')
                ->references('id')
                ->on('species')
                ->cascadeOnDelete();

        });
    }
};