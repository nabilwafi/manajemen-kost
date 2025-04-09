<?php

namespace App\Http\Controllers\Owner;
use ErrorException;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\payment;
use Illuminate\Http\Request;
use App\Services\Owner\PenghuniService;

class PenghuniController extends Controller
{
  protected $penghuni;

  public function __construct(PenghuniService $penghuni)
  {
    $this->penghuni = $penghuni;
  }
    //Penghuni
    public function penghuni()
    {
      try {
        $result = $this->penghuni->penghuni();
        return $result;
      } catch (ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }

    public function detail($id)
    {
      $penghuni = User::where('id', $id)->first();
      $payments = Payment::where('user_id', $id)->get();

      return view('pemilik.penghuni.detail', compact('penghuni', 'payments'));
    }
}
