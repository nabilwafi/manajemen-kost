<?php

namespace App\Services\Owner;
use ErrorException;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PenghuniService {

  // Penghuni
  public function penghuni()
  {
    try {
      if (!empty(Auth::user()->kamar->user_id)) {
        $users = User::where('role', 'Pencari')->orderBy('created_at', 'DESC')->get();

        $penghuni = Transaction::whereIn('status',['Proses', 'Proses In', 'Proses Out'])->where('pemilik_id', Auth::user()->kamar->user_id)->orderBy('created_at','DESC')->get();

        return view('pemilik.penghuni.index', compact('penghuni', 'users'));
      } else {
        Session::flash('error','Data Kamar Masih Kosong');
        return redirect('/home');
      }
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }
}