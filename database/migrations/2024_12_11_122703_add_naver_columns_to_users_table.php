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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname', 100)->default("")->after('email');
            $table->string('age', 50)->default("")->after('nickname');
            $table->string('gender', 10)->default("")->after('age');
            $table->string('mobile', 20)->default("")->after('gender');
            $table->string('profile_image', 20)->default("")->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
