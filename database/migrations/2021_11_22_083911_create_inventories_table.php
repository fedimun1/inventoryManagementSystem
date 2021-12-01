<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
              $table->id();
              $table->string('itemCode');
              $table->string('itemName');
              $table->string('itemQuantity');
              $table->string('itemPrice');
              $table->string('itemDescription')->nullable();
              $table->unsignedBigInteger('reg_by');   
              $table->foreign('reg_by')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');     
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
        Schema::dropIfExists('item');
         $table->dropColumn('itemCode');
         $table->dropColumn('itemName');
         $table->dropColumn('itemQuantity');
         $table->dropColumn('itemPrice');
         $table->dropColumn('itemDescription');
         $table->dropColumn('reg_by');
    }
}
