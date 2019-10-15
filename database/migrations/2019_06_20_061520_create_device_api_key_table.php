<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceApiKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_api_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id')->nullable()->unsigned();
            $table->string('public_key');
            $table->timestamps();

            $table->foreign('device_id')
                ->references('id')
                ->on('devices');
            $table->index('device_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_api_keys');
    }
}
