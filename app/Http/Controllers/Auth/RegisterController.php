<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_kanji' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $validated['name_kanji'],
            'name_kanji' => $validated['name_kanji'],
            'name_kana' => $validated['name_kana'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'company_id' => 1,
        ]);
        return redirect()->route('register')->with('success', '会員登録が完了しました。');
    }
}
