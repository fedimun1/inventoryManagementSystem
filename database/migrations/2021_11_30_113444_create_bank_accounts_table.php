<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankAccount', function (Blueprint $table) {
            $table->id();
            $table->string('AcHolder');
            $table->string('AccNumber');
            $table->unsignedBigInteger('bankID');   
            $table->foreign('bankID')->references('id')->on('banks')->onUpdate('CASCADE')->onDelete('CASCADE'); 
            
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
        Schema::dropIfExists('bankAccount');
          $table->dropColumn('AcHolder');
          $table->dropColumn('AccNumber');
          $table->dropColumn('bankID');
    }
}
