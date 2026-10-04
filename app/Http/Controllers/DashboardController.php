<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');
        
        $response = Http::withToken($token)->get("{$baseUrl}/api/v1/dashboard");
        
        $dashboardData = [];
        if ($response->successful()) {
            $dashboardData = $response->json('data') ?? $response->json() ?? [];
        }

        return view('dashboard', compact('dashboardData'));
    }
}
