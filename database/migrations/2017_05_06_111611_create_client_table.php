<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{

    public function up()
    {
        /**
         * 客源表：
         *
         * 1. 客源表，支持扩展
         *
         * 2. 优化组织架构
         *
         * 3. 同步数据，断点记录
         *
         * 4. 维护同步信息，支持数据扩展
         **/
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id')->index()->comment('人员ID');
            $table->string('uuid', 128)->index()->nullable()->comment('客源编号');
            $table->string('status')->index()->nullable()->comment('客源状态');
            $table->string('level', 8)->index()->nullable()->comment('客源等级');
            $table->string('type', 32)->index()->nullable()->comment('客源类型');
            $table->string('purpose', 64)->index()->nullable()->comment('用途');
            $table->string('come_from', 64)->index()->nullable()->comment('客源来源');
            $table->json('district_ids')->nullable()->comment('区域');
            $table->json('business_ids')->nullable()->comment('商圈');
            $table->json('community_ids')->nullable()->comment('小区');
            $table->json('direction')->nullable()->comment('朝向');
            $table->json('structure')->nullable()->comment('面积，售价，租金，室，厅，卫，房龄，楼层');
            $table->json('pay_way')->nullable()->comment('支付方式');
            $table->json('decoration_level')->nullable()->comment('装修程度');
            $table->json('supporting')->nullable()->comment('配套');
            $table->json('community_type')->nullable()->comment('物业');
            $table->json('arch_type')->nullable()->comment('建筑类型');
            $table->text('description')->nullable()->comment('备注');
            $table->text('description_private')->nullable()->comment('隐私备注');
            $table->string('org_id')->index()->nullable()->comment('组织结构ID');
            $table->string('org_x')->index()->nullable()->comment('组织结构信息');
            $table->integer('store_id')->index()->nullable()->comment('店');
            $table->integer('store_group_id')->index()->nullable()->comment('组');
            $table->integer('agent_id')->index()->nullable()->comment('经纪人');
            $table->string('public_level')->index()->nullable()->comment('公客类别');
            $table->boolean('is_done')->index()->default(0)->comment('同步数据，断点标记');
            $table->json('extra_data')->nullable()->comment('扩展信息');
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
        //
    }
}
