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
        Schema::create('export_item',function(Blueprint $table){
            $table->id('id');
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 50,2);
            $table->string('category');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::drop($tableNames['import_item']);
    }
};
