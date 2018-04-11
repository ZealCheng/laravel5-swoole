<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{

    public function up()
    {
        /**
         * 房客源联系人
         *
         * 1. 房客源联系人，支持扩展
         *
         * 2. 优化组织架构
         *
         * 3. 同步数据，断点记录
         *
         * 4. 维护同步信息，支持数据扩展
         **/
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 32)->index()->nullable()->comment('姓名');
            $table->string('password');
            $table->string('id_card', 64)->index()->nullable()->comment('身份证');
            $table->string('sex', 16)->nullable()->comment('性别');
            $table->string('relation', 32)->nullable()->comment('关系');
            $table->string('mobile', 64)->nullable()->index()->comment('手机');
            $table->string('wechat', 128)->nullable()->comment('微信号');
            $table->boolean('is_open')->nullable()->default(0)->comment('默认关闭');
            $table->text('id_card_picture')->nullable()->comment('身份证证件');
            $table->string('status', 45)->index()->nullable()->comment('是否认证');
            $table->boolean('is_done')->index()->default(0)->comment('同步数据，断点标记');
            $table->json('extra_data')->nullable()->comment('扩展信息');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
