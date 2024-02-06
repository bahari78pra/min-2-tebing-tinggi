<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFiedsToPendaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->string('email');
            $table->unsignedInteger('ekstrakurikuler_id');
            $table->foreign('ekstrakurikuler_id')->references('id')->on('ekstrakurikuler');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropForeign('ekstrakurikuler_id_pendaftar_foreign');
            $table->dropColumn('ekstrakurikuler_id');
        });
    }
}
