<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientScoreTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 客源得分表：
         *
         * 1. 维护客源得分信息
         *
         * 2. 同步数据，断点记录
         *
         * 3. 维护同步信息，支持数据扩展
         **/
        Schema::create('client_scores', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->index()->comment('客源ID');
            $table->smallInteger('value')->nullable()->comment('');
            $table->json('data')->nullable()->comment('得分详情');

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
