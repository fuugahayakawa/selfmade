<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoukokuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houkoku', function (Blueprint $table) {
            $table->bigIncrements('id');
            //報告されたユーザーのID
            $table->integer('user_id');
            //報告したユーザーのID
            $table->integer('report_id');
            $table->string('houkokunaiyou','500');
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
        Schema::dropIfExists('houkoku');
    }
}
