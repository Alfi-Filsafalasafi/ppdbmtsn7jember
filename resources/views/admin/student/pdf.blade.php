<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 13px; }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .logo-left {
            float: left;
            width: 90px;
        }
        .logo-right {
            float: right;
            width: 90px;
        }
        .clear { clear: both; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        td {
            padding: 6px 4px;
            vertical-align: top;
        }
        .title { font-size: 18px; font-weight: bold; }
        .subtitle { font-size: 15px; font-weight: bold; }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('img/logo_kemenag.png') }}" class="logo-left">
        <img src="{{ public_path('img/logo_mts_7.png') }}" class="logo-right">

        <div class="title">PANITIA PPDB</div>
        <div class="title">MADRASAH TSANAWIYAH NEGERI 7 JEMBER</div>
        <div class="subtitle">TAHUN PELAJARAN 2026 / 2027</div>
        <div>
            Jalan WR Supratman No 55 Umbulrejo - Umbulsari - Jember, Telepon (0336) 441816<br>
            Web: mtsn7jember.sch.id &nbsp; Email: admin@mtsn7jember.sch.id
        </div>

        <div class="clear"></div>
    </div>

    <h3 style="text-align:center;">FORMULIR DATA SISWA</h3>

    <table>
        <tr><td>Tanggal Pendaftaran</td><td>: {{ \Carbon\Carbon::parse($student->created_at)->format('d-m-Y H:i:s') }}</td></tr>
        <tr><td width="35%">No Pendaftaran</td><td>: {{ $student->no_pendaftaran }}</td></tr>
        {{-- <tr><td>NIS</td><td>: {{ $student->nis }}</td></tr> --}}
        <tr><td>NISN</td><td>: {{ $student->nisn }}</td></tr>
        <tr><td>Nama</td><td>: {{ $student->nama }}</td></tr>
        <tr><td>Jenis Kelamin</td><td>: {{ $student->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td></tr>
        <tr><td>Tempat, Tanggal Lahir</td><td>: {{ $student->tempat_lahir }}, {{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d-m-Y') }}</td></tr>
        <tr><td>Agama</td><td>: {{ $student->agama }}</td></tr>
        <tr><td>Status Keluarga</td><td>: {{ $student->status_keluarga }}</td></tr>
        <tr><td>Anak Ke</td><td>: {{ $student->anak_ke }}</td></tr>
        <tr><td>Telepon</td><td>: {{ $student->telp_siswa }}</td></tr>
        <tr><td>Alamat Siswa</td><td>: {{ $student->alamat_siswa }}</td></tr>

        <tr><td>Sekolah Asal</td><td>: {{ $student->sekolah_asal }}</td></tr>
        <tr><td>Tanggal Diterima</td><td>: {{ \Carbon\Carbon::parse($student->tanggal_diterima)->format('d-m-Y') }}</td></tr>
        <tr><td>Diterima di Kelas</td><td>: {{ $student->diterima_di_kelas }}</td></tr>

        <tr><td>Nama Ayah</td><td>: {{ $student->nama_ayah }}</td></tr>
        <tr><td>Nama Ibu</td><td>: {{ $student->nama_ibu }}</td></tr>
        <tr><td>Pekerjaan Ayah</td><td>: {{ $student->pekerjaan_ayah }}</td></tr>
        <tr><td>Pekerjaan Ibu</td><td>: {{ $student->pekerjaan_ibu }}</td></tr>
        <tr><td>Alamat Orang Tua</td><td>: {{ $student->alamat_orang_tua }}</td></tr>

        <tr><td>Nama Wali</td><td>: {{ $student->nama_wali }}</td></tr>
        <tr><td>Pekerjaan Wali</td><td>: {{ $student->pekerjaan_wali }}</td></tr>
        <tr><td>Alamat Wali</td><td>: {{ $student->alamat_wali }}</td></tr>
    </table>

</body>
</html>
