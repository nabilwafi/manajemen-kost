<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tata Tertib Penghuni</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        font-size: 11px; /* kecilkan font */
        line-height: 1.4;
    }

    .wrapper {
      margin: 0 60px 0 60px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    ol {
        padding-left: 15px;
    }

    li {
        margin-bottom: 3px;
    }

    table {
        width: 100%;
        margin-top: 30px;
        font-size: 11px;
    }

    td {
        width: 50%;
        vertical-align: top;
        white-space:nowrap;
        padding: 0; 
        margin: 0;
    }

    td, th {
      border: 1px solid #000;
      padding: 6px;
      vertical-align: top;
      padding: 0 10px; 
      margin: 0;
    }
    .header {
      text-align: center;
      font-weight: bold;
      font-size: 14pt;
      margin-bottom: 20px;
    }
    .no-border td {
      border: none;
      padding: 2px 6px;
    }

    .table-inventaris td {
      width: auto;
    }

    .page-break {
            page-break-after: always;
    }

    h2 {
        text-align: center;
    }

    img.center {
      position: relative;
      left: 50%;
      transform: translateX(-50%);
    }
  </style>
</head>
<body>
  <div class="wrapper">

    <img src="{{ public_path('logo.png') }}" width="180" style="margin-bottom: 1rem;" class="center" alt="Logo Kost">
  
    <div class="header">SURAT KETERANGAN KELUAR KOST</div>
  
    <table>
      <tr>
        <td>Nomor Kamar</td>
        <td colspan="2">{{ $transaction->kamar->nama_kamar }}</td>
      </tr>
      <tr>
        <td>Tanggal Keluar</td>
        <td colspan="2">{{ $transaction->end_date_sewa }}</td>
      </tr>
    </table>
  
    <br>
  
    <table>
      <tr>
        <td><strong>Nama Penyewa 1</strong></td>
        <td colspan="2"><strong>{{ $transaction->user->name }}</strong></td>
      </tr>
      <tr><td>No. KTP</td><td colspan="2">{{ $transaction->user->ktp }}</td></tr>
    </table>

      <br><br>  

      <!-- Tata Tertib -->
      <p>
        Sejak tanggal tersebut diatas kami sudah tidak lagi menyewa dan menempati Narali House dengan nomor kamar tersebut diatas.
      </p>
      <br><br>
      Jika ada hal-hal terjadi dikemudian hari yang berhubungan dengan kami adalah mutlak menjadi tanggung jawab kami sendiri dan bukan menjadi tanggung jawab pemilik kost.
  </div>

    <br><br><br>
    <table>
        <tr>
            <td style="border: none; text-align: center;">
              Menyetujui<br><br><br>
              <img src="{{ public_path('storage/' . $transaction->kondisiBarangMasuk->signature_path) }}" width="180" style="margin-bottom: 1rem;" alt="Logo Kost">
              <br><br><br><br>
                Penyewa Kost<br><br>
                Nama: {{ $transaction->user->name ?? '________________' }}
            </td>
            <td style="border: none; text-align: center;">
                Mengetahui<br><br><br>
                <img src="{{ public_path('Signature - Muhammad Nabil Wafi.png') }}" width="180" style="margin-bottom: 1rem;" alt="Logo Kost">
                <br><br>
                Pemilik / Pengelola Kost<br><br>
                Nama: {{ $transaction->pemilik->name ?? '________________' }}
            </td>
        </tr>
    </table>

    <div class="page-break"></div>

    <br>
    <br>
    <br>

    <img src="{{ public_path('logo.png') }}" width="180" style="margin-bottom: 1rem;" class="center" alt="Logo Kost">

    <h2>DAFTAR INVENTARIS BARANG</h2>

  <table class="table-inventaris">
    <thead>
      <tr>
        <th style="width: fit-content">No.</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Kondisi Masuk</th>
      </tr>
    </thead>
    <tbody>
      <tr><td style="text-align: center">1</td><td>AC ½ PK (LG / Samsung / Sharp)</td><td style="text-align: right">3.500.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">2</td><td>Remote AC</td><td style="text-align: right">50.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">3</td><td>Spring Bed 2 in 1</td><td style="text-align: right">2.500.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">4</td><td>Bantal</td><td style="text-align: right">50.000</td><td style="text-align: right">... buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">5</td><td>Guling</td><td style="text-align: right">50.000</td><td style="text-align: right">... buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">6</td><td>TV Flat 24 Inch Merk LG</td><td style="text-align: right">1.500.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">7</td><td>Remote TV</td><td style="text-align: right">50.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">8</td><td>Kulkas Sharp 1 Pintu</td><td style="text-align: right">2.000.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">9</td><td>Lemari</td><td style="text-align: right">900.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">10</td><td>Gantungan Baju Dinding</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">11</td><td>Gantungan Sabun/Shampo</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">12</td><td>Gantungan Handuk Kamar Mandi</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">13</td><td>Kerai Jendela</td><td style="text-align: right">150.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">14</td><td>Seprai</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">15</td><td>Sarung Bantal</td><td style="text-align: right">20.000</td><td style="text-align: right">... buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">16</td><td>Sarung Guling</td><td style="text-align: right">20.000</td><td style="text-align: right">... buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">17</td><td>Meja Belajar</td><td style="text-align: right">500.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">18</td><td>Kursi Belajar</td><td style="text-align: right">300.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">19</td><td>Jam Dinding</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">20</td><td>Keset Kamar Mandi</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">21</td><td>Kunci Kamar</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">22</td><td>Kunci Gerbang Utama</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">23</td><td>Kunci Gerbang Atas 1</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">24</td><td>Kunci Gerbang Atas 2</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
      <tr><td style="text-align: center">25</td><td>Kunci Gerbang {{ $transaction->kamar->nama_kamar }}</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk->barang_1 }}</td></tr>
    </tbody>
  </table>

  <br>
  <br>

  <div class="note">
    Daftar inventaris barang diatas adalah yang tersedia di dalam kamar kost dan merupakan barang inventaris dari Narali House dan harus dikembalikan tanpa ada cacat atau rusak pada masa akhir sewa selesai. Apabila barang tersebut rusak/hilang, penyewa akan dikenakan biaya penggantian sesuai dengan harga barang tersebut
  </div>

  <br><br><br>
    <table>
        <tr>
            <td style="border: none; text-align: center;">
              Menyetujui<br><br><br>
              <img src="{{ public_path('storage/' . $transaction->kondisiBarangMasuk->signature_path) }}" width="180" style="margin-bottom: 1rem;" alt="Logo Kost">
              <br><br><br><br>
                Penyewa Kost<br><br>
                Nama: {{ $transaction->user->name ?? '________________' }}
            </td>
            <td style="border: none; text-align: center;">
                Mengetahui<br><br><br><br>
                <img src="{{ public_path('Signature - Muhammad Nabil Wafi.png') }}" width="180" alt="Logo Kost"><br><br>
                Pemilik / Pengelola Kost<br><br>
                Nama: {{ $transaction->pemilik->name ?? '________________' }}
            </td>
        </tr>
    </table>
</body>
</html>
