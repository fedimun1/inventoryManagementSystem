<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderRequirnmentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_requirnment_list', function (Blueprint $table) {
            $table->id();
              $table->unsignedBigInteger('ted_id');
            $table->unsignedBigInteger('req_id');
             $table->foreign('ted_id')->references('id')->on('tender_tables')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('req_id')->references('id')->on('requirnment')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('tender_requirnment_list');
    }
}
