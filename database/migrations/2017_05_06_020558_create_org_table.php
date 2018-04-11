<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 方案1：
         * 组织结构表
         *
         * 查询所有子节点
         * select * from orgs o where o.path like "${o.path}${o.id}-%"
         *
         * 查询子节点
         * select * from orgs o where path like "${o.path}${o.id}-%" and level=${o.level}+1
         *
         * info是组织结构的信息集合
         *
         * 结构简单，调整频繁，操作简单
         *
         * 方案2：
         * 组织结构表
         *
         * 修改二叉树
         * Modified Preorder Tree Traversal
         *
         * 结构简单，数据复杂度高，读取速度快，调整复杂度高
         **/
        Schema::create('orgs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('组织结构名称');
            $table->integer('pid')->default(0)->comment('父ID，默认为0');
            $table->string('path')->index()->default("-")->comment('父ID路径');
            $table->integer('level')->index()->default(1)->comment('组织结构等级');
            $table->json('info')->nullable()->comment('组织结构信息');
            $table->string('status')->index()->default("禁用")->comment('状态');
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
