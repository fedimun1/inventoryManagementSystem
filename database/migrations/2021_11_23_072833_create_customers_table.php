<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
              $table->id();
               $table->string('custName');
               $table->string('custPhone');
               $table->string('TinNumber');
              $table->unsignedBigInteger('TranID');   
              $table->foreign('TranID')->references('id')->on('transaction')->onUpdate('CASCADE')->onDelete('CASCADE');  $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
          $table->dropColumn('custName');
          $table->dropColumn('custPhone');
          $table->dropColumn('TinNumber');
          $table->dropColumn('TranID');
      
    }
}
