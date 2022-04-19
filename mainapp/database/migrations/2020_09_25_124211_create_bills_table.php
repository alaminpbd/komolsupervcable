<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('connection_id');
            $table->string('connection_name');
            $table->integer('zone_id')->nullable();
            $table->string('zone_name')->nullable();
            $table->integer('subzone_id')->nullable();
            $table->string('subzone_name')->nullable();
            $table->string('connection_type')->nullable();
            $table->string('status')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('bill_type')->nullable();
            $table->integer('amount')->nullable();
            $table->string('collection_date')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('January')->nullable();
            $table->string('February')->nullable();
            $table->string('March')->nullable();
            $table->string('April')->nullable();
            $table->string('May')->nullable();
            $table->string('June')->nullable();
            $table->string('July')->nullable();
            $table->string('August')->nullable();
            $table->string('September')->nullable();
            $table->string('October')->nullable();
            $table->string('November')->nullable();
            $table->string('December')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
