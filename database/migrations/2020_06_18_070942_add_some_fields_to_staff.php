<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldsToStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->string('tpt_lahir');
            $table->string('tgl_lahir');
            $table->string('agama');
            $table->string('pendidikan_akhir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('tpt_lahir');
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('agama');
            $table->dropColumn('pendidikan_akhir');
            $table->dropColumn('riwayat_jabatan');
        });
    }
}
