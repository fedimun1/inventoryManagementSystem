<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoughtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bought', function (Blueprint $table) {
            $table->id();
               $table->string('BoughtType');
              $table->string('cashAmount');
              $table->string('checkType');
              $table->string('LenderNme');
            $table->unsignedBigInteger('ItemId');   
            $table->foreign('ItemId')->references('id')->on('items')->onUpdate('CASCADE')->onDelete('CASCADE');   
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
        Schema::dropIfExists('bought');
          $table->dropColumn('BoughtType');
          $table->dropColumn('cashAmount');
          $table->dropColumn('checkType');
          $table->string('LenderNme');
          $table->string('ItemId');
            
    }
}
