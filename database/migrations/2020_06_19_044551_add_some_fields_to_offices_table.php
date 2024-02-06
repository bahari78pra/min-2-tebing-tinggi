<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldsToOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->string('url_facebook');
            $table->string('url_twitter');
            $table->string('url_instagram');
            $table->string('url_youtube');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->dropColumn('url_facebook');
            $table->dropColumn('url_twitter');
            $table->dropColumn('url_instagram');
            $table->dropColumn('url_youtube');
            $table->dropColumn('email_pengaduan');
            $table->dropColumn('no_telp_pengaduan');
        });
    }
}
