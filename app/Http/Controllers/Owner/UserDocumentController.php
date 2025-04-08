<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDocumentController extends Controller
{
    public function download($type, $id)
    {
        $user = User::findOrFail($id);

        $validTypes = ['ktp', 'buku_nikah', 'profile'];
        if (!in_array($type, $validTypes)) {
            abort(404, 'Tipe dokumen tidak valid');
        }
        
        $filePath = '';
        $documentPath = '';
        switch ($type) {
            case 'ktp':
                $documentPath = 'ktp_upload/';
                $filePath = $user->ktp_upload;
                break;
            case 'buku_nikah':
                $documentPath = 'buku_nikah/';
                $filePath = $user->buku_nikah;
                break;
            case 'profile':
                $documentPath = 'foto_profile/';
                $filePath = $user->foto;
                break;
            default:
                abort(404, 'Tipe dokumen tidak valid');
                break;
        }

        if (!$filePath || !Storage::exists('public/images/'. $documentPath . $filePath)) {
            return abort(404, 'File tidak ditemukan.');
        }


        return Storage::download('public/images/'. $documentPath . $filePath);
    }
}
