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
        Schema::create('units', function (Blueprint $table) {
            $table->id(); // The ID of the unit
            $table->string('title'); // The title of the unit
            $table->text('description')->nullable(); // The description of the unit
            $table->string('slug'); // The slug of the unit, for the URL
            $table->boolean('active'); // Whether the unit is active or not
            $table->integer('sort_order'); // The order in which the units will be displayed in
            $table->timestamps(); // The created at and updated at timestamps of the unit
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
