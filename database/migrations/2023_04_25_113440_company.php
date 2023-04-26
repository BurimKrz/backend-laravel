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
            $table->unsignedBigInteger("type_id");
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("subcategory_id");
            $table->unsignedBigInteger("taxpayer_office_id");
            //TIN - taxpayer identification number
            $table->unsignedBigInteger("TIN_id");
            $table->unsignedBigInteger('activity_area_id');
            $table->foreign('type_id')->references('id')->on('company_type');
            $table->foreign('category_id')->references('id')->on('company_category');
            $table->foreign('subcategory_id')->references('id')->on('company_subcategory');
            $table->foreign('taxpayer_office_id')->references('id')->on('taxpayer_office');
            $table->foreign('TIN_id')->references('id')->on('TIN');
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
