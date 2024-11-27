<!DOCTYPE html>
<html>
<head>
    <title>"<kategori_surat> - <nomor_surat>"</title>
</head>
<body style="font-family:cambria">
    <header>
        {{-- Tabel Kop --}}
        <table style="width: 100%">
            <tr>
                <td style="width: 100px; height: 100px; text-align: center">
                    {{-- <img src="{{ asset('storage/' . $instansi->logo) }}" alt="Logo {{ $instansi->nama }}"> --}}
                    Logo
                </td>
                
                <td style="text-align: center">
                    <p> <strong>{{ Str::upper($instansi->institusi) }} </strong></p>
                    <p> <strong>{{ Str::upper($instansi->subinstitusi) }} </strong></p>
                    <p> <strong>{{ Str::upper($instansi->instansi) }} </strong></p>
                    <p> <small>{{ $instansi->alamat; }}</small> </p>
                    <p> <small>Laman. {{ $instansi->website; }} Surel. {{ $instansi->email; }} Tel. {{ $instansi->telepon; }}</small></p>
                </td>
            </tr>
        </table>
    </header>
    <hr>
    <main>
        {{-- Tabel Isian --}}
        <table style="width: 100%">
            <tr>
                <td style="text-align: center;" colspan="3">
                    <u><strong>SURAT TUGAS</strong></u>
                    <p>Nomor: [Nomor Surat] {{-- .../Mts.28.02.01.01/KP.00.1/01/2000 --}}</p>
                </td>
            </tr>
            <tr>
                <td style="height: 1rem" colspan="3">
                </td>
            </tr>
            <tr>
                <td style="text-align: justify;" colspan="3">
                    <p>Berdasarkan [Dasar Hukum]</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: justify;" colspan="3">
                    <p>Saya yang bertanda tangan di bawah ini:</p>
                </td>
            </tr>
            <tr>
                <td style="width: 10rem">
                    <p>Nama Lengkap</p>
                </td>
                <td style="width: 1rem; text-align:center">
                    <p>:</p>
                </td>
                <td style="text-align: justify;">
                    <b>{{ $instansi->kepala_instansi }}</b>
                </td>
            </tr>
            <tr>
                <td style="width: 10rem">
                    <p>NIP</p>
                </td>
                <td style="width: 1rem; text-align:center">
                    <p>:</p>
                </td>
                <td style="text-align: justify;">
                    <p>{{ $instansi->nip_kepala }}</p>
                </td>
            </tr>
            <tr>
                <td style="width: 10rem">
                    <p>Jabatan</p>
                </td>
                <td style="width: 1rem; text-align:center">
                    <p>:</p>
                </td>
                <td style="text-align: justify;">
                    <p>Kepala {{ $instansi->instansi }}</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: justify;" colspan="3">
                    <p>Memberikan Tugas Kepada:</p>
                </td>
            </tr>
            <tr>
                <td style="width: 10rem">
                    <p>Nama Lengkap</p>
                </td>
                <td style="width: 1rem; text-align:center">
                    <p>:</p>
                </td>
                <td style="text-align: justify;">
                    <b>[Nama Pegawai]</b>
                </td>
            </tr>
            <tr>
                <td style="width: 10rem">
                    <p>NIP</p>
                </td>
                <td style="width: 1rem; text-align:center">
                    <p>:</p>
                </td>
                <td style="text-align: justify;">
                    <p>[NIP Pegawai]</p>
                </td>
            </tr>
            <tr>
                <td style="width: 10rem">
                    <p>Jabatan</p>
                </td>
                <td style="width: 1rem; text-align:center">
                    <p>:</p>
                </td>
                <td style="text-align: justify;">
                    <p>[Jabatan Pegawai]</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: justify;" colspan="3">
                    <p>[Uraian Isi]</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: justify;" colspan="3">
                    <p>[Uraian Penutup]</p>
                </td>
            </tr>
        </table>
        <br>
        {{-- Tabel Titimangsa --}}
        <table>
            <tr>
                <td rowspan="7" style="width: 60%;">
                </td>
            </tr>
            <tr>
                <td>
                    {{-- <p>Pandeglang, 14 Januari 2000</p> --}}
                    <p>[Nama Kabupaten], [Tanggal Surat]</p>
                </td>
            </tr>
            <tr>
                <td>
                    Mengetahui/Menyetujui,
                </td>
            </tr>
            <tr>
                <td>
                    {{-- <p>Kepala Madrasah Tsanawiyah Negeri 1 Pandeglang</p> --}}
                    <p>Kepala {{ $instansi->instansi }}</p>
                </td>
            </tr>
            <tr>
                <td style="height: 90px; width: 90px; text-align: center">
                    [TTE Kepala Instansi]
                </td>
            </tr>
            <tr>
                <td>
                    {{-- <b>H. Eman Sulaiman, S.Ag., M.Pd.</b> --}}
                    <b>{{ $instansi->kepala_instansi }}</b>
                </td>
            </tr>
            <tr>
                <td>
                    {{-- <p>NIP 200001142025041001</p> --}}
                    NIP {{ $instansi->nip_kepala }}
                </td>
            </tr>
        </table>
    </main>
</body>
</html>
