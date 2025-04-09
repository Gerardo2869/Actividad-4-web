<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('superheroes', function (Blueprint $table) {
            $table->renameColumn('type_id', 'superhero_type_id');
        });
    }

    public function down(): void
    {
        Schema::table('superheroes', function (Blueprint $table) {
            $table->renameColumn('superhero_type_id', 'type_id');
        });
    }
};
