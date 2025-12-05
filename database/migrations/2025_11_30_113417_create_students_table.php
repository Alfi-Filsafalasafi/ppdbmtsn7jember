<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // Data Siswa
            $table->string('nis')->unique();
            $table->string('nisn')->unique();
            $table->string('no_pendaftaran')->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama')->nullable();
            $table->string('status_keluarga')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('telp_siswa')->nullable();
            $table->text('alamat_siswa')->nullable();

            // Asal Sekolah
            $table->string('sekolah_asal')->nullable();
            $table->date('tanggal_diterima')->nullable();
            $table->string('diterima_di_kelas')->nullable();

            // Data Orang Tua
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('alamat_orang_tua')->nullable();

            // Data Wali
            $table->string('nama_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->text('alamat_wali')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
