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
        Schema::table('mydisks', function (Blueprint $table) {
            $table->string('acquisition_method', '100')->comment("획득 방법")->after('gaolestore_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mydisks', function (Blueprint $table) {
            //
        });
    }
};
