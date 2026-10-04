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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $baseUrl = config('services.api.base_url');

        $response = Http::post("{$baseUrl}/api/v1/login", [
            'login' => $request->email,
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
                return redirect()->intended('/dashboard');
            }
        }

        return back()
            ->with('error', $response->json('message') ?? 'Email atau password salah!')
            ->withInput($request->only('email'));
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
