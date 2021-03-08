<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('版本名称');
            $table->unsignedInteger('version')->comment('版本号');
            $table->unsignedInteger('type')->comment('1：强制更新 2:询问更新');
            $table->string('content', 500)->comment('更新内容');
            $table->string('update_link')->comment('更新地址');
            $table->string('download_link')->comment('下载地址');
            $table->timestamp('published_at')->comment('发布时间');
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
        Schema::dropIfExists('versions');
    }
}
