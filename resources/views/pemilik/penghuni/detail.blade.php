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
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-nowrap">Buku Nikah</th>
                      <th class="text-nowrap">KTP</th>
                      <th class="text-nowrap">Profile</th>
                      <th class="text-nowrap">Terverifikasi</th>
                    </tr>
                  </thead>
                  <tbody>
                        @php
                          $verified = explode(',', $penghuni->verified ?? '');
                          $required = ['ktp', 'buku_nikah', 'profile'];

                          $isVerfied = count(array_intersect($required, $verified)) === count($required);
                        @endphp
                        <tr>
                          <td>
                            <a style="font-size: 12px" data-toggle="modal" data-target="#ktp-{{ $penghuni->id }}">Preview</a> <span style="font-size: 12px">|</span>
                            <a href="{{ route('user.document.download', ['type' => 'ktp', 'id' => $penghuni->id]) }}" style="font-size: 12px">Download</a> <span style="font-size: 12px">|</span>
                            <div class="form-check form-check-inline">
                              <input readonly class="form-check-input readonly verified-checkbox"  data-initial="{{ count(explode(',', $penghuni->verified ?? '')) }}" type="checkbox" data-id="{{ $penghuni->id }}" value="ktp" {{ in_array('ktp', $verified) ? 'checked' : '' }} id="ktp">
                            </div>
                          
                            <div class="modal fade" id="ktp-{{ $penghuni->id }}" tabindex="-1" role="dialog" aria-labelledby="ktpLabel-{{ $penghuni->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel-{{ $penghuni->id }}">Preview Gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-center">
                                    @if ($penghuni->ktp_upload)
                                      <img src="{{ asset('storage/public/images/ktp_upload/' . $penghuni->ktp_upload) }}" alt="Gambar KTP" class="img-fluid rounded" />
                                    @else
                                      <p class="text-muted">Belum ada gambar yang diupload.</p>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <a style="font-size: 12px" data-toggle="modal" data-target="#buku_nikah-{{ $penghuni->id }}">Preview</a> <span style="font-size: 12px">|</span>
                            <a href="{{ route('user.document.download', ['type' => 'buku_nikah', 'id' => $penghuni->id]) }}" style="font-size: 12px">Download</a> <span style="font-size: 12px">|</span>
                            <div class="form-check form-check-inline">
                              <input readonly class="form-check-input readonly verified-checkbox" type="checkbox" id="inlineCheckbox1" data-id="{{ $penghuni->id }}" value="buku_nikah" {{ in_array('buku_nikah', $verified) ? 'checked' : '' }}>
                            </div>
                          
                            <div class="modal fade" id="buku_nikah-{{ $penghuni->id }}" tabindex="-1" role="dialog" aria-labelledby="buku_nikahLabel-{{ $penghuni->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel-{{ $penghuni->id }}">Preview Gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-center">
                                    @if ($penghuni->buku_nikah)
                                      <img src="{{ asset('storage/public/images/buku_nikah/' . $penghuni->buku_nikah) }}" alt="Gambar Buku Nikah" class="img-fluid rounded" />
                                    @else
                                      <p class="text-muted">Belum ada gambar yang diupload.</p>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <a style="font-size: 12px" data-toggle="modal" data-target="#profile-{{ $penghuni->id }}">Preview</a> <span style="font-size: 12px">|</span>
                            <a href="{{ route('user.document.download', ['type' => 'profile', 'id' => $penghuni->id]) }}" style="font-size: 12px">Download</a> <span style="font-size: 12px">|</span>
                            <div class="form-check form-check-inline">
                              <input readonly class="form-check-input readonly verified-checkbox" type="checkbox" id="profile" data-id="{{ $penghuni->id }}" value="profile" {{ in_array('profile', $verified) ? 'checked' : '' }}>
                            </div>
                          
                            <div class="modal fade" id="profile-{{ $penghuni->id }}" tabindex="-1" role="dialog" aria-labelledby="profileLabel-{{ $penghuni->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel-{{ $penghuni->id }}">Preview Gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body text-center">
                                    @if ($penghuni->foto)
                                      <img src="{{ asset('storage/public/images/foto_profile/' . $penghuni->foto) }}" alt="Gambar Buku Nikah" class="img-fluid rounded" />
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