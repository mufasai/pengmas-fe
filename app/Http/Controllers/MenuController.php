<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function index()
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');
        
        // Fetch categories
        $categoryResponse = Http::withToken($token)->get("{$baseUrl}/api/v1/categories");
        $categories = $categoryResponse->successful() ? ($categoryResponse->json('data') ?? []) : [];
        
        // Fetch menus
        $menuResponse = Http::withToken($token)->get("{$baseUrl}/api/v1/menus");
        $menus = $menuResponse->successful() ? ($menuResponse->json('data') ?? []) : [];

        return view('menu', compact('categories', 'menus'));
    }

    public function store(Request $request)
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $req = Http::withToken($token);

        if ($request->hasFile('image')) {
            $req->attach(
                'image',
                file_get_contents($request->file('image')->path()),
                $request->file('image')->getClientOriginalName()
            );
        }

        $response = $req->post("{$baseUrl}/api/v1/menus", [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'sku' => $request->sku,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? 'true' : 'false',
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Menu berhasil ditambahkan.');
        }

        return back()->with('error', 'Gagal menambahkan menu.')->withInput();
    }

    public function update(Request $request, $id)
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $req = Http::withToken($token);

        if ($request->hasFile('image')) {
            $req->attach(
                'image',
                file_get_contents($request->file('image')->path()),
                $request->file('image')->getClientOriginalName()
            );
        }

        $response = $req->post("{$baseUrl}/api/v1/menus/{$id}", [
            '_method' => 'PUT',
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'sku' => $request->sku,
            'description' => $request->description,
            'is_active' => $request->has('is_active') ? 'true' : 'false',
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Menu berhasil diperbarui.');
        }

        return back()->with('error', 'Gagal memperbarui menu.')->withInput();
    }

    public function destroy($id)
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $response = Http::withToken($token)->delete("{$baseUrl}/api/v1/menus/{$id}");

        if ($response->successful()) {
            return back()->with('success', 'Menu berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus menu.');
    }
}
