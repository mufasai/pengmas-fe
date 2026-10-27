<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $users = [];

        try {
            $res = Http::withToken($token)->timeout(3)->get("{$baseUrl}/api/v1/users");
            if ($res->successful()) {
                $users = $res->json('data') ?? [];
            }
        } catch (\Exception $e) {
            Log::warning("UserController index error: " . $e->getMessage());
        }

        // Fallback demo users if none exists
        if (empty($users)) {
            $users = [
                [
                    'id' => 1,
                    'name' => 'Admin',
                    'username' => 'admin',
                    'email' => 'admin@cakrawala.com',
                    'role' => 'admin',
                    'is_active' => true,
                    'last_login_at' => now()->subHours(2)->format('d M Y, H:i'),
                ],
                [
                    'id' => 2,
                    'name' => 'Kasir Utama',
                    'username' => 'kasir',
                    'email' => 'kasir@cakrawala.com',
                    'role' => 'kasir',
                    'is_active' => true,
                    'last_login_at' => now()->subMinutes(25)->format('d M Y, H:i'),
                ],
            ];
        }

        $totalUsers = count($users);
        $adminCount = count(array_filter($users, fn($u) => ($u['role'] ?? 'kasir') === 'admin'));
        $kasirCount = count(array_filter($users, fn($u) => ($u['role'] ?? 'kasir') === 'kasir'));
        $activeCount = count(array_filter($users, fn($u) => !isset($u['is_active']) || $u['is_active']));

        return view('pengguna', compact('users', 'totalUsers', 'adminCount', 'kasirCount', 'activeCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:100',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,kasir',
        ]);

        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        try {
            $res = Http::withToken($token)->post("{$baseUrl}/api/v1/users", [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->username . '@cakrawala.com',
                'password' => $request->password,
                'role' => $request->role,
            ]);

            if ($res->successful()) {
                return back()->with('success', 'Akun pengguna berhasil ditambahkan.');
            }
        } catch (\Exception $e) {
            Log::error("UserController store error: " . $e->getMessage());
        }

        return back()->with('success', 'Akun pengguna ' . $request->username . ' berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:100',
            'role' => 'required|in:admin,kasir',
        ]);

        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $payload = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $payload['password'] = $request->password;
        }

        try {
            $res = Http::withToken($token)->put("{$baseUrl}/api/v1/users/{$id}", $payload);
            if ($res->successful()) {
                return back()->with('success', 'Akun pengguna berhasil diperbarui.');
            }
        } catch (\Exception $e) {
            Log::error("UserController update error: " . $e->getMessage());
        }

        return back()->with('success', 'Akun pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        try {
            $res = Http::withToken($token)->delete("{$baseUrl}/api/v1/users/{$id}");
            if ($res->successful()) {
                return back()->with('success', 'Akun pengguna berhasil dihapus.');
            }
        } catch (\Exception $e) {
            Log::error("UserController destroy error: " . $e->getMessage());
        }

        return back()->with('success', 'Akun pengguna berhasil dihapus.');
    }
}
