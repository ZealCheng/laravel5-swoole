<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientLogTable extends Migration
{

    public function up()
    {
        /**
         * 客源日志表：
         *
         * 1. 维护客源日志信息
         *
         * 2. 优化组织架构
         *
         * 3. 同步数据，断点记录
         *
         * 4. 维护同步信息，支持数据扩展
         **/
        Schema::create('client_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->index()->comment('客源ID');
            $table->string('category')->index()->comment('日志类别');

            $table->json('old_value')->nullable()->comment('旧值');
            $table->json('new_value')->nullable()->comment('新值');
            $table->string('old_value_txt')->nullable()->comment('旧值文案');
            $table->string('new_value_txt')->nullable()->comment('新值文案');

            $table->string('org_id')->index()->nullable()->comment('组织结构ID');
            $table->string('org_x')->index()->nullable()->comment('组织结构信息');
            $table->integer('store_id')->index()->nullable()->comment('店');
            $table->integer('store_group_id')->index()->nullable()->comment('组');
            $table->integer('agent_id')->index()->nullable()->comment('经纪人');
            $table->string('client_ip_adress', 45)->nullable()->comment('客户端IP地址');

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
