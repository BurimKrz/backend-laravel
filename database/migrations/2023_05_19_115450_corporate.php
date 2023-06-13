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
        Schema::create('corporate', function (Blueprint $table) {
            $table->id();
            $table->string('short_history', 500);
            $table->string('mission');
            $table->string('vision');
            $table->string('responsibility');
            $table->string('export_stories');
            $table->string('human_resources');
            $table->string('bank_accounts');
            $table->string('our_bands');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporate');
    }
};