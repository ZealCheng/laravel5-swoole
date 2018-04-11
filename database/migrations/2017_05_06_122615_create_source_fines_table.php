<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceFinesTable extends Migration
{

    public function up()
    {
        /**
         * 房源精耕表：
         *
         * 1. 房源精耕表，支持扩展
         *
         * 2. 优化组织架构
         *
         * 3. 同步数据，断点记录
         *
         * 4. 维护同步信息，支持数据扩展
         **/
        Schema::create('source_finess', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('source_id')->index()->nullable()->comment('房源ID');
            $table->string('type')->nullable()->index()->comment('类型');
            $table->string('sub_type')->nullable()->index()->comment('子分类');
            $table->integer('city_id')->index()->nullable()->comment('城市');
            $table->integer('district_id')->index()->nullable()->comment('区域');
            $table->integer('business_id')->index()->nullable()->comment('商圈');
            $table->integer('community_id')->index()->nullable()->comment('小区');
            $table->integer('ridgepole_id')->index()->nullable()->comment('楼栋');
            $table->integer('unity_id')->index()->nullable()->comment('单元');
            $table->integer('floor_id')->index()->nullable()->comment('楼层');
            $table->integer('door_id')->nullable()->index()->comment('房间号');
            $table->integer('uni')->nullable()->index()->comment('唯一标示');
            $table->integer('valid')->nullable()->index()->comment('是否有效');
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
        //
    }
}
