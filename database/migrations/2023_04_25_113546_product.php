<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function(Blueprint $table){
            $table->id('id');
            $table->string('name');
            $table->string('description');
            $table->decimal('price', 50,2);
            $table->string('imageURL');
            $table->integer('views');
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("company_id");
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->foreign('company_id')->references('id')->on('company');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
