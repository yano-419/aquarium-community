<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('species', function (Blueprint $table) {

            $table->string('scientific_name')->nullable();

            $table->string('order_name')->nullable();

            $table->string('family_name')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('species', function (Blueprint $table) {

            $table->dropColumn([
                'scientific_name',
                'order_name',
                'family_name'
            ]);

        });
    }
};