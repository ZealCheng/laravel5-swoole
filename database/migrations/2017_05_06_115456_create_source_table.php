<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceTable extends Migration
{

    public function up()
    {
        /**
         * 房源表：
         *
         * 1. 房源表，支持扩展
         *
         * 2. 优化组织架构
         *
         * 3. 同步数据，断点记录
         *
         * 4. 维护同步信息，支持数据扩展
         **/
        Schema::create('sources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->index()->nullable()->comment('城市');
            $table->integer('district_id')->index()->nullable()->comment('区域');
            $table->integer('business_id')->index()->nullable()->comment('商圈');
            $table->integer('community_id')->index()->nullable()->comment('小区');
            $table->integer('ridgepole_id')->index()->nullable()->comment('楼栋');
            $table->integer('unity_id')->index()->nullable()->comment('单元');
            $table->integer('floor_id')->index()->nullable()->comment('楼层');
            $table->integer('door_id')->index()->nullable()->comment('房间号');
            $table->json('structure')->nullable()->comment('室，厅，卫，阳');
            $table->decimal('arch_square', 16, 2)->nullable()->index()->comment('建筑面积');
            $table->decimal('used_square', 16, 2)->nullable()->index()->comment('使用面积');
            $table->string('direction')->nullable()->index()->comment('朝向');
            $table->string('category')->nullable()->index()->comment('交易类型');
            $table->decimal('high_price', 16, 2)->nullable()->index()->comment('最高价');
            $table->decimal('low_price', 16, 2)->nullable()->index()->comment('最低价');
            $table->string('pay_way')->nullable()->index()->comment('买卖支付方式');
            $table->string('status')->nullable()->index()->comment('交易类型');
            $table->decimal('high_lease_price', 16, 2)->nullable()->index()->comment('最高租价');
            $table->decimal('low_lease_price', 16, 2)->nullable()->index()->comment('最低租价');
            $table->string('pay_lease_way')->nullable()->index()->comment('租赁支付方式');
            $table->string('come_from')->nullable()->index()->comment('来源');
            $table->string('year')->nullable()->index()->comment('年代');
            $table->string('purpose')->nullable()->index()->comment('用途');
            $table->string('ownership')->nullable()->index()->comment('产权性质');
            $table->string('floor_type')->nullable()->index()->comment('楼层类型');
            $table->string('power_supply')->nullable()->index()->comment('供电');
            $table->string('water_supply')->nullable()->index()->comment('供水');
            $table->string('gas_supply')->nullable()->index()->comment('供气');
            $table->string('heating_supply')->nullable()->index()->comment('供暖');
            $table->string('elevator_num')->nullable()->index()->comment('电梯数目');
            $table->string('watch_type')->nullable()->index()->comment('看房时间');
            $table->string('decoration')->nullable()->index()->comment('装修程度');
            $table->string('level')->nullable()->index()->comment('等级');
            $table->string('arch_type')->nullable()->index()->comment('结构');
            $table->string('ownership_year')->nullable()->index()->comment('产权年限');
            $table->string('supporting')->nullable()->index()->comment('配套');
            $table->text('description')->nullable()->comment('备注');
            $table->text('description_private')->nullable()->comment('隐私备注');
            $table->string('org_id')->index()->nullable()->comment('组织结构ID');
            $table->string('org_x')->index()->nullable()->comment('组织结构信息');
            $table->integer('store_id')->index()->nullable()->comment('店');
            $table->integer('store_group_id')->index()->nullable()->comment('组');
            $table->integer('agent_id')->index()->nullable()->comment('经纪人');
            $table->string('public_level')->index()->nullable()->comment('公盘类别');
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
