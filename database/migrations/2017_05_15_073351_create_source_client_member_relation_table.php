<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceClientMemberRelationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('source_id')->index()->nullable()->comment('关联房源');
            $table->unsignedInteger('client_id')->index()->nullable()->comment('关联客源');
            $table->unsignedInteger('member_id')->index()->nullable()->comment('关联人员');
            $table->string('relation')->comment('关系');
            $table->string('mobile')->index()->comment('电话');
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
