<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTenderTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tender_tables', function (Blueprint $table) {
        $table->unsignedBigInteger('Inpersen_id')->nullable();
        $table->unsignedBigInteger('mail_id')->nullable();
        $table->string('email_adress_submission')->nullable();
        $table->string('Url_adress')->nullable();
        $table->foreign('Inpersen_id')->references('id')->on('PhysicalAdress')->onUpdate('CASCADE')->onDelete('CASCADE');
        $table->foreign('mail_id')->references('id')->on('mail_adresses')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tender_tables', function (Blueprint $table) {
                 $table->dropColumn('Inpersen_id');
                 $table->dropColumn('mail_id');
                 $table->dropColumn('email_adress_submission');
                 $table->dropColumn('Url_adress');
        });
    }
}
