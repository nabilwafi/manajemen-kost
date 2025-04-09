@extends('layouts.backend.app')
@section('title','Penghuni Kamar')
@section('content')
<section id="basic-datatable">
  <div class="row">
    @foreach ($transaction->users as $penghuni)
    <div class="col-12"  style="overflow-x: auto">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Profile Penghuni
              </h4>
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <img width="250" src="{{ asset('storage/public/images/foto_profile/'. $penghuni->foto) }}" alt="">

                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <label for="Nama Bank">Nama</label>
                        <input readonly type="text" name="name" class="form-control" value="{{$penghuni->name}}">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <label for="Email">Email</label>
                        <input readonly type="email" name="email" value="{{$penghuni->email}}" class="form-control" placeholder="Email">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <label for="agama">Agama</label>
                        <select disabled name="agama" class="form-control">
                          @php
                            $listAgama = ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'];
                            $agamaUser = $penghuni->agama ?? '';
                          @endphp
                          @foreach ($listAgama as $agama)
                            <option value="{{ $agama }}" {{ $agamaUser === $agama ? 'selected' : '' }}>{{ $agama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <label for="Email">No. KTP (NIK)</label>
                        <input readonly type="test" name="no_ktp" value="{{$penghuni->no_ktp}}" class="form-control" placeholder="Nik">
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <div class="controls">
                        <label for="nomor wa">Alamat</label>
                        <input readonly type="text" name="alamat_ktp" value="{{$penghuni->alamat_ktp}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <div class="controls">
                        <label for="nomor wa">Nomor WhatsApp</label>
                        <input readonly type="number" name="no_wa" value="{{$penghuni->no_wa ?? '0'}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-12 my-2">
                    <h6>Kontak Darurat</h6>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <label for="nomor wa">Nama Keluarga</label>
                        <input readonly type="text" name="nama_keluarga" value="{{$penghuni->nama_keluarga}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <label for="nomor wa">Alamat Keluarga</label>
                        <input readonly type="text" name="alamat_keluarga" value="{{$penghuni->alamat_keluarga}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <label for="nomor wa">No. Kontak Darurat</label>
                        <input readonly type="number" name="kontak_darurat" value="{{$penghuni->kontak_darurat ?? '0'}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  @php
                      $hubunganList = [
                          'Ibu Kandung',
                          'Ayah Kandung',
                          'Saudara Kandung',
                          'Pasangan',
                          'Teman Dekat',
                          'Kerabat',
                          'Wali',
                          'Atasan Kantor',
                          'Rekan Kerja',
                          'Lainnya',
                      ];

                      $selectedHubungan = $penghuni->hubungan_kontak;
                  @endphp

                  <div class="form-group col-sm-12 col-md-6">
                      <label for="hubungan_kontak">Hubungan Kontak</label>
                      <select disabled name="hubungan_kontak" id="hubungan_kontak" class="form-control form-select">
                          <option value="">-- Pilih Hubungan --</option>
                          @foreach ($hubunganList as $hubungan)
                              <option value="{{ $hubungan }}" {{ $selectedHubungan === $hubungan ? 'selected' : '' }}>
                                  {{ $hubungan }}
                              </option>
                          @endforeach
                      </select>
                  </div>

                  <div class="col-12 my-2">
                    <h6>Data Lainnya</h6>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <label for="nomor wa">Pekerjaan</label>
                        <input readonly type="text" name="pekerjaan" value="{{$penghuni->pekerjaan}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                      <div class="controls">
                        <label for="nomor wa">Nama Kampus/Kantor</label>
                        <input readonly type="text" name="nama_kampus_kantor" value="{{$penghuni->nama_kampus_kantor}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <div class="controls">
                        <label for="nomor wa">Alamat Kampus/Kantor</label>
                        <input readonly type="text" name="alamat_kampus_kantor" value="{{$penghuni->alamat_kampus_kantor}}" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <div class="controls">
                        <label for="nomor wa">Penyakit yang diderita</label>
                        <input readonly type="text" name="penyakit" value="{{$penghuni->penyakit}}" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    @endforeach

    <div class="col-12"  style="overflow-x: auto">
      <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Tagihan
            </h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <div class="table-responsive">
              <table class="table zero-configuration">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th class="text-nowrap">Nomor Transaksi</th>
                    <th class="text-nowrap">Nama Kamar</th>
                    <th class="text-nowrap">Harga</th>
                    <th class="text-nowrap">Tanggal Bayar</th>
                    <th class="text-nowrap">Tanggal Berakhir Sewa</th>
                    <th class="text-nowrap">Keterangan</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Bukti Bayar</th>
                    <th class="text-nowrap">Status Keterlambatan</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no=1;
                  @endphp
                  @foreach ($transaction->payments as $tagihans)
                      @if ($tagihans->status == "Pending")
                        @php
                          $tglBayar = Carbon\Carbon::parse($tagihans->tgl_transfer)->startOfDay();
                          $endDateSewa = Carbon\Carbon::parse($tagihans->end_date_sewa)->startOfDay();
                        @endphp

                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$tagihans->transaction->transaction_number}}</td>
                          <td>{{$tagihans->transaction->kamar->nama_kamar}}</td>
                          <td>{{rupiah($tagihans->transaction->harga_total)}}</td>
                          <td>{{Carbon\Carbon::parse($tagihans->tgl_transfer)->format('d-F-Y')}}</td>
                          <td>{{Carbon\Carbon::parse($tagihans->end_date_sewa)->format('d-F-Y')}}</td>
                          <td>{{$tagihans->transaction->lama_sewa}} Bulan</td>
                          <td>
                            @if ($tagihans->status == "Success")
                            <span class="badge badge-success">Success</span>
                            @elseif ($tagihans->status == "Cancel")
                            <span class="badge badge-danger">Cancel/Gagal</span>
                            @else
                            <span class="badge badge-warning">Pending</span>
                            @endif
                          </td>
                          <td>
                            <a target="_blank" href="{{asset('storage/public/images/bukti_bayar/'. $tagihans->bukti_bayar)}}">Show</a>
                          </td>
                          <td>
                            @if ($tglBayar->gt($endDateSewa))
                            @php
                              $terlambatHari = $endDateSewa->diffInDays($tglBayar);
                              @endphp
                              <span class="badge badge-danger">Terlambat {{ round($terlambatHari) }} hari</span>
                            @else
                                <span class="badge badge-success">Tepat Waktu</span>
                            @endif
                          </td>
                        </tr>
                      @endif
                      @php
                        $no++;
                      @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12"  style="overflow-x: auto">
      <div class="card">
        <div class="card-header">
            <h4 class="card-title">History Pembayaran
            </h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard">
            <div class="table-responsive">
              <table class="table zero-configuration">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th class="text-nowrap">Nomor Transaksi</th>
                    <th class="text-nowrap">Nama Kamar</th>
                    <th class="text-nowrap">Harga</th>
                    <th class="text-nowrap">Tanggal Bayar</th>
                    <th class="text-nowrap">Tanggal Berakhir Sewa</th>
                    <th class="text-nowrap">Keterangan</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Bukti Bayar</th>
                    <th class="text-nowrap">Status Keterlambatan</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no=1;
                  @endphp
                  @foreach ($transaction->payments as $tagihans)
                      @if ($tagihans->status == "Success" || $tagihans->status == "Cancel")
                        @php
                          $tglBayar = Carbon\Carbon::parse($tagihans->tgl_transfer)->startOfDay();
                          $endDateSewa = Carbon\Carbon::parse($tagihans->end_date_sewa)->startOfDay();
                        @endphp

                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$tagihans->transaction->transaction_number}}</td>
                          <td>{{$tagihans->transaction->kamar->nama_kamar}}</td>
                          <td>{{rupiah($tagihans->transaction->harga_total)}}</td>
                          <td>{{Carbon\Carbon::parse($tagihans->tgl_transfer)->format('d-F-Y')}}</td>
                          <td>{{Carbon\Carbon::parse($tagihans->end_date_sewa)->format('d-F-Y')}}</td>
                          <td>{{$tagihans->transaction->lama_sewa}} Bulan</td>
                          <td>
                            @if ($tagihans->status == "Success")
                            <span class="badge badge-success">Success</span>
                            @elseif ($tagihans->status == "Cancel")
                            <span class="badge badge-danger">Cancel/Gagal</span>
                            @else
                            <span class="badge badge-warning">Pending</span>
                            @endif
                          </td>
                          <td>
                            <a target="_blank" href="{{asset('storage/public/images/bukti_bayar/'. $tagihans->bukti_bayar)}}">Show</a>
                          </td>
                          <td>
                            @if ($tglBayar->gt($endDateSewa))
                            @php
                              $terlambatHari = $endDateSewa->diffInDays($tglBayar);
                              @endphp
                              <span class="badge badge-danger">Terlambat {{ round($terlambatHari) }} hari</span>
                            @else
                                <span class="badge badge-success">Tepat Waktu</span>
                            @endif
                          </td>
                        </tr>
                      @endif
                      @php
                        $no++;
                      @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
  document.querySelectorAll('.verified-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', function () {
      const userId = this.dataset.id;
  
      const allCheckboxes = document.querySelectorAll(`.verified-checkbox[data-id="${userId}"]`);
      const verified = [];
  
      allCheckboxes.forEach(cb => {
          if (cb.checked) {
              verified.push(cb.value);
          }
      });

      const initialCount = parseInt(document.querySelector(`.verified-checkbox[data-id="${userId}"]`).dataset.initial);
      const currentCount = verified.length;
      
      fetch(`update-verified/${userId}`, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ verified: verified })
      })
      .then(res => res.json())
      .then(data => {
        if (initialCount !== currentCount && (initialCount === 3 || currentCount === 3)) {
        location.reload();
      }
      });
    })
  })
</script>
@endsection