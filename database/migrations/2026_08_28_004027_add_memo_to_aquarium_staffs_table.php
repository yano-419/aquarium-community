<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::table('aquarium_staffs', function ($table) {

        $table->text('memo')
            ->nullable()
            ->after('user_id');

    });
    }

public function down(): void
    {
    Schema::table('aquarium_staffs', function ($table) {

        $table->dropColumn('memo');

    });
    }

};
