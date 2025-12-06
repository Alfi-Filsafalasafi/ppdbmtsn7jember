@extends('layouts.master')

@section('title', 'Edit Data Siswa')
@section('students', 'active')

@section('content')
<div class="page-heading">
    <h3>Edit Data Pendaftar</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

<div class="row">

    {{-- ======================== --}}
    {{-- DATA SISWA --}}
    {{-- ======================== --}}
    <h5 class="mt-4">Data Siswa</h5>

    {{-- No Pendaftaran --}}
    <div class="col-md-4 mb-3">
        <label>No Pendaftaran</label>
        <input type="text" name="no_pendaftaran"
               class="form-control @error('no_pendaftaran') is-invalid @enderror"
               value="{{ old('no_pendaftaran', $student->no_pendaftaran) }}" required>
        @error('no_pendaftaran') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- NIS
    <div class="col-md-4 mb-3">
        <label>NIS</label>
        <input type="text" name="nis"
               class="form-control @error('nis') is-invalid @enderror"
               value="{{ old('nis', $student->nis) }}" required>
        @error('nis') <small class="text-danger">{{ $message }}</small> @enderror
    </div> --}}

    {{-- NISN --}}
    <div class="col-md-4 mb-3">
        <label>NISN</label>
        <input type="text" name="nisn"
               class="form-control @error('nisn') is-invalid @enderror"
               value="{{ old('nisn', $student->nisn) }}" required>
        @error('nisn') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Nama --}}
    <div class="col-md-4 mb-3">
        <label>Nama</label>
        <input type="text" name="nama"
               class="form-control @error('nama') is-invalid @enderror"
               value="{{ old('nama', $student->nama) }}" required>
        @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Jenis Kelamin --}}
    <div class="col-md-4 mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin"
                class="form-control @error('jenis_kelamin') is-invalid @enderror"
                required>
            <option value="">-Pilih-</option>
            <option value="L" {{ old('jenis_kelamin', $student->jenis_kelamin)=='L'?'selected':'' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin', $student->jenis_kelamin)=='P'?'selected':'' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Tempat Lahir --}}
    <div class="col-md-4 mb-3">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir"
               class="form-control @error('tempat_lahir') is-invalid @enderror"
               value="{{ old('tempat_lahir', $student->tempat_lahir) }}" required>
        @error('tempat_lahir') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Tanggal Lahir --}}
    <div class="col-md-4 mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir"
               class="form-control @error('tanggal_lahir') is-invalid @enderror"
               value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" required>
        @error('tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Agama --}}
    <div class="col-md-4 mb-3">
        <label>Agama</label>
        <select name="agama"
                class="form-control @error('agama') is-invalid @enderror" required>
            <option value="">-Pilih-</option>
            @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
                <option value="{{ $agama }}"
                    {{ old('agama', $student->agama)==$agama ? 'selected' : '' }}>
                    {{ $agama }}
                </option>
            @endforeach
        </select>
        @error('agama') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Status Keluarga --}}
    <div class="col-md-4 mb-3">
        <label>Status Keluarga</label>
        <select name="status_keluarga"
                class="form-control @error('status_keluarga') is-invalid @enderror" required>
            <option value="">-Pilih-</option>
            @foreach(['Anak Kandung','Anak Angkat','Tinggal Dengan Wali'] as $status)
                <option value="{{ $status }}"
                    {{ old('status_keluarga', $student->status_keluarga)==$status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
        @error('status_keluarga') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Anak ke --}}
    <div class="col-md-4 mb-3">
        <label>Anak ke</label>
        <input type="number" name="anak_ke"
               class="form-control @error('anak_ke') is-invalid @enderror"
               value="{{ old('anak_ke', $student->anak_ke) }}" required>
        @error('anak_ke') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Telp Siswa --}}
    <div class="col-md-4 mb-3">
        <label>Telp Siswa</label>
        <input type="text" name="telp_siswa"
               class="form-control @error('telp_siswa') is-invalid @enderror"
               value="{{ old('telp_siswa', $student->telp_siswa) }}">
        @error('telp_siswa') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- Alamat Siswa --}}
    <div class="col-md-12 mb-3">
        <label>Alamat Siswa</label>
        <textarea name="alamat_siswa"
                  class="form-control @error('alamat_siswa') is-invalid @enderror"
                  required>{{ old('alamat_siswa', $student->alamat_siswa) }}</textarea>
        @error('alamat_siswa') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- ======================== --}}
    {{-- ASAL SEKOLAH --}}
    {{-- ======================== --}}

    <h5 class="mt-4">Asal Sekolah</h5>

    <div class="col-md-6 mb-3">
        <label>Sekolah Asal</label>
        <input type="text" name="sekolah_asal"
               class="form-control @error('sekolah_asal') is-invalid @enderror"
               value="{{ old('sekolah_asal', $student->sekolah_asal) }}" required>
        @error('sekolah_asal') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label>Tanggal Diterima</label>
        <input type="date" name="tanggal_diterima"
               class="form-control @error('tanggal_diterima') is-invalid @enderror"
               value="{{ old('tanggal_diterima', $student->tanggal_diterima) }}" required>
        @error('tanggal_diterima') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label>Diterima di Kelas</label>
        <select name="diterima_di_kelas"
                class="form-control @error('diterima_di_kelas') is-invalid @enderror"
                required>
            <option value="">-Pilih-</option>
            @foreach([7,8,9] as $kelas)
                <option value="{{ $kelas }}"
                    {{ old('diterima_di_kelas', $student->diterima_di_kelas)==$kelas ? 'selected':'' }}>
                    {{ $kelas }}
                </option>
            @endforeach
        </select>
        @error('diterima_di_kelas') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- ======================== --}}
    {{-- ORANG TUA --}}
    {{-- ======================== --}}

    <h5 class="mt-4">Data Orang Tua</h5>

    <div class="col-md-6 mb-3">
        <label>Nama Ayah</label>
        <input type="text" name="nama_ayah"
               class="form-control @error('nama_ayah') is-invalid @enderror"
               value="{{ old('nama_ayah', $student->nama_ayah) }}" required>
        @error('nama_ayah') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label>Nama Ibu</label>
        <input type="text" name="nama_ibu"
               class="form-control @error('nama_ibu') is-invalid @enderror"
               value="{{ old('nama_ibu', $student->nama_ibu) }}" required>
        @error('nama_ibu') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label>Pekerjaan Ayah</label>
        <input type="text" name="pekerjaan_ayah"
               class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
               value="{{ old('pekerjaan_ayah', $student->pekerjaan_ayah) }}" required>
        @error('pekerjaan_ayah') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label>Pekerjaan Ibu</label>
        <input type="text" name="pekerjaan_ibu"
               class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
               value="{{ old('pekerjaan_ibu', $student->pekerjaan_ibu) }}" required>
        @error('pekerjaan_ibu') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label>Alamat Orang Tua</label>
        <textarea name="alamat_orang_tua"
                  class="form-control @error('alamat_orang_tua') is-invalid @enderror"
                  required>{{ old('alamat_orang_tua', $student->alamat_orang_tua) }}</textarea>
        @error('alamat_orang_tua') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    {{-- ======================== --}}
    {{-- DATA WALI --}}
    {{-- ======================== --}}

    <h5 class="mt-4">Data Wali (Opsional)</h5>

    <div class="col-md-6 mb-3">
        <label>Nama Wali</label>
        <input type="text" name="nama_wali"
               class="form-control @error('nama_wali') is-invalid @enderror"
               value="{{ old('nama_wali', $student->nama_wali) }}">
        @error('nama_wali') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label>Pekerjaan Wali</label>
        <input type="text" name="pekerjaan_wali"
               class="form-control @error('pekerjaan_wali') is-invalid @enderror"
               value="{{ old('pekerjaan_wali', $student->pekerjaan_wali) }}">
        @error('pekerjaan_wali') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label>Alamat Wali</label>
        <textarea name="alamat_wali"
                  class="form-control @error('alamat_wali') is-invalid @enderror">{{ old('alamat_wali', $student->alamat_wali) }}</textarea>
        @error('alamat_wali') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

</div>

<button type="submit" class="btn btn-primary mt-3">Update</button>

                </form>

            </div>
        </div>
    </section>
</div>
@endsection
