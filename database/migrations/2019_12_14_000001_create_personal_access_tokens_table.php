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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Standard Laravel Field - The ID of the personal access token
            $table->morphs('tokenable'); // Standard Laravel Field - The tokenable of the personal access token
            $table->string('name'); // Standard Laravel Field - The name of the personal access token
            $table->string('token', 64)->unique(); // Standard Laravel Field - The token of the personal access token
            $table->text('abilities')->nullable(); // Standard Laravel Field - The abilities of the personal access token
            $table->timestamp('last_used_at')->nullable(); // Standard Laravel Field - The date the token was last used
            $table->timestamp('expires_at')->nullable(); // Standard Laravel Field - The date the token expires
            $table->timestamps(); // Standard Laravel Field - The timestamps of the personal access token
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
