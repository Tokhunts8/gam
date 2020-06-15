<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundations', function (Blueprint $table) {
            $table->id();
            $table->string('asset');
            $table->string('ola');
            $table->string('areas');
            $table->string('ols');
            $table->string('currency');
            $table->string('oly');
            $table->string('maturity');
            $table->string('olm');
            $table->string('country');
            $table->string('olc');
            $table->longText('lastText');
            $table->longText('ollt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foundations');
    }
}
