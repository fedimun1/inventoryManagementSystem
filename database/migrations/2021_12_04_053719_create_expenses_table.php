<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense', function (Blueprint $table) {
            $table->id();
            $table->string('lbourName');
            $table->string('paymentReason');
            $table->string('paymentType');
            $table->string('expenseAmount');
            $table->datetime('paidDate');
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
        Schema::dropIfExists('expense');
        $table->dropColumn('lbourName');
        $table->dropColumn('paymentReason');
        $table->dropColumn('paymentType');
        $table->dropColumn('expenseAmount');
        $table->dropColumn('paidDate');

    }
}
