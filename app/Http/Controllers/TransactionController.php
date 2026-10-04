<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    public function index()
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');
        
        // Fetch menus and categories
        $menuResponse = Http::withToken($token)->get("{$baseUrl}/api/v1/menus");
        $menus = $menuResponse->successful() ? ($menuResponse->json('data') ?? []) : [];

        $categoryResponse = Http::withToken($token)->get("{$baseUrl}/api/v1/categories");
        $categories = $categoryResponse->successful() ? ($categoryResponse->json('data') ?? []) : [];

        return view('transaksi', compact('menus', 'categories'));
    }

    public function store(Request $request)
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $response = Http::withToken($token)->post("{$baseUrl}/api/v1/transactions", [
            'payment_method' => $request->payment_method,
            'items' => $request->items,
            'notes' => $request->notes ?? '',
        ]);

        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'data' => $response->json('data')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $response->json('message') ?? 'Gagal membuat transaksi'
        ], $response->status());
    }
}
