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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Standard Laravel Field - The ID of the failed job
            $table->string('uuid')->unique(); // Standard Laravel Field - The UUID of the failed job
            $table->text('connection'); // Standard Laravel Field - The connection of the failed job
            $table->text('queue'); // Standard Laravel Field - The queue of the failed job
            $table->longText('payload'); // Standard Laravel Field - The payload of the failed job
            $table->longText('exception'); // Standard Laravel Field - The exception of the failed job
            $table->timestamp('failed_at')->useCurrent(); // Standard Laravel Field - The date the job failed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
