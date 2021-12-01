<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemSubCategory', function (Blueprint $table) {
            $table->id();
            $table->string('itemSubCatName');
             $table->unsignedBigInteger('itemCatID');   
              $table->foreign('itemCatID')->references('id')->on('itemCategory')->onUpdate('CASCADE')->onDelete('CASCADE'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemSubCategory');
           $table->dropColumn('itemSubCatName');
              $table->dropColumn('itemCatID');
    }
}
