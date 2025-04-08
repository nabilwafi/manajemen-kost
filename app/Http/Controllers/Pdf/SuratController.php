<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function generate_masuk($transaction_id)
    {
        $transaction = Transaction::with('users', 'kamar', 'pemilik', 'kondisiBarangMasuk')->findOrFail($transaction_id);

        $pdf = Pdf::loadView('pdf.surat_keterangan_masuk', [
            'transaction' => $transaction,
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('Surat_Keterangan_Masuk_' . Auth::user()->name . '.pdf');
    }

    public function generate_keluar($transaction_id)
    {
        $transaction = Transaction::with('user', 'kamar', 'pemilik')->findOrFail($transaction_id);

        $pdf = Pdf::loadView('pdf.surat_keterangan_keluar', [
            'transaction' => $transaction,
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('Surat_Keterangan_Keluar_' . $transaction->user->name . '.pdf');
    }
}
