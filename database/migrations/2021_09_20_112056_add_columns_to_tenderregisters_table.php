<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTenderregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenderregisters', function (Blueprint $table) {
              $table->string('Opp_Status');
              $table->integer('area_work');
              $table->string('action_taken');
              $table->string('elig');
              $table->integer('portfolio');
               $table->integer('dep_assign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenderregisters', function (Blueprint $table) {
              $table->dropColumn('Opp_Status');
              $table->dropColumn('area_work');
              $table->dropColumn('action_taken');
              $table->dropColumn('elig');
              $table->dropColumn('portfolio');
               $table->dropColumn('dep_assign');
          
        });
    }
}
