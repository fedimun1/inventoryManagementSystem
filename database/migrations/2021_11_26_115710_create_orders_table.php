<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
        Schema::create('totalTrans', function (Blueprint $table) {
             $table->id();
             $table->string('refNumber');
            $table->string('paidAmount');
            $table->string('PaymentMethod');
            $table->string('doneBy');
            $table->string('Totaldiscount');
            $table->string('vatAmount');
             $table->string('transDate');
            $table->unsignedBigInteger('custId');   
            $table->foreign('custId')->references('id')->on('customer')->onUpdate('CASCADE')->onDelete('CASCADE'); 
            
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
        Schema::dropIfExists('totalTrans');
        $table->dropColumn('refNumber');
         $table->dropColumn('paidAmount');
         $table->dropColumn('PaymentMethod');
          $table->dropColumn('doneBy');
           $table->dropColumn('Totaldiscount');
            $table->dropColumn('vatAmount');
             $table->dropColumn('transDate');
    }
}
