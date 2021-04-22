<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnSecuritycodeAndVideotypeAndTokenkeyTypeInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('security_code')->nullable()->change();
            $table->dropColumn('video_type');
            $table->string('video_id',36);
            $table->string('token_key')->nullable()->change();
            $table->foreign('video_id')->references('id')->on('videos');


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
            $table->dropColumn('video-id');
        });
    }
}
