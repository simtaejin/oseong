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
        Schema::create('array_tables', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('tan', 50)->default('')->comment("각 탄정보");
            $table->integer('rows')->default(0)->comment("줄 번호");
            $table->string('line_1', 50)->default('')->comment("1 라인");
            $table->string('line_2', 50)->default('')->comment("2 라인");
            $table->string('line_3', 50)->default('')->comment("3 라인");
            $table->string('line_4', 50)->default('')->comment("4 라인");
            $table->string('line_5', 50)->default('')->comment("5 라인");
            $table->string('line_6', 50)->default('')->comment("6 라인");
            $table->string('line_7', 50)->default('')->comment("7 라인");
            $table->string('line_8', 50)->default('')->comment("8 라인");
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
        Schema::dropIfExists('array_tables');
    }
};
