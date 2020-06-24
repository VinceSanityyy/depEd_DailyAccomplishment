<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccomplishmentReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomplishment_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->text('accomplishment_report');
            $table->string('time');
            $table->timestamps();
        });

        Schema::table('accomplishment_reports', function($table)
        {
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomplishment_plans');
    }
}
