<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
        Schema::create('DetailOrder', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->string('unitPrice');
            $table->string('amount');
            $table->string('discount');
            $table->unsignedBigInteger('itemID');   
            $table->foreign('itemID')->references('id')->on('items')->onUpdate('CASCADE')->onDelete('CASCADE'); 
             $table->unsignedBigInteger('tranID');   
            $table->foreign('tranID')->references('id')->on('totalTrans')->onUpdate('CASCADE')->onDelete('CASCADE'); 
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
        Schema::dropIfExists('DetailOrder');
         $table->dropColumn('quantity');
         $table->dropColumn('unitPrice');
         $table->dropColumn('amount');
          $table->dropColumn('discount');
           $table->dropColumn('itemID');
            $table->dropColumn('tranID');
    }
}
