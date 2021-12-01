<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PhysicalAdress', function (Blueprint $table) {
            $table->id();
             $table->string('country')->nullable();
              $table->string('Region')->nullable();
              $table->string('Zone')->nullable();
              $table->string('woreda')->nullable();
              $table->string('Kebele')->nullable();
              $table->string('StretNumber')->nullable();
              $table->string('BuildingNmae')->nullable();
              $table->string('OfficeNo')->nullable();
              $table->string('Floor')->nullable();
              $table->string('landMark')->nullable();
              $table->string('AreaName')->nullable();
              $table->string('ZipCode')->nullable();
              $table->string('PoBox')->nullable();

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
        Schema::dropIfExists('PhysicalAdress');
    }
}
