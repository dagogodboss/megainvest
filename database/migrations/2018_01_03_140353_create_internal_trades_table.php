<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalTradesTable extends Migration
{

    public function up()
    {
        Schema::create('internal_trades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('price')->nullable();
            $table->string('type')->nullable();
            $table->string('quantity')->nullable();
            $table->integer('account_details_id')->unsigned();
            $table->integer('crypto_wallet_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('account_details_id')
            ->references('id')
            ->on('account_details')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreign('crypto_wallet_id')
            ->references('id')
            ->on('crypto_wallets')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('internal_trades');
    }
}
