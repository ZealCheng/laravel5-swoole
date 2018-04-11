<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoingLogTable extends Migration
{

    public function up()
    {
        /**
         * 积分日志表：
         *
         * 1. 维护积分日志信息
         *
         * 2. 优化组织架构
         *
         * 3. 同步数据，断点记录
         *
         * 4. 维护同步信息，支持数据扩展
         **/
        Schema::create('doing_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->index()->comment('类别');
            $table->smallInteger('scores')->index()->comment('得分');
            $table->timestamp('scored_at')->index()->comment('得分时间');
            $table->json('data')->nullable()->comment('得分日志');
            $table->string('org_id')->index()->nullable()->comment('组织结构ID');
            $table->string('org_x')->index()->nullable()->comment('组织结构信息');
            $table->integer('store_id')->index()->nullable()->comment('店');
            $table->integer('store_group_id')->index()->nullable()->comment('组');
            $table->integer('agent_id')->index()->nullable()->comment('经纪人');
            $table->boolean('is_done')->index()->default(0)->comment('同步数据，断点标记');
            $table->json('extra_data')->nullable()->comment('扩展信息');
            $table->timestamps();
        });
    }

    public function down()
    {

    }
}
