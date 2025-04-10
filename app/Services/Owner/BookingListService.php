<?php

namespace App\Services\Owner;
use ErrorException;
use Carbon\carbon;
use App\Models\{Transaction,kamar,payment,User};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookingListService {

  // Booking List
  public function index()
  {
    try {
      if (!empty(Auth::user()->kamar->id)) {
        $booking = Transaction::with('latestPayment')->where('pemilik_id', Auth::id())->with('users')->orderBy('created_at','DESC')->get();
        return view('pemilik.booking.index', compact('booking'));
      } else {
        Session::flash('error','Data Kamar Masih Kosong');
        return redirect('/home');
      }
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }


  // Konfirmasi Pembayaran
  public function confirm_payment($key)
  {
    try {
      $confirm = Transaction::where('key', $key)->where('status','Pending')->first();
      if ($confirm) {
        return view('pemilik.booking.confirm', compact('confirm'));
      }
      Session::flash('success','Payment Sudah Di Proses');
      return redirect('/pemilik/booking-list');
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }

  // Proses konfirmasi pembayaran
  public function proses_confirm_payment($key)
  {
    try {
      DB::beginTransaction();
      $confirm = Transaction::where('key',$key)->first();

      if($confirm->kondisiBarangMasuk) {
        $confirm->status      = "Proses";

        $confirm->tgl_sewa = $confirm->end_date_sewa;
        $confirm->end_date_sewa = Carbon::parse($confirm->end_date_sewa)->addDays($confirm->hari)->format('d-m-Y');
      }else {
        $confirm->status      = 'Proses In';
      }

      $confirm->updated_at  = Carbon::now();
      $confirm->save();

      if ($confirm && !$confirm->kondisiBarangMasuk) {
        $kamar = kamar::where('id', $confirm->kamar_id)->first();
        $kamar->sisa_kamar = $kamar->sisa_kamar - 1;
        $kamar->save();
      }

      DB::commit();
      Session::flash('success','Konfirmasi Pembayaran Sukses.');
      return redirect('/pemilik/booking-list');
    } catch (ErrorException $e) {
      DB::rollback();
      throw new ErrorException($e->getMessage());
    }
  }

  // Reject konfirmasi pembayaran
  public function reject_confirm_payment($params)
  {
    try {
      $reject = Transaction::findOrFail($params);
      $reject->update([
        'status'      => 'Reject',
        'updated_at'  => carbon::now()
      ]);
      Session::flash('error','Pembayaran Berhasil Di Reject');
      return redirect('/pemilik/booking-list');
    } catch (ErrorException $e) {
      throw new ErrorException($e->getMessage());
    }
  }

  // Done Sewa Kamar
  public function doneSewa($params)
  {
    try {
      DB::beginTransaction();
      $done = Transaction::with('kamar')->findOrFail($params);
      $done->update([
        'status'      => 'Proses Out',
        'updated_at'  => carbon::now()
      ]);

      DB::commit();
      Session::flash('error','Kamar Berhasil Di Update');
      return redirect('/pemilik/booking-list');
    } catch (ErrorException $e) {
      DB::rollback();
      throw new ErrorException($e->getMessage());
    }
  }
}