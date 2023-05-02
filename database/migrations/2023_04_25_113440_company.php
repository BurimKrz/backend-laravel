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
        Schema::create('company', function(Blueprint $table){
            $table->id('id');
            $table->string('name');
            $table->string('keywords');
            $table->string('country');
            $table->string('web_adress');
            $table->string('more_info');
            $table->string('budged');
            $table->string("type");
            $table->string("category");
            $table->string("subcategory");
            $table->string("taxpayer_office");
            //TIN - taxpayer identification number
            $table->string("TIN");
            $table->unsignedBigInteger('activity_area_id');
            // $table->foreign('category_id')->references('id')->on('company_category');
            // $table->foreign('subcategory_id')->references('id')->on('company_subcategory');
            $table->foreign('activity_area_id')->references('id')->on('activity_area');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop($tableNames['company']);
    }
};
