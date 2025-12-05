<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;


class RegistrationController extends Controller
{
    public function create()
    {
        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|max:20|unique:students,nis',
            'nisn' => 'required|max:20|unique:students,nisn',
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|max:150',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|max:100',
            'status_keluarga' => 'required|max:100',
            'anak_ke' => 'required|integer|min:1',
            'telp_siswa' => 'nullable|max:20',
            'alamat_siswa' => 'required',
            'sekolah_asal' => 'required|max:255',
            'tanggal_diterima' => 'required|date',
            'diterima_di_kelas' => 'required|max:50',
            'nama_ayah' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'pekerjaan_ayah' => 'required|max:255',
            'pekerjaan_ibu' => 'required|max:255',
            'alamat_orang_tua' => 'required',
            'nama_wali' => 'nullable|max:255',
            'pekerjaan_wali' => 'nullable|max:255',
            'alamat_wali' => 'nullable',
        ],
        [
            'nis.unique' => 'Data dengan NIS tersebut sudah melakukan pendaftaran',
            'nisn.unique' => 'Data dengan NISN tersebut sudah melakukan pendaftaran',
        ]);

        DB::beginTransaction();
        try {

            $last = Student::orderBy('id', 'DESC')
                ->value('no_pendaftaran');

            if ($last) {
                $lastNumber = intval(substr($last, -3));
                $nextNumber = $lastNumber + 1;
            } else {
                $nextNumber = 1;
            }
            $noPendaftaran = 'pend-20262027' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

            $validated['no_pendaftaran'] = $noPendaftaran;
            Student::create($validated);
            DB::commit();

            return redirect()->back()->with('success', 'Pendaftaran berhasil! Data Anda telah tersimpan. Tunggu info selanjutnya dari pihak MTsN 7 Jember ya 🥰');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan.'. $e)->withInput();
        }
    }
}
