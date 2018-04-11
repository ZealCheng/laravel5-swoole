<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcePicTable extends Migration
{

    public function up()
    {
        /**
         * 房源图片表：
         *
         * 1. 维护房源图片信息
         *
         * 2. 优化组织架构
         *
         * 3. 同步数据，断点记录
         *
         * 4. 维护同步信息，支持数据扩展
         **/
        Schema::create('source_pics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id')->index()->comment('经纪人ID');
            $table->integer('source_id')->index()->comment('房源ID');
            $table->integer('trace_id')->index()->nullable()->comment('关联跟进');
            $table->string('title')->nullable()->comment('图片名称');
            $table->text('summary')->nullable()->comment('图片描述');
            $table->boolean('is_cover')->index()->default(0)->comment('是不是封面');

            $table->double('leng')->nullable()->comment('长');
            $table->double('width')->nullable()->comment('宽');
            $table->double('height')->nullable()->comment('高');
            $table->string('key')->nullable()->comment('七牛ID');
            $table->string('url')->nullable()->comment('七牛地址');

            $table->string('status', 45)->index()->nullable()->comment('图片审核状态');

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
