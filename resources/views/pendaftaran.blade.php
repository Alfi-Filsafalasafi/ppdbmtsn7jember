<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran PPDB MTSN 7 Jember</title>
<link rel="icon" type="image/png" href="{{ asset('img/mts7.png') }}">
  <link href="{{asset('img/mts7.png')}}" rel="apple-touch-icon">
    <link href="{{ asset('landing_page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_page/assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        label { font-weight: 600; }
        .card { border-radius: 15px; }
    </style>


</head>

<body>

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('img/logo_mts_7.png') }}" alt="">
                <h1 class="sitename">PPDB MTSN 7 Jember</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Pengumuman</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">

        <div class="container my-5">
            <h2 class="text-center mb-4">Formulir Pendaftaran Siswa Baru</h2>

            <div class="card shadow p-4">
                <form action="{{ route('pendaftaran.store') }}" method="POST">
                    @csrf

                    <h5 class="mb-3">Data Siswa</h5>
                    <div class="row">
                        {{-- <div class="col-md-6 mb-3">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" value="{{ old('nis') }}" required>
                        </div> --}}

                        <div class="col-md-12 mb-3">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control" value="{{ old('nisn') }}" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Agama</label>
                           <select name="agama"
                class="form-control @error('agama') is-invalid @enderror" required>
            <option value="">-Pilih-</option>
            <option value="Islam" {{ old('agama')=='Islam'?'selected':'' }}>Islam</option>
            <option value="Kristen" {{ old('agama')=='Kristen'?'selected':'' }}>Kristen</option>
            <option value="Katolik" {{ old('agama')=='Katolik'?'selected':'' }}>Katolik</option>
            <option value="Hindu" {{ old('agama')=='Hindu'?'selected':'' }}>Hindu</option>
            <option value="Buddha" {{ old('agama')=='Buddha'?'selected':'' }}>Buddha</option>
            <option value="Konghucu" {{ old('agama')=='Konghucu'?'selected':'' }}>Konghucu</option>
        </select>   </div>

                        <div class="col-md-6 mb-3">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control datepicker" value="{{ old('tanggal_lahir') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Status Keluarga</label>
                            <select name="status_keluarga"
                class="form-control @error('status_keluarga') is-invalid @enderror" required>
            <option value="">-Pilih-</option>
            <option value="Anak Kandung" {{ old('status_keluarga')=='Anak Kandung'?'selected':'' }}>Anak Kandung</option>
            <option value="Anak Angkat" {{ old('status_keluarga')=='Anak Angkat'?'selected':'' }}>Anak Angkat</option>
            <option value="Tinggal Dengan Wali" {{ old('status_keluarga')=='Tinggal Dengan Wali'?'selected':'' }}>Tinggal Dengan Wali</option>
        </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Anak Ke</label>
                            <input type="number" name="anak_ke" class="form-control" value="{{ old('anak_ke') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>No. Telepon Siswa</label>
                            <input type="text" name="telp_siswa" class="form-control" value="{{ old('telp_siswa') }}" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Alamat Siswa</label>
                            <textarea name="alamat_siswa" class="form-control" rows="2" required>{{ old('alamat_siswa') }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Sekolah Asal</label>
                            <input type="text" name="sekolah_asal" class="form-control" value="{{ old('sekolah_asal') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Tanggal Diterima</label>
                            <input type="date" name="tanggal_diterima" class="form-control datepicker" value="{{ old('tanggal_diterima') ?? date('Y-m-d') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Masuk di Kelas</label>
                            <select name="diterima_di_kelas"
                class="form-control @error('diterima_di_kelas') is-invalid @enderror"
                required>
            <option value="">-Pilih-</option>
            <option value="7" {{ old('diterima_di_kelas')=='7'?'selected':'' }}>7</option>
            <option value="8" {{ old('diterima_di_kelas')=='8'?'selected':'' }}>8</option>
            <option value="9" {{ old('diterima_di_kelas')=='9'?'selected':'' }}>9</option>
        </select>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h5>Data Orang Tua</h5>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-3">
                            <label>Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" class="form-control" value="{{ old('pekerjaan_ayah') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" class="form-control" value="{{ old('pekerjaan_ibu') }}" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Alamat Orang Tua</label>
                            <textarea name="alamat_orang_tua" class="form-control" rows="2" required>{{ old('alamat_orang_tua') }}</textarea>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h5>Data Wali (Opsional)</h5>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-3">
                            <label>Nama Wali</label>
                            <input type="text" name="nama_wali" class="form-control" value="{{ old('nama_wali') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Pekerjaan Wali</label>
                            <input type="text" name="pekerjaan_wali" class="form-control" value="{{ old('pekerjaan_wali') }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Alamat Wali</label>
                            <textarea name="alamat_wali" class="form-control" rows="2">{{ old('alamat_wali') }}</textarea>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success w-100 px-5 py-3">Kirim Pendaftaran</button>
                    </div>

                </form>
            </div>
        </div>

    </main>

    <!-- Scripts -->
    <script src="{{ asset('landing_page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

{{-- SWEET ALERT --}}
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal Mengirim!',
            html: `{!! implode('<br>', $errors->all()) !!}`
        });
    </script>
@endif

@if(session('success_register'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Pendaftaran Berhasil!',
        html: `
            <p>Silakan download bukti pendaftaran atau masuk ke grup WhatsApp.</p>
            <div class="mt-3">
                <a href="pendaftaran/download-pdf/{{ session('student_id') }}" class="btn btn-primary w-100 mb-2" target="_blank">
                    Download Bukti Pendaftaran
                </a>
                <a href="{{ session('wa_link') }}" class="btn btn-success w-100" target="_blank">
                    Masuk Grup WhatsApp
                </a>
            </div>
        `,
        showConfirmButton: false,   // tidak menampilkan tombol OK
        allowOutsideClick: false,   // tidak bisa klik di luar
        allowEscapeKey: false,      // tidak bisa tekan ESC
        allowEnterKey: false,       // tidak bisa enter
        showCloseButton: true       // harus klik X untuk menutup
    });
</script>
@endif


</html>
