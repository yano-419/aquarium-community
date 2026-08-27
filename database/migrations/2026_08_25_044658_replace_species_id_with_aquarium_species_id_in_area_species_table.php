<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('area_species', function (Blueprint $table) {

            $table->dropForeign(
                ['species_id']
            );

            $table->dropColumn(
                'species_id'
            );

            $table->foreignId(
                'aquarium_species_id'
            )
            ->nullable()
            ->constrained('aquarium_species')
            ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('area_species', function (Blueprint $table) {

            $table->dropForeign(
                ['aquarium_species_id']
            );

            $table->dropColumn(
                'aquarium_species_id'
            );

            $table->foreignId(
                'species_id'
            )
            ->constrained()
            ->cascadeOnDelete();

        });
    }
};