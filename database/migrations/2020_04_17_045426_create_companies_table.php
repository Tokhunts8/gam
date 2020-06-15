<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('oln')->nullable();
            $table->string('menuAbout');
            $table->string('olma')->nullable();
            $table->string('menuFoundation');
            $table->string('olmf')->nullable();
            $table->string('news');
            $table->string('olnn')->nullable();
            $table->string('newsMore');
            $table->string('olnm')->nullable();
            $table->string('contact');
            $table->string('olc')->nullable();
            $table->string('links');
            $table->string('oll')->nullable();
            $table->string('settings');
            $table->string('ols')->nullable();
            $table->string('law');
            $table->string('ollaw')->nullable();
            $table->string('rules');
            $table->string('olr')->nullable();
            $table->longText('settingTitle');
            $table->longText('olst')->nullable();
            $table->string('work');
            $table->string('olw')->nullable();
            $table->string('education');
            $table->string('ole')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
