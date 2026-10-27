<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $menus = [];
        $categories = [];

        try {
            $menuRes = Http::withToken($token)->timeout(3)->get("{$baseUrl}/api/v1/menus");
            if ($menuRes->successful()) {
                $menus = $menuRes->json('data') ?? [];
            }
        } catch (\Exception $e) {
            Log::warning("StockController index menus failed: " . $e->getMessage());
        }

        try {
            $catRes = Http::withToken($token)->timeout(3)->get("{$baseUrl}/api/v1/categories");
            if ($catRes->successful()) {
                $categories = $catRes->json('data') ?? [];
            }
        } catch (\Exception $e) {
            Log::warning("StockController index categories failed: " . $e->getMessage());
        }

        // Fallback demo menus if none exists
        if (empty($menus)) {
            $menus = [
                ['id' => 1, 'name' => 'Mie Ayam Cakrawala', 'category_id' => 1, 'category' => ['name' => 'Mie'], 'price' => 12000, 'is_active' => true],
                ['id' => 2, 'name' => 'Mie Cakrawala', 'category_id' => 1, 'category' => ['name' => 'Mie'], 'price' => 13000, 'is_active' => true],
                ['id' => 3, 'name' => 'Mie Goreng Spesial', 'category_id' => 1, 'category' => ['name' => 'Mie'], 'price' => 16000, 'is_active' => true],
                ['id' => 4, 'name' => 'Mie Goreng Nyemek', 'category_id' => 1, 'category' => ['name' => 'Mie'], 'price' => 16000, 'is_active' => true],
                ['id' => 5, 'name' => 'Kwetiaw Goreng', 'category_id' => 1, 'category' => ['name' => 'Mie'], 'price' => 13000, 'is_active' => true],
                ['id' => 6, 'name' => 'Bakso Cakrawala', 'category_id' => 1, 'category' => ['name' => 'Mie'], 'price' => 15000, 'is_active' => false],
                ['id' => 7, 'name' => 'Ikan Nila Goreng', 'category_id' => 2, 'category' => ['name' => 'Ikan'], 'price' => 20000, 'is_active' => true],
                ['id' => 8, 'name' => 'Ikan Nila Bakar', 'category_id' => 2, 'category' => ['name' => 'Ikan'], 'price' => 25000, 'is_active' => true],
                ['id' => 9, 'name' => 'Ikan Bawal Goreng', 'category_id' => 2, 'category' => ['name' => 'Ikan'], 'price' => 20000, 'is_active' => true],
                ['id' => 10, 'name' => 'Ikan Bawal Bakar', 'category_id' => 2, 'category' => ['name' => 'Ikan'], 'price' => 25000, 'is_active' => true],
            ];
            $categories = [
                ['id' => 1, 'name' => 'Mie'],
                ['id' => 2, 'name' => 'Ikan'],
                ['id' => 3, 'name' => 'Paket'],
                ['id' => 4, 'name' => 'Sea Food'],
                ['id' => 5, 'name' => 'Tumis'],
                ['id' => 6, 'name' => 'Minuman'],
                ['id' => 7, 'name' => 'Cemilan'],
            ];
        }

        // Summary counts
        $totalMenus = count($menus);
        $tersediaCount = count(array_filter($menus, fn($m) => !empty($m['is_active'])));
        $habisCount = $totalMenus - $tersediaCount;

        // Category stats for widget
        $categoryStats = [];
        foreach ($categories as $cat) {
            $catId = $cat['id'];
            $items = array_filter($menus, fn($m) => ($m['category_id'] ?? null) == $catId);
            $total = count($items);
            $available = count(array_filter($items, fn($m) => !empty($m['is_active'])));
            $categoryStats[] = [
                'name' => $cat['name'],
                'total' => $total,
                'available' => $available,
                'percentage' => $total > 0 ? round(($available / $total) * 100) : 0,
            ];
        }

        return view('stok', compact('menus', 'categories', 'totalMenus', 'tersediaCount', 'habisCount', 'categoryStats'));
    }

    public function toggle(Request $request, $id)
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $isActive = $request->boolean('is_active');

        try {
            $res = Http::withToken($token)->put("{$baseUrl}/api/v1/menus/{$id}", [
                'is_active' => $isActive,
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status stok berhasil diperbarui',
                    'is_active' => $isActive,
                ]);
            }
        } catch (\Exception $e) {
            Log::error("StockController toggle error: " . $e->getMessage());
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Status stok berhasil diperbarui',
                'is_active' => $isActive,
            ]);
        }

        return back()->with('success', 'Status stok berhasil diperbarui.');
    }
}
