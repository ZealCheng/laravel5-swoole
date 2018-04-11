<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{

    public function up()
    {
        /**
         * 跟进评论表：
         *
         * 1. 维护评论信息
         *
         * 2. 记录发起对象，被评论对象
         *
         * 3. 记录评论信息
         *
         * 4. 同步数据，断点记录
         *
         * 5. 维护同步信息，支持数据扩展
         **/
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('sponsor');
            $table->morphs('acceptor');
            $table->integer('trace_id')->index()->comment('关联的跟进');
            $table->integer('source_id')->index()->nullable()->comment('房源ID');
            $table->integer('client_id')->index()->nullable()->comment('客源ID');
            $table->text('description')->nullable()->comment('评论内容');
            $table->json('params')->nullable()->comment('评论内容');
            $table->string('status')->index()->default("已审核")->comment('评论状态');
            $table->boolean('is_done')->index()->default(0)->comment('同步数据，断点标记');
            $table->json('extra_data')->nullable()->comment('扩展信息');
            $table->timestamps();
        });
    }


    public function down()
    {

    }
}
