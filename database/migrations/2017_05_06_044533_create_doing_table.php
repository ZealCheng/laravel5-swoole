<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoingTable extends Migration
{

    public function up()
    {
        /**
         * 积分表：
         *
         * 1. 维护积分信息
         *
         * 2. 调整组织架构
         *
         * 3. 同步数据，断点记录
         *
         * 4. 维护同步信息，支持数据扩展
         **/
        Schema::create('doings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setting_id')->index()->comment('类型');
            $table->string('category')->index()->comment('类别');
            $table->string('key')->index()->comment('类型');
            $table->smallInteger('scores')->index()->comment('得分');
            $table->timestamp('scored_at')->index()->comment('得分时间');
            $table->text('scores_message')->nullable()->comment('得分信息');
            $table->morphs('doingable');
            $table->integer('source_id')->index()->nullable()->comment('房源ID');
            $table->integer('client_id')->index()->nullable()->comment('客源ID');
            $table->text('description')->nullable()->comment('得分详情');
            $table->string('org_id')->index()->nullable()->comment('组织结构ID');
            $table->string('org_x')->index()->nullable()->comment('组织结构信息');
            $table->integer('store_id')->index()->nullable()->comment('店');
            $table->integer('store_group_id')->index()->nullable()->comment('组');
            $table->integer('agent_id')->index()->nullable()->comment('经纪人');
            $table->string('uni')->index()->default(0)->comment('唯一标示');
            $table->boolean('is_done')->index()->default(0)->comment('同步数据，断点标记');
            $table->json('extra_data')->nullable()->comment('扩展信息');
            $table->timestamps();
        });
    }

    public function down()
    {

    }
}
