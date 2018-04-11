<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceScoreTable extends Migration
{

    public function up()
    {
        /**
         * 房源得分表：
         *
         * 1. 维护房源得分信息
         *
         * 2. 同步数据，断点记录
         *
         * 3. 维护同步信息，支持数据扩展
         **/
        Schema::create('source_scores', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('source_id')->index()->comment('客源ID');
            $table->smallInteger('value')->nullable()->comment('');
            $table->json('data')->nullable()->comment('得分详情');

            $table->boolean('is_done')->index()->default(0)->comment('同步数据，断点标记');
            $table->json('extra_data')->nullable()->comment('扩展信息');

            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
