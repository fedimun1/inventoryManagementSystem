<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
              $table->string('itemCode');
              $table->string('itemName');
              $table->string('itemQuantity');
              $table->string('itemBuyPrice');
              $table->string('itemSellPrice');
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
        Schema::dropIfExists('items');
          $table->dropColumn('itemCode');
          $table->dropColumn('itemName');
          $table->dropColumn('itemQuantity');
          $table->string('itemBuyPrice');
          $table->string('itemSellPrice');
          $table->dropColumn('itemDescription');
          $table->dropColumn('reg_by');
    }
}
