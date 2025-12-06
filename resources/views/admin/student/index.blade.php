@extends('layouts.master')

@section('title', 'Data Siswa')
@section('students', 'active')
@section('students', 'active')
@section('content')
<div class="page-heading">
    <h3>Data Siswa</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Daftar Siswa</h4>
                <a href="{{ route('admin.students.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Siswa
                </a>
            </div>

            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No Pendaftaran</th>
                            {{-- <th>NIS</th> --}}
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Sekolah Asal</th>
                            <th>Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->no_pendaftaran }}</td>
                                {{-- <td>{{ $student->nis }}</td> --}}
                                <td>{{ $student->nisn }}</td>
                                <td>{{ $student->nama }}</td>
                                <td>{{ ucfirst($student->jenis_kelamin) }}</td>
                                <td>{{ $student->sekolah_asal }}</td>
                                <td>{{ $student->telp_siswa }}</td>
                                <td>
                                    <a href="{{ route('admin.students.pdf', $student->id) }}"
                                    class="btn btn-sm btn-success" target="_blank">
                                        <i class="bi bi-download"></i>
                                    </a>

                                    <button
                                        class="btn btn-sm btn-info btn-detail"
                                        data-bs-toggle="modal"
                                        data-bs-target="#detailModal"
                                        data-student='@json($student)'
                                    >
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.students.destroy', $student->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin hapus data siswa ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>
<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <table class="table table-bordered">
                    <tbody>
                        <tr><th>No Pendaftaran</th><td id="d_no_pendaftaran"></td></tr>
                        {{-- <tr><th>NIS</th><td id="d_nis"></td></tr> --}}
                        <tr><th>NISN</th><td id="d_nisn"></td></tr>
                        <tr><th>Nama</th><td id="d_nama"></td></tr>
                        <tr><th>Jenis Kelamin</th><td id="d_jenis_kelamin"></td></tr>
                        <tr><th>Tempat Lahir</th><td id="d_tempat_lahir"></td></tr>
                        <tr><th>Tanggal Lahir</th><td id="d_tanggal_lahir"></td></tr>
                        <tr><th>Agama</th><td id="d_agama"></td></tr>
                        <tr><th>Status Keluarga</th><td id="d_status_keluarga"></td></tr>
                        <tr><th>Anak Ke</th><td id="d_anak_ke"></td></tr>
                        <tr><th>Telepon</th><td id="d_telp_siswa"></td></tr>
                        <tr><th>Alamat Siswa</th><td id="d_alamat_siswa"></td></tr>
                        <tr><th>Sekolah Asal</th><td id="d_sekolah_asal"></td></tr>
                        <tr><th>Tanggal Diterima</th><td id="d_tanggal_diterima"></td></tr>
                        <tr><th>Diterima di Kelas</th><td id="d_diterima_di_kelas"></td></tr>
                        <tr><th>Nama Ayah</th><td id="d_nama_ayah"></td></tr>
                        <tr><th>Nama Ibu</th><td id="d_nama_ibu"></td></tr>
                        <tr><th>Pekerjaan Ayah</th><td id="d_pekerjaan_ayah"></td></tr>
                        <tr><th>Pekerjaan Ibu</th><td id="d_pekerjaan_ibu"></td></tr>
                        <tr><th>Alamat Orang Tua</th><td id="d_alamat_orang_tua"></td></tr>
                        <tr><th>Nama Wali</th><td id="d_nama_wali"></td></tr>
                        <tr><th>Pekerjaan Wali</th><td id="d_pekerjaan_wali"></td></tr>
                        <tr><th>Alamat Wali</th><td id="d_alamat_wali"></td></tr>
                    </tbody>
                </table>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.btn-detail').forEach(btn => {
        btn.addEventListener('click', function () {

            let data = JSON.parse(this.getAttribute('data-student'));

            // otomatis isi modal
            document.getElementById('d_no_pendaftaran').innerText = data.no_pendaftaran ?? '-';
            // document.getElementById('d_nis').innerText = data.nis ?? '-';
            document.getElementById('d_nisn').innerText = data.nisn ?? '-';
            document.getElementById('d_nama').innerText = data.nama ?? '-';
            document.getElementById('d_jenis_kelamin').innerText = data.jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
            document.getElementById('d_tempat_lahir').innerText = data.tempat_lahir ?? '-';
            document.getElementById('d_tanggal_lahir').innerText = data.tanggal_lahir ?? '-';
            document.getElementById('d_agama').innerText = data.agama ?? '-';
            document.getElementById('d_status_keluarga').innerText = data.status_keluarga ?? '-';
            document.getElementById('d_anak_ke').innerText = data.anak_ke ?? '-';
            document.getElementById('d_telp_siswa').innerText = data.telp_siswa ?? '-';
            document.getElementById('d_alamat_siswa').innerText = data.alamat_siswa ?? '-';

            document.getElementById('d_sekolah_asal').innerText = data.sekolah_asal ?? '-';
            document.getElementById('d_tanggal_diterima').innerText = data.tanggal_diterima ?? '-';
            document.getElementById('d_diterima_di_kelas').innerText = data.diterima_di_kelas ?? '-';

            document.getElementById('d_nama_ayah').innerText = data.nama_ayah ?? '-';
            document.getElementById('d_nama_ibu').innerText = data.nama_ibu ?? '-';
            document.getElementById('d_pekerjaan_ayah').innerText = data.pekerjaan_ayah ?? '-';
            document.getElementById('d_pekerjaan_ibu').innerText = data.pekerjaan_ibu ?? '-';
            document.getElementById('d_alamat_orang_tua').innerText = data.alamat_orang_tua ?? '-';

            document.getElementById('d_nama_wali').innerText = data.nama_wali ?? '-';
            document.getElementById('d_pekerjaan_wali').innerText = data.pekerjaan_wali ?? '-';
            document.getElementById('d_alamat_wali').innerText = data.alamat_wali ?? '-';
        });
    });

});
</script>

@endsection
