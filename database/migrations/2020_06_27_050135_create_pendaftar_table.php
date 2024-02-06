<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('jk');
            $table->string('tpt_lahir');
            $table->string('tgl_lahir');
            $table->string('agama');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('asal_sekolah');
            $table->string('tahun_tamat');
            $table->string('alamat_smp');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_ortu');
            $table->string('no_hp_ortu');
            $table->string('nama_wali');
            $table->string('pekerjaan_wali');
            $table->string('no_hp_wali');
            $table->string('alamat_wali');
            $table->unsignedInteger('paket_keahlian_id');
            $table->foreign('paket_keahlian_id')->references('id')->on('paket_keahlian');
            $table->string('ref_pendaftaran');
            $table->unsignedInteger('tahun_ajaran_ppdb_id');
            $table->foreign('tahun_ajaran_ppdb_id')->references('id')->on('tahun_ajaran_ppdb');
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
        Schema::dropIfExists('pendaftar');
    }
}
