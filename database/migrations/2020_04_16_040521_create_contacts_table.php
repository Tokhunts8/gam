<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('blogs')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('description');
            $table->longText('old')->nullable();
            $table->longText('address');
            $table->longText('ola')->nullable();
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('website')->nullable();
            $table->boolean('mine');
            $table->integer('order');
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
        Schema::dropIfExists('contacts');
    }
}
