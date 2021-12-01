<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_tables', function (Blueprint $table) {
            $table->id();
            $table->string('TendId');
            $table->string('tend_name');
            $table->string('org_name');
            $table->string('bid_num');
            $table->string('type');
            $table->string('rel_date');
            $table->string('end_date');
            $table->string('summery');
            $table->string('Opp_Status');
            $table->unsignedBigInteger('area_work');
            $table->unsignedBigInteger('reg_by');
            $table->string('Sub_Mat_Ex_Status');
            $table->string('Tend_mang_Status');
            $table->string('Tend_Check_Status');
            $table->foreign('area_work')->references('id')->on('areaofwork')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('reg_by')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');





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
        Schema::dropIfExists('tender_tables');
    }
}
