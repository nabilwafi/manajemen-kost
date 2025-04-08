<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserVerificationController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $verifiedArray = $request->verified ?? [];
        $user->verified = implode(',', $verifiedArray);
        $user->save();

        return response()->json(['status' => 'success', 'verified' => $user->verified]);
    }
}
