<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mystores', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->integer('user_id')->default('0')->comment("사용자 고유번호");
            $table->integer('gaolestore_id')->default('0')->comment("매장 고유번호");
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
        Schema::dropIfExists('mystores');
    }
};
