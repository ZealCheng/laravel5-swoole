<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraceTable extends Migration
{

    public function up()
    {
        /**
         * 跟进表：
         *
         * 1. 维护跟进基本信息
         *
         * 2. 保留审核人，反审核人
         *
         * 3. 移除评论信息
         *
         * 4. 维护房源，客源编号信息
         *
         * 5. 维护同步信息，支持数据扩展
         **/
        Schema::create('traces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 32)->index()->comment('跟进类型');
            $table->string('uuid', 128)->index()->nullable()->comment('跟进编号');
            $table->boolean('is_virtual_source')->defaul(0)->comment('是否是系统房源');
            $table->string('org_id')->index()->nullable()->comment('组织结构ID');
            $table->string('org_x')->index()->nullable()->comment('组织结构信息');
            $table->integer('store_id')->index()->nullable()->comment('店');
            $table->integer('store_group_id')->index()->nullable()->comment('组');
            $table->integer('agent_id')->index()->nullable()->comment('经纪人');
            $table->string('call_sid')->index()->nullable()->comment('通话SessionID');
            $table->string('source_uuid')->index()->nullable()->comment('房源编号');
            $table->integer('source_id')->index()->nullable()->comment('房源ID');
            $table->string('client_uuid')->index()->nullable()->comment('客源编号');
            $table->integer('client_id')->index()->nullable()->comment('客源ID');
            $table->string('sponsor')->index()->nullable()->comment('发起方(客源，房源)');
            $table->string('org_sponsor_type')->index()->nullable()->comment('发起方的买卖类型');
            $table->timestamp('finished_at')->index()->nullable()->comment('完成时间');
            $table->text('description')->nullable()->comment('跟进内容');
            $table->integer('approver_id')->index()->nullable()->comment('审核人');
            $table->timestamp('approved_at')->index()->nullable()->comment('审核时间');
            $table->text('approver_summary')->nullable()->comment('审核人备注');
            $table->integer('raider_id')->index()->nullable()->comment('反审核人');
            $table->timestamp('raided_at')->index()->nullable()->comment('反审核时间');
            $table->text('raider_summary')->nullable()->comment('反审核人备注');
            $table->string('status')->index()->default("未审核")->comment('跟进状态');
            $table->boolean('is_done')->index()->default(0)->comment('同步数据，断点标记');
            $table->boolean('is_show')->index()->default(0)->comment('是否可见');
            $table->json('extra_data')->nullable()->comment('扩展字段');
            $table->timestamps();
        });
    }

    public function down()
    {

    }
}
