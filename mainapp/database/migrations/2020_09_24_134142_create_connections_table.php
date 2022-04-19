<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zone_id')->unsigned();
            $table->string('zone_name')->nullable();
            $table->integer('subzone_id')->nullable();
            $table->string('subzone_name')->nullable();
            $table->integer('prev_zone_id')->nullable();
            $table->string('prev_zone_name')->nullable();
            $table->integer('prev_subzone_id')->nullable();
            $table->string('prev_subzone_name')->nullable();
            $table->string('connection_type')->nullable();
            $table->string('number_of_tv')->nullable();
            $table->string('number_of_mbps')->nullable();
            $table->string('user_name');
            $table->string('full_name')->nullable();
            $table->string('user_mobile_number');
            $table->string('user_email')->nullable();
            $table->string('connection_area_name')->nullable();
            $table->string('status')->nullable();
            $table->string('ip_address')->nullable();
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
        Schema::dropIfExists('connections');
    }
}
