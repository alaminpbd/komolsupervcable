<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubzonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subzones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zone_id');
            $table->string('ip')->nullable();
            $table->string('subzone_name');
            $table->string('subzone_code')->nullable();
            $table->string('connection_type')->nullable();
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
        Schema::dropIfExists('subzones');
    }
}
