<?php

namespace App\Services;
use ErrorException;
use App\Models\{User,DataRekening,Bank};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GlobalService {

  // Profile
  public function profile()
  {
    try {
      $listBank = Bank::all();
      $bank = DataRekening::where('user_id', Auth::id())->get();
      return view('global.profile.index', \compact('bank','listBank'));
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }

  // Profile Update
  public function profileUpdate($id, $data)
  {
    try {
      $result = User::find($id);

      $image = $data->file('foto');
      if($image)
      {
          if($result->foto && file_exists(public_path('images/foto_profile/' . $result->foto))){
              Storage::delete(public_path('images/foto_profile/'. $result->foto));
          }
          $images = time() . "_" . $image->getClientOriginalName();
          // folder penyimpanan
          $tujuan_upload = 'public/images/foto_profile';
          $image->storeAs($tujuan_upload, $images);
          $result->foto = $images;
      }

      $buku_nikah = $data->file('buku_nikah');
      if($buku_nikah)
      {
          if($result->buku_nikah && file_exists(public_path('images/buku_nikah/' . $result->buku_nikah))){
              Storage::delete(public_path('images/buku_nikah/'. $result->buku_nikah));
          }
          $images = time() . "_" . $buku_nikah->getClientOriginalName();

          $tujuan_upload = 'public/images/buku_nikah';
          $buku_nikah->storeAs($tujuan_upload, $images);
          $result->buku_nikah = $images;
      }

      $ktp_upload = $data->file('ktp_upload');
      if($ktp_upload)
      {
          if($result->ktp_upload && file_exists(public_path('images/ktp_upload/' . $result->ktp_upload))){
              Storage::delete(public_path('images/ktp_upload/'. $result->ktp_upload));
          }
          $images = time() . "_" . $ktp_upload->getClientOriginalName();

          $tujuan_upload = 'public/images/ktp_upload';
          $ktp_upload->storeAs($tujuan_upload, $images);
          $result->ktp_upload = $images;
      }

      $result->name   = $data['name'];
      $result->email  = $data['email'];
      $result->no_wa  = $data['no_wa'];
      $result->kontak_darurat  = $data['kontak_darurat'];
      $result->hubungan_kontak  = $data['hubungan_kontak'];
      $result->pekerjaan  = $data['pekerjaan'];
      $result->alamat_ktp  = $data['alamat_ktp'];
      $result->penyakit  = $data['penyakit'];
      $result->agama  = $data['agama'];
      $result->no_ktp = $data['no_ktp'];
      $result->nama_kampus_kantor = $data['nama_kampus_kantor'];
      $result->alamat_kampus_kantor = $data['alamat_kampus_kantor'];
      $result->nama_keluarga = $data['nama_keluarga'];
      $result->alamat_keluarga = $data['alamat_keluarga'];
      $result->update();

      Session::flash('success','Profile berhasil di update.');
      return back();
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }

}