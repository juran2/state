<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->increments('id');       
            $table->string('program');
            $table->string('game');
            $table->string('name');
            $table->text('process');
            $table->text('description');
            $table->text('picurl');
            $table->string('createby');
            $table->string('sendby');
            $table->text('doby');
            $table->string('starttime');
            $table->string('endtime');
            $table->integer('status');
            $table->text('records');      
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
        Schema::dropIfExists('needs');
    }
}
