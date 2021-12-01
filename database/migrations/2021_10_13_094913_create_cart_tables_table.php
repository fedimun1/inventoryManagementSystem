<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_table', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('Request_By');
             $table->unsignedBigInteger('Assign_to');
             $table->unsignedBigInteger('tend_id');
             $table->foreign('Request_By')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('Assign_to')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->foreign('tend_id')->references('id')->on('tender_tables')->onUpdate('CASCADE')->onDelete('CASCADE');
             $table->integer('status');
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
        Schema::dropIfExists('cart_table');
    }
}
