<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientPathTable extends Migration
{

    public function up()
    {
        /**
         * 客源轨迹表：
         *
         * 1. 维护客源日志信息
         *
         * 2. 同步数据，断点记录
         *
         * 3. 维护同步信息，支持数据扩展
         **/
        Schema::create('client_paths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->index()->comment('客源ID');
            $table->morphs('pathable');
            $table->string('description')->nullable()->comment('轨迹备注');
            $table->boolean('is_done')->index()->default(0)->comment('同步数据，断点标记');
            $table->json('extra_data')->nullable()->comment('扩展信息');

            $table->timestamps();
        });
    }

    public function down()
    {

    }
}
