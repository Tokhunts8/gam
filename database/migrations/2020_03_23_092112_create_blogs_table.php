<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('blogs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('oln')->nullable();
            $table->longText('old')->nullable();
            $table->integer('order');
            $table->string('image')->nullable();
            $table->integer('section');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('blogs');
    }
}
