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
        Schema::create('gaoledisks', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('tan', 50)->default('')->comment("각 탄정보");
            $table->string('seong', 50)->default('')->comment("1성, 2성, 3성, 4성, 5성, 환상");
            $table->string('diskType', 100)->default('')->comment("전설, 환상, 행운, 행운초강력, 행운전설, 행운환상, 울트라비스트");
            $table->string('diskNumber', 100)->default('')->comment("디스크 고유번호");
            $table->string('diskName', 100)->default('')->comment("디스크 이름");
            $table->string('diskImage', 100)->default('')->comment("디스크 이미지 파일 이름");
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
        Schema::dropIfExists('gaoledisks');
    }
};
