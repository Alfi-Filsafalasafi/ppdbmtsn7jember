<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pendaftaran',
        'nis',
        'nisn',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_keluarga',
        'anak_ke',
        'telp_siswa',
        'alamat_siswa',

        'sekolah_asal',
        'tanggal_diterima',
        'diterima_di_kelas',

        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'alamat_orang_tua',

        'nama_wali',
        'pekerjaan_wali',
        'alamat_wali',
    ];
}
