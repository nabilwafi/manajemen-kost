<?php

namespace App\Http\Controllers;

use App\Models\KondisiBarang;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomConditionController extends Controller
{
    public function FormMasuk ($transaction_id)
    {
        $transaction = Transaction::with('users', 'kamar', 'pemilik')->where('id', $transaction_id)->first();

        return view('user.form.form_in', compact('transaction'));
    }

    public function storeMasuk (Request $request, $transaction_id)
    {
        $request->validate([
            'signature' => 'required',
        ]);
    
        $signaturePath = null;
        if ($request->has('signature')) {
            $signatureData = $request->input('signature');
            $signatureData = preg_replace('/^data:image\/\w+;base64,/', '', $signatureData);
            $signatureBinary = base64_decode($signatureData);
    
            $fileName = 'signatures/user_' . Auth::id() . '_' . time() . '.png';
            Storage::put($fileName, $signatureBinary);
            $signaturePath = $fileName;
        }
    
        $barangData = [];
        for ($i = 1; $i <= 25; $i++) {
            $barangData['barang_' . $i] = $request->input('barang_' . $i);
        }
        
        $kondisiBarang = KondisiBarang::where('transaction_id', $transaction_id)->where('type', 'masuk')->first();
        if ($kondisiBarang) {
            $kondisi = new KondisiBarang();
            $kondisi->user_id = Auth::id();
            $kondisi->transaction_id = $transaction_id;
            $kondisi->signature_path = $signaturePath;
            
            foreach ($barangData as $key => $value) {
                $kondisi->$key = $value;
            }
        
            $kondisi->save();
        }else {
            $kondisiBarang->user_id = Auth::id();
            $kondisiBarang->transaction_id = $transaction_id;
            $kondisiBarang->signature_path = $signaturePath;
            
            foreach ($barangData as $key => $value) {
                $kondisiBarang->$key = $value;
            }
        
            $kondisiBarang->save();
        }
    
        return redirect()->to('user/myroom')->with('success', 'Data kondisi barang berhasil disimpan.');
    }

    public function FormKeluar ($transaction_id)
    {
        $transaction = Transaction::with('user', 'kamar', 'pemilik')->where('id', $transaction_id)->first();

        return view('user.form.form_out', compact('transaction'));
    }

    public function storeKeluar (Request $request, $transaction_id)
    {
        $request->validate([
            'signature' => 'required',
        ]);
    
        $signaturePath = null;
        if ($request->has('signature')) {
            $signatureData = $request->input('signature');
            $signatureData = preg_replace('/^data:image\/\w+;base64,/', '', $signatureData);
            $signatureBinary = base64_decode($signatureData);
    
            $fileName = 'signatures/user_' . Auth::id() . '_' . time() . '.png';
            Storage::put($fileName, $signatureBinary);
            $signaturePath = $fileName;
        }
    
        $barangData = [];
        for ($i = 1; $i <= 25; $i++) {
            $barangData['barang_' . $i] = $request->input('barang_' . $i);
        }
    
        $kondisiBarang = KondisiBarang::where('transaction_id', $transaction_id)->where('type', 'keluar')->first();

        if ($kondisiBarang) {
            $kondisi = new KondisiBarang();
            $kondisi->user_id = Auth::id();
            $kondisi->transaction_id = $transaction_id;
            $kondisi->signature_path = $signaturePath;
            
            foreach ($barangData as $key => $value) {
                $kondisi->$key = $value;
            }
        
            $kondisi->save();
        }else {
            $kondisiBarang->user_id = Auth::id();
            $kondisiBarang->transaction_id = $transaction_id;
            $kondisiBarang->signature_path = $signaturePath;
            
            foreach ($barangData as $key => $value) {
                $kondisiBarang->$key = $value;
            }
        
            $kondisiBarang->save();
        }
    
        return redirect()->to('user/myroom')->with('success', 'Data kondisi barang berhasil disimpan.');
    }
}
