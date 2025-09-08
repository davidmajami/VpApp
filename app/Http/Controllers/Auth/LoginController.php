<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Prikaz login forme
    public function showLoginForm()
    {
        return view('auth.login'); // zameni sa tvojim blade-om
    }

    // Obrada login forme
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); // pravilno loginuje korisnika
            $request->session()->regenerate();
            return redirect()->intended('/main'); // ili tvoja ruta
        }

        return back()->withErrors([
            'username' => 'Pogrešan username ili lozinka.',
        ])->onlyInput('username');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
