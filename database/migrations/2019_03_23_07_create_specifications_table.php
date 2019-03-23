<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedInteger('manufacturer_id');
            $table->foreign('manufacturer_id')->references('id')->on('manufactures');
            $table->float('weight', 8, 2);
            $table->string('sim_type');
            $table->string('display_type');
            $table->string('display_size');
            $table->string('display_resolution');
            $table->string('os');
            $table->string('chipset');
            $table->string('gpu');
            $table->string('microsd');
            $table->integer('ram');
            $table->integer('rom');
            $table->string('front_camera');
            $table->string('back_camera');
            $table->string('video');
            $table->string('wlan');
            $table->string('bluetooth');
            $table->string('gps');
            $table->string('usb');
            $table->string('sensors');
            $table->integer('battery');
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
        Schema::dropIfExists('specifications');
    }
}
