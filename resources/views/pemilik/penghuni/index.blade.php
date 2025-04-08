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
                      <th class="text-nowrap">Buku Nikah</th>
                      <th class="text-nowrap">KTP</th>
                      <th class="text-nowrap">Profile</th>
                      <th class="text-nowrap">Terverifikasi</th>
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
                            <a style="font-size: 12px" data-toggle="modal" data-target="#ktp-{{ $item->id }}">Preview</a> <span style="font-size: 12px">|</span>
                            <a href="{{ route('user.document.download', ['type' => 'ktp', 'id' => $item->id]) }}" style="font-size: 12px">Download</a> <span style="font-size: 12px">|</span>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input verified-checkbox"  data-initial="{{ count(explode(',', $item->verified ?? '')) }}" type="checkbox" data-id="{{ $item->id }}" value="ktp" {{ in_array('ktp', $verified) ? 'checked' : '' }} id="ktp">
                            </div>
                          
                            <div class="modal fade" id="ktp-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="ktpLabel-{{ $item->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel-{{ $item->id }}">Preview Gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-center">
                                    @if ($item->ktp_upload)
                                      <img src="{{ asset('storage/public/images/ktp_upload/' . $item->ktp_upload) }}" alt="Gambar KTP" class="img-fluid rounded" />
                                    @else
                                      <p class="text-muted">Belum ada gambar yang diupload.</p>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <a style="font-size: 12px" data-toggle="modal" data-target="#buku_nikah-{{ $item->id }}">Preview</a> <span style="font-size: 12px">|</span>
                            <a href="{{ route('user.document.download', ['type' => 'buku_nikah', 'id' => $item->id]) }}" style="font-size: 12px">Download</a> <span style="font-size: 12px">|</span>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input verified-checkbox" type="checkbox" id="inlineCheckbox1" data-id="{{ $item->id }}" value="buku_nikah" {{ in_array('buku_nikah', $verified) ? 'checked' : '' }}>
                            </div>
                          
                            <div class="modal fade" id="buku_nikah-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="buku_nikahLabel-{{ $item->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel-{{ $item->id }}">Preview Gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-center">
                                    @if ($item->buku_nikah)
                                      <img src="{{ asset('storage/public/images/buku_nikah/' . $item->buku_nikah) }}" alt="Gambar Buku Nikah" class="img-fluid rounded" />
                                    @else
                                      <p class="text-muted">Belum ada gambar yang diupload.</p>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <a style="font-size: 12px" data-toggle="modal" data-target="#profile-{{ $item->id }}">Preview</a> <span style="font-size: 12px">|</span>
                            <a href="{{ route('user.document.download', ['type' => 'profile', 'id' => $item->id]) }}" style="font-size: 12px">Download</a> <span style="font-size: 12px">|</span>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input verified-checkbox" type="checkbox" id="profile" data-id="{{ $item->id }}" value="profile" {{ in_array('profile', $verified) ? 'checked' : '' }}>
                            </div>
                          
                            <div class="modal fade" id="profile-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="profileLabel-{{ $item->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel-{{ $item->id }}">Preview Gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-center">
                                    @if ($item->foto)
                                      <img src="{{ asset('storage/public/images/foto_profile/' . $item->foto) }}" alt="Gambar Buku Nikah" class="img-fluid rounded" />
                                    @else
                                      <p class="text-muted">Belum ada gambar yang diupload.</p>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            @if ($isVerfied)
                            <span class="badge badge-success">terverifikasi</span>
                            @else
                            <span class="badge badge-danger">Belum terverifikasi</span>
                            @endif
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