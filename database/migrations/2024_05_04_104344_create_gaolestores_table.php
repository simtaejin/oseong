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
        Schema::create('gaolestores', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',100)->default('')->comment('지점이름');
            $table->string('addr',150)->default('')->comment('지점주소');
            $table->string('units',20)->default('')->comment('지점운영댓수');
            $table->string('xlang',50)->default('')->comment('x 좌표');
            $table->string('ylang',50)->default('')->comment('y 좌표');
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
        Schema::dropIfExists('gaolestores');
    }
};
