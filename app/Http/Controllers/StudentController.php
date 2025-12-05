<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $students = Student::when($search, function ($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%");
        })
        ->orderBy('nama', 'asc')
        ->paginate(10);

        return view('admin.student.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:20|unique:students,nis',
            'nisn' => 'required|string|max:20|unique:students,nisn',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:150',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:100',
            'status_keluarga' => 'required|string|max:100',
            'anak_ke' => 'required|integer|min:1',
            'telp_siswa' => 'nullable|string|max:20',
            'alamat_siswa' => 'required|string',
            'sekolah_asal' => 'required|string|max:255',
            'tanggal_diterima' => 'required|date',
            'diterima_di_kelas' => 'required|string|max:50',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat_orang_tua' => 'required|string',
            'nama_wali' => 'nullable|string|max:255',
            'pekerjaan_wali' => 'nullable|string|max:255',
            'alamat_wali' => 'nullable|string',
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


            return redirect()->route('admin.students.index')
                ->with('success', 'Data siswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Gagal menyimpan data siswa.' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('admin.student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nis' => 'required|string|max:20|unique:students,nis,' . $id,
            'nisn' => 'required|string|max:20|unique:students,nisn,' . $id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:150',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:100',
            'status_keluarga' => 'required|string|max:100',
            'anak_ke' => 'required|integer|min:1',
            'telp_siswa' => 'nullable|string|max:20',
            'alamat_siswa' => 'required|string',
            'sekolah_asal' => 'required|string|max:255',
            'tanggal_diterima' => 'required|date',
            'diterima_di_kelas' => 'required|string|max:50',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'alamat_orang_tua' => 'required|string',
            'nama_wali' => 'nullable|string|max:255',
            'pekerjaan_wali' => 'nullable|string|max:255',
            'alamat_wali' => 'nullable|string',

        ],
        [
            'nis.unique' => 'Data dengan NIS tersebut sudah ada di data pendaftaran',
            'nisn.unique' => 'Data dengan NISN tersebut sudah ada di data pendaftaran',
        ]);

        DB::beginTransaction();
        try {
            $student = Student::findOrFail($id);
            $student->update($validated);

            DB::commit();

            return redirect()->route('admin.students.index')
                ->with('success', 'Data siswa berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Gagal memperbarui data siswa.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Student::findOrFail($id)->delete();

            DB::commit();

            return redirect()->route('admin.students.index')
                ->with('success', 'Data siswa berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Gagal menghapus data siswa.');
        }
    }

    public function downloadPdf($id)
    {
        $student = Student::findOrFail($id);

        $pdf = Pdf::loadView('admin.student.pdf', compact('student'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('data-siswa-'.$student->no_pendaftaran.'.pdf');
    }
}
