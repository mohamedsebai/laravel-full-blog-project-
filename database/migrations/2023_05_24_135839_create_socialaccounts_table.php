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
        Schema::create('socialaccounts', function (Blueprint $table) {
            $table->id();
            $table->enum('account', ['facebook', 'youtube', 'github', 'linkedin', 'instagram', 'twitter']);
            $table->string('link');
            $table->integer('followers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socialaccounts');
    }
};
