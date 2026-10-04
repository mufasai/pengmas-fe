<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReportController extends Controller
{
    public function index()
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');
        
        $response = Http::withToken($token)->get("{$baseUrl}/api/v1/reports");
        $reports = $response->successful() ? ($response->json('data') ?? []) : [];

        return view('laporan', compact('reports'));
    }

    public function sendReceipt(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required',
            'email' => 'required|email',
        ]);

        $token = session('api_token');
        $baseUrl = config('services.api.base_url');
        
        $response = Http::withToken($token)->post("{$baseUrl}/api/v1/reports/send-receipt", [
            'transaction_id' => $request->transaction_id,
            'email' => $request->email,
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Struk berhasil dikirim ke email tujuan.');
        }

        return back()->with('error', 'Gagal mengirim struk: ' . ($response->json('message') ?? 'Internal Server Error'));
    }
}
