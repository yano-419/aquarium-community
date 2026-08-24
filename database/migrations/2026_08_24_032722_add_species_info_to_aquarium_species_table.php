<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(
            'aquarium_species',
            function (Blueprint $table) {

                $table->string('name')
                    ->after('species_id');

                $table->string('scientific_name')
                    ->nullable()
                    ->after('name');

                $table->string('classification')
                    ->nullable()
                    ->after('scientific_name');

                $table->string('order_name')
                    ->nullable()
                    ->after('classification');

                $table->string('family_name')
                    ->nullable()
                    ->after('order_name');

                $table->text('dictionary_description')
                    ->nullable()
                    ->after('family_name');
            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'aquarium_species',
            function (Blueprint $table) {

                $table->dropColumn([
                    'name',
                    'scientific_name',
                    'classification',
                    'order_name',
                    'family_name',
                    'dictionary_description',
                ]);

            }
        );
    }
};