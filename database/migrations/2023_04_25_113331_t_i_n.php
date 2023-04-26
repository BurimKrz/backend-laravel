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
        //TIN - taxpayer identification number
        Schema::create('TIN', function (Blueprint $table){
            $table->id('id');
            $table->date('registration_date');
            $table->unsignedBigInteger("taxpayer_office_id");
            $table->foreign('taxpayer_office_id')
                ->references('id')
                ->on('taxpayer_office');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop($tableNames['TIN']);
    }
};
