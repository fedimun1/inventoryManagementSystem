<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDocColumFromTenderregisters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenderregisters', function (Blueprint $table) {
            $table->dropColumn('doc');
            //
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
            $table->string('doc')->after('id');
        });
    }
}
