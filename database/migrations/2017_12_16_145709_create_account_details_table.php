<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountDetailsTable extends Migration
{
 
    public function up()
    {
        Schema::create('account_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('currency_id')->unsigned();
            $table->text('account_address')->nullable();
            $table->string('balance')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('currency_id')
            ->references('id')
            ->on('currencies')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('account_details');
    }
}
