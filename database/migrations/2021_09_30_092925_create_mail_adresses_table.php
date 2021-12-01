<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_adresses', function (Blueprint $table) {
            $table->id();
              $table->string('FirstName')->nullable();
              $table->string('LastName')->nullable();
              $table->string('BuisnessName')->nullable();
              $table->string('StressAdress')->nullable();
              $table->string('City')->nullable();
              $table->string('ZipCode')->nullable();
              $table->string('Country')->nullable();
              $table->string('Pobox')->nullable();
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
        Schema::dropIfExists('mail_adresses');
    }
}
