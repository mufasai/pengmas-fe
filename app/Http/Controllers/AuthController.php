<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required',
        ]);

        $baseUrl = config('services.api.base_url');

        $response = Http::post("{$baseUrl}/api/v1/login", [
            'login' => $request->login,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $token = $data['access_token'] ?? $data['token'] ?? null;
            
            if ($token) {
                session(['api_token' => $token]);
                if (isset($data['user'])) {
                    session(['user' => $data['user']]);
                }

                $role = $data['user']['role'] ?? 'kasir';
                if ($role === 'kasir') {
                    return redirect()->intended('/transaksi');
                }
                return redirect()->intended('/dashboard');
            }
        }

        return back()
            ->with('error', $response->json('message') ?? 'Username atau password salah!')
            ->withInput($request->only('login'));
    }

    public function logout()
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        if ($token) {
            Http::withToken($token)->post("{$baseUrl}/api/v1/logout");
        }
        
        session()->forget('api_token');
        session()->forget('user');
        
        return redirect('/login');
    }
}
