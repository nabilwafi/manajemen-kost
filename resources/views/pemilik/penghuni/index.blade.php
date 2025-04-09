@extends('layouts.backend.app')
@section('title','Penghuni Kamar')
@section('content')
<section id="basic-datatable">
  <div class="row">
    <div class="col-12"  style="overflow-x: auto">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Data Penghuni
              </h4>
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table zero-configuration" style="width:auto">
                  <thead>
                    <tr>
                      <th width="1%">No</th>
                      <th class="text-nowrap">Nama Penghuni</th>
                      <th class="text-nowrap">Alamat Penghuni</th>
                      <th class="text-nowrap">Pekerjaan</th>
                      <th class="text-nowrap">Penyakit</th>
                      <th class="text-nowrap">Agama</th>
                      <th class="text-nowrap">Terverifikasi</th>
                      <th class="text-nowrap">Status</th>
                      <th class="text-nowrap">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($users as $item)
                        @php
                          $verified = explode(',', $item->verified ?? '');
                          $required = ['ktp', 'buku_nikah', 'profile'];

                          $isVerfied = count(array_intersect($required, $verified)) === count($required);
                        @endphp

                        <tr>
                          <td  data-initial="{{ count(explode(',', $item->verified ?? '')) }}">{{$no}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->alamat_ktp}}</td>
                          <td>{{$item->pekerjaan}}</td>
                          <td>{{$item->penyakit}}</td>
                          <td>{{$item->agama}}</td>
                          <td>
                            @if ($isVerfied)
                            <span class="badge badge-success">terverifikasi</span>
                            @else
                            <span class="badge badge-danger">Belum terverifikasi</span>
                            @endif
                          </td>
                          <td>
                            @if ($item->active)
                            <span class="badge badge-success">Aktif</span>
                            @else
                            <span class="badge badge-danger">Tidak Aktif</span>
                            @endif
                          </td>
                          <td>
                            <a href="/pemilik/penghuni/{{ $item->id }}/detail">Detail</a>
                          </td>
                        </tr>
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

<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Data Penghuni Kamar
              </h4>
          </div>
          <div class="card-content">
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table zero-configuration">
                  <thead>
                    <tr>
                      <th width="1%">No</th>
                      <th class="text-nowrap">Nama Penghuni</th>
                      <th class="text-nowrap">Type Kamar</th>
                      <th class="text-nowrap">Jenis Kamar</th>
                      <th class="text-nowrap">Status</th>
                      <th class="text-nowrap">Lama Sewa</th>
                      <th class="text-nowrap">Register Date</th>
                      <th class="text-nowrap">End Date</th>
                      <th class="text-nowrap">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($penghuni as $item)
                        <tr>
                          <td>{{$no}}</td>
                          <td>
                            <ul>
                              @foreach ($item->users as $user)
                              <li>{{$user->name}}</li>
                              @endforeach
                            </ul>
                          </td>
                          <td>{{$item->kamar->kategori}}</td>
                          <td>{{$item->kamar->jenis_kamar}}</td>
                          <td>
                            @switch($item->status)
                                @case("Proses")
                                    <span class="badge badge-primary">Aktif</span>
                                    @break
                                    @case("Proses In")
                                    <span class="badge badge-info">Verifikasi Masuk</span>
                                    @break
                                    @case('Proses Out')
                                    <span class="badge badge-info">Verifikasi Keluar</span>
                                    @break
                                    @default
                                    @endswitch
                              @if ($item->kondisiBarangMasuk && $item->status == "Proses In")
                                <a target="_blank" class="text-sm" href="/generate-surat-keterangan-masuk/{{$item->id}}">Lihat Dokumen</a>
                                  @if ($item->status == "Proses In")
                                  <form action="/pemilik/verifikasi-form-in/{{ $item->id }}" method="POST">
                                      @csrf
                                      @method("PATCH")
                                      <button type="submit" class="btn btn-primary btn-sm">Verifikasi</button>
                                    </form>
                                    @endif
                                    @endif

                                    @if ($item->kondisiBarangKeluar && $item->status == "Proses Out")
                                <a target="_blank" class="text-sm" href="/generate-surat-keterangan-keluar/{{$item->id}}">Lihat Dokumen</a>
                                  @if ($item->status == "Proses Out")
                                  <form action="/pemilik/verifikasi-form-out/{{ $item->id }}" method="POST">
                                      @csrf
                                      @method("PATCH")
                                      <button type="submit" class="btn btn-primary btn-sm">Verifikasi</button>
                                    </form>
                                    @endif
                                    @endif
                          </td>
                          <td>{{$item->lama_sewa}} Bulan</td>
                          <td>{{Carbon\Carbon::parse($item->tgl_sewa)->format('d-F-Y')}}</td>
                          <td>
                            {{Carbon\Carbon::parse($item->end_date_sewa)->format('d-F-Y')}}
                          </td>
                          <td>
                            <a href="/pemilik/room/{{ $item->key }}/detail">Detail</a>
                          </td>
                        </tr>
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