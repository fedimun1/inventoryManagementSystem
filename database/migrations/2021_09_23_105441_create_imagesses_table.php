<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagesses', function (Blueprint $table) {
             $table->id();
            $table->string('BID');
            $table->string('TOR');
             $table->string('Evaluation');
             $table->string('Eligiblity');
             $table->string('GuidLine');
            $table->string('Others');
            $table->string('filePath');
            $table->unsignedBigInteger('tend_id');
            $table->foreign('tend_id')->references('id')->on('tender_tables')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('imagesses');
    }
}
