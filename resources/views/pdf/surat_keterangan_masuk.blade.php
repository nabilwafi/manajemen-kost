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
  
    <div class="header">TATA TERTIB PENGHUNI</div>
  
    <table>
      <tr>
        <td>Nomor Kamar</td>
        <td colspan="2">{{ $transaction->kamar->nama_kamar }}</td>
      </tr>
      <tr>
        <td>Tanggal Masuk</td>
        <td colspan="2">{{ $transaction->tgl_sewa }}</td>
      </tr>
    </table>
  
    <br>
    
    @foreach ($transaction->users as $user)
      <table>
        <tr>
          <td><strong>Nama Penyewa {{ $loop->iteration }}</strong></td>
          <td colspan="2"><strong>{{ $user->name }}</strong></td>
        </tr>
        <tr><td>No. KTP</td><td colspan="2">{{ $user->no_ktp }}</td></tr>
        <tr><td>No. HP</td><td colspan="2">{{ $user->no_wa }}</td></tr>
        <tr><td>Alamat</td><td colspan="2">{{ $user->alamat_ktp }}</td></tr>
        <tr><td>Pekerjaan</td><td colspan="2">{{ $user->pekerjaan }}</td></tr>
        <tr><td>Nama Kampus/Kantor</td><td colspan="2">{{ $user->nama_kampus_kantor }}</td></tr>
        <tr><td>Alamat Kampus/Kantor</td><td colspan="2">{{ $user->alamat_kampus_kantor }}</td></tr>
        <tr><td>Nama Keluarga saat darurat</td><td colspan="2">{{ $user->nama_keluarga }}</td></tr>
        <tr><td>Alamat</td><td colspan="2">{{ $user->alamat_keluarga }}</td></tr>
        <tr><td>Hubungan</td><td colspan="2">{{ $user->hubungan_kontak }}</td></tr>
        <tr><td>No. HP</td><td colspan="2">{{ $user->kontak_darurat }}</td></tr>
      </table>
    @endforeach

      <br><br>  

      <!-- Tata Tertib -->
      <p>
          Untuk kebaikan dan kenyamanan bersama, maka perlu dibuat peraturan dan tata tertib yang berlaku bagi semua penghuni kost...
      </p>
      <ol>
          <li>Setiap penghuni kost wajib menyerahkan foto copy KTP atau identitas diri yang sah.</li>
          <li>Calon penghuni kost harus menandatangani terlebih dahulu kesepakatan tata tertib kost...</li>
          <li>Calon penghuni kost, wajib memberitahukan pada pengelola kost:
              <ul>
                  <li>Nama, alamat dan nomor telepon saudara (orang tua, keluarga) yang dapat dihubungi.</li>
                  <li>Nama, alamat dan nomor telepon saudara (orang tua, keluarga) terdekat (di Jakarta).</li>
              </ul>
          </li>
          <li>Pembayaran uang sewa kost ditetapkan dimuka untuk periode sewa minimal 1 (satu) bulan...</li>
          <li>Pembayaran uang kost dilakukan sesuai dengan perjanjian dan tanggal pertama masuk kost.</li>
          <li>Pembayaran setiap bulannya dapat dilakukan melalui transfer ke rekening BCA...</li>
          <li>Keterlambatan pembayaran uang sewa kost selama 3 (tiga) hari tanpa pemberitahuan...</li>
          <li>Harga kamar hunian berlaku untuk 1 orang. Tambahan orang per kamar akan dikenakan biaya Rp. 500.000,- per orang per bulan.</li>
          <li>Penghuni kost dilarang menerima tamu yang bukan suami/istri didalam kamar.</li>
          <li>Tamu yang tidak berkepentingan dilarang menginap...</li>
          <li>Tamu yang lebih dari 3 (tiga) hari menginap akan dikenakan biaya menginap Rp. 50.000...</li>
          <li>Bagi penghuni kamar yang membawa sendiri peralatan elektronik selain komputer/laptop dikenakan biaya tambahan Rp. 50.000,- per bulan.</li>
          <li>Para penghuni dilarang keras:
              <ul>
                  <li>Membawa, menjual, memakai, menyimpan, mendistribusikan dan mengkonsumsi segala jenis narkoba...</li>
                  <li>Berjudi dan mabuk-mabukkan dengan mengkonsumsi segala jenis minuman keras.</li>
                  <li>Menyimpan, menimbun dan merakit segala bentuk bahan peledak dan bahan berbahaya lainnya.</li>
                  <li>Berbuat asusila dan melanggar norma di masyarakat umum.</li>
                  <li>Membunyikan televisi/alat elektronik lain dengan suara keras.</li>
                  <li>Memasukkan kertas/tissue atau benda lain ke dalam saluran kamar mandi dan kloset.</li>
                  <li>Membuat perubahan pada kamar tanpa izin.</li>
                  <li>Menyimpan barang mudah terbakar seperti bensin, gas, dll.</li>
                  <li>Memasang obat nyamuk bakar di dalam kamar.</li>
              </ul>
          </li>
                  <li>Penghuni kost harap mematikan peralatan listrik dan elektronik dalam kamar bila tidak digunakan. Apabila terjadi kejadian yang tidak diharapkan karena kelalaian penghuni, seperti kebakaran dan lain-lain sepenuhnya menjadi tanggung jawab penghuni kost.</li>
          <li>Penghuni kost harus menjaga fasilitas kost yang ada didalam kamar masing-masing. Kerusakan fasilitas yang disengaja menjadi tanggung jawab penghuni kost dan akan dibebankan biaya perbaikan atau penggantian.</li>
          <li>Penghuni kost harus menjaga dengan baik barang pribadi, baik di kamar maupun di tempat umum. Dan setiap keluar kamar harus mengunci pintu kamar masing-masing. Karena segala kehilangan tidak menjadi tanggung jawab pemilik kost.</li>
          <li>Penghuni kost tidak boleh meminjamkan/memberikan kunci kamar kepada orang lain.</li>
          <li>Penghuni kost harus berlaku sopan didalam kost, dan menjaga ketenangan dan tidak mengganggu kenyamanan dan keamanan penghuni lainnya.</li>
          <li>Dilarang merusak/mengambil barang fasilitas kamar kost seperti AC, Fasilitas Toilet, Ranjang, Lemari, Meja dll. Segala bentuk kerusakan dan kehilangan pada kamar bersangkutan, akan dikenakan charge atau penggantian pada penghuni bersangkutan.</li>
          <li>Penghuni kost diharap menjaga kebersihan dan keindahan dalam kamar dan lingkungan serta tidak diperkenankan merubah/menambah/merusak fisik bangunan.</li>
          <li>Penghuni kost tidak diperkenankan merokok di dalam kamar dan kamar mandi.</li>
          <li>Penghuni kost dilarang membawa dan memelihara binatang peliharaan dilingkungan kost.</li>
          <li>Segala tindakan kriminalitas dan pelanggaran hukum yang dilakukan penghuni kost, dapat segera dilaporkan pada pihak yang berwenang, dan pemilik kost tidak bertanggung jawab.</li>
          <li>Demi kenyamanan bersama, setiap tamu kost harus meninggalkan kost paling lambat pukul 23.00 WIB.</li>
          <li>Segala yang berhubungan dengan tamu inap (kehilangan/kerusakan dan kelalaian yang timbul daripadanya) menjadi tanggung jawab penuh penghuni kost.</li>
          <li>Bagi yang membawa kendaraan harap memarkir ditempat yang telah disediakan (bukan termasuk fasilitas kost), dan perlu ditambahkan kunci pengaman ganda. Segala bentuk kehilangan secara penuh merupakan tanggung jawab pribadi pemilik kendaraan.</li>
          <li>Pengelola kost berhak membuka kamar apabila dianggap perlu dan mendesak.</li>
          <li>Menyerahkan kunci kamar kepada pengelola kost jika kamar dan kamar mandi hendak dibersihkan oleh pengelola kost. (dikenakan biaya tambahan diluar harga kamar).</li>
          <li>Jika ada bagian dari kamar yang rusak, bocor, kunci rusak dll, harap segera memberitahukan kepada pengelola kost secepatnya, sehingga perbaikan dapat segera dilakukan.</li>
          <li>Bagi penyewa yang tidak memenuhi Tata Tertib atau ketentuan yang berlaku, maka pemilik kost berhak memutuskan sewa sepihak, dan penghuni wajib meninggalkan kamar kost tanpa ada pengembalian uang sewa.</li>
      </ol>
  </div>

    <table>
        <tr>
            <td style="border: none; text-align: center;">
                Menyetujui<br><br><br>
                @if ($transaction->kondisiBarangMasuk)
                <img src="{{ public_path('storage/' . $transaction->kondisiBarangMasuk->signature_path) }}" width="180" style="margin-bottom: 1rem;" alt="Logo Kost">
                @else
                <br><br><br>
                @endif
                <br><br><br><br>
                Penyewa Kost<br><br>
                Nama: {{ $transaction->users[0]->name ?? '________________' }}
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
      <tr><td style="text-align: center">1</td><td>AC ½ PK (LG / Samsung / Sharp)</td><td style="text-align: right">3.500.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_1 : "" }}</td></tr>
      <tr><td style="text-align: center">2</td><td>Remote AC</td><td style="text-align: right">50.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_2 : "" }}</td></tr>
      <tr><td style="text-align: center">3</td><td>Spring Bed 2 in 1</td><td style="text-align: right">2.500.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_3 : "" }}</td></tr>
      <tr><td style="text-align: center">4</td><td>Bantal</td><td style="text-align: right">50.000</td><td style="text-align: right">... buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_4 : "" }}</td></tr>
      <tr><td style="text-align: center">5</td><td>Guling</td><td style="text-align: right">50.000</td><td style="text-align: right">... buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_5 : "" }}</td></tr>
      <tr><td style="text-align: center">6</td><td>TV Flat 24 Inch Merk LG</td><td style="text-align: right">1.500.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_6 : "" }}</td></tr>
      <tr><td style="text-align: center">7</td><td>Remote TV</td><td style="text-align: right">50.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_7 : "" }}</td></tr>
      <tr><td style="text-align: center">8</td><td>Kulkas Sharp 1 Pintu</td><td style="text-align: right">2.000.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_8 : "" }}</td></tr>
      <tr><td style="text-align: center">9</td><td>Lemari</td><td style="text-align: right">900.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_9 : "" }}</td></tr>
      <tr><td style="text-align: center">10</td><td>Gantungan Baju Dinding</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_10 : "" }}</td></tr>
      <tr><td style="text-align: center">11</td><td>Gantungan Sabun/Shampo</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_11 : "" }}</td></tr>
      <tr><td style="text-align: center">12</td><td>Gantungan Handuk Kamar Mandi</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_12 : "" }}</td></tr>
      <tr><td style="text-align: center">13</td><td>Kerai Jendela</td><td style="text-align: right">150.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_13 : "" }}</td></tr>
      <tr><td style="text-align: center">14</td><td>Seprai</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_14 : "" }}</td></tr>
      <tr><td style="text-align: center">15</td><td>Sarung Bantal</td><td style="text-align: right">20.000</td><td style="text-align: right">... buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_15 : "" }}</td></tr>
      <tr><td style="text-align: center">16</td><td>Sarung Guling</td><td style="text-align: right">20.000</td><td style="text-align: right">... buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_16 : "" }}</td></tr>
      <tr><td style="text-align: center">17</td><td>Meja Belajar</td><td style="text-align: right">500.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_17 : "" }}</td></tr>
      <tr><td style="text-align: center">18</td><td>Kursi Belajar</td><td style="text-align: right">300.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_18 : "" }}</td></tr>
      <tr><td style="text-align: center">19</td><td>Jam Dinding</td><td style="text-align: right">100.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_19 : "" }}</td></tr>
      <tr><td style="text-align: center">20</td><td>Keset Kamar Mandi</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_20 : "" }}</td></tr>
      <tr><td style="text-align: center">21</td><td>Kunci Kamar</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_21 : "" }}</td></tr>
      <tr><td style="text-align: center">22</td><td>Kunci Gerbang Utama</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_22 : "" }}</td></tr>
      <tr><td style="text-align: center">23</td><td>Kunci Gerbang Atas 1</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_23 : "" }}</td></tr>
      <tr><td style="text-align: center">24</td><td>Kunci Gerbang Atas 2</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_24 : "" }}</td></tr>
      <tr><td style="text-align: center">25</td><td>Kunci Gerbang {{ $transaction->kamar->nama_kamar }}</td><td style="text-align: right">20.000</td><td style="text-align: right">1 buah</td><td>{{ $transaction->kondisiBarangMasuk ? $transaction->kondisiBarangMasuk->barang_25 : "" }}</td></tr>
    </tbody>
  </table>

  <br>
  <br>

  <div class="note">
    Daftar inventaris barang di atas adalah yang tersedia di dalam kamar kost dan merupakan barang inventaris dari Narali House dan harus dikembalikan tanpa ada cacat atau rusak pada masa akhir sewa selesai. Apabila barang tersebut rusak/hilang, penyewa akan dikenakan biaya penggantian sesuai dengan harga barang tersebut.
  </div>

  <br><br><br>
    <table>
        <tr>
            <td style="border: none; text-align: center;">
                Menyetujui<br><br><br>
                @if ($transaction->kondisiBarangMasuk)
                <img src="{{ public_path('storage/' . $transaction->kondisiBarangMasuk->signature_path) }}" width="180" style="margin-bottom: 1rem;" alt="Logo Kost">
                @else
                <br><br><br>
                @endif
                <br><br><br><br>
                Penyewa Kost<br><br>
                Nama: {{ $transaction->users[0]->name ?? '________________' }}
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
