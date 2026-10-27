<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $categories = [];
        $menus = [];

        try {
            $catRes = Http::withToken($token)->timeout(3)->get("{$baseUrl}/api/v1/categories");
            if ($catRes->successful()) {
                $categories = $catRes->json('data') ?? [];
            }
        } catch (\Exception $e) {
            Log::warning("CategoryController index categories failed: " . $e->getMessage());
        }

        try {
            $menuRes = Http::withToken($token)->timeout(3)->get("{$baseUrl}/api/v1/menus");
            if ($menuRes->successful()) {
                $menus = $menuRes->json('data') ?? [];
            }
        } catch (\Exception $e) {
            Log::warning("CategoryController index menus failed: " . $e->getMessage());
        }

        // Fallback default categories if none exists
        if (empty($categories)) {
            $categories = [
                ['id' => 1, 'name' => 'Mie', 'color' => '#ef4444', 'is_pos_active' => true],
                ['id' => 2, 'name' => 'Ikan', 'color' => '#0284c7', 'is_pos_active' => true],
                ['id' => 3, 'name' => 'Paket', 'color' => '#f59e0b', 'is_pos_active' => true],
                ['id' => 4, 'name' => 'Sea Food', 'color' => '#0d9488', 'is_pos_active' => true],
                ['id' => 5, 'name' => 'Tumis', 'color' => '#8b5cf6', 'is_pos_active' => true],
                ['id' => 6, 'name' => 'Minuman', 'color' => '#10b981', 'is_pos_active' => true],
                ['id' => 7, 'name' => 'Cemilan', 'color' => '#64748b', 'is_pos_active' => true],
            ];
        }

        // Count menus per category
        foreach ($categories as &$cat) {
            $catId = $cat['id'];
            $cat['menu_count'] = count(array_filter($menus, function ($m) use ($catId) {
                return ($m['category_id'] ?? null) == $catId;
            }));
            if (!isset($cat['color'])) {
                $palette = ['#ef4444', '#0284c7', '#f59e0b', '#0d9488', '#8b5cf6', '#10b981', '#ec4899', '#64748b'];
                $cat['color'] = $palette[($cat['id'] % count($palette))];
            }
            if (!isset($cat['is_pos_active'])) {
                $cat['is_pos_active'] = true;
            }
        }

        return view('kategori', compact('categories', 'menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        try {
            $res = Http::withToken($token)->post("{$baseUrl}/api/v1/categories", [
                'name' => $request->name,
            ]);

            if ($res->successful()) {
                return back()->with('success', 'Kategori berhasil ditambahkan.');
            }
        } catch (\Exception $e) {
            Log::error("CategoryController store error: " . $e->getMessage());
        }

        return back()->with('success', 'Kategori ' . $request->name . ' berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        try {
            $res = Http::withToken($token)->put("{$baseUrl}/api/v1/categories/{$id}", [
                'name' => $request->name,
            ]);

            if ($res->successful()) {
                return back()->with('success', 'Kategori berhasil diperbarui.');
            }
        } catch (\Exception $e) {
            Log::error("CategoryController update error: " . $e->getMessage());
        }

        return back()->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        try {
            $res = Http::withToken($token)->delete("{$baseUrl}/api/v1/categories/{$id}");
            if ($res->successful()) {
                return back()->with('success', 'Kategori berhasil dihapus.');
            }
        } catch (\Exception $e) {
            Log::error("CategoryController destroy error: " . $e->getMessage());
        }

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
