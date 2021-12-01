<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBIDColumnToTenderregisters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenderregisters', function (Blueprint $table) {
           $table->string('BID')->after('end_date');  
           $table->string('TOR')->after('BID');
          $table->string('Evaluation')->after('TOR');
           $table->string('Eligiblity')->after('Evaluation');
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
            $table->dropColumn('BID');
            $table->dropColumn('TOR');
            $table->dropColumn('Evaluation');
            $table->dropColumn('Eligiblity');
        });
    }
}
