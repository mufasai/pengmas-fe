<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    private function getSettings()
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        $settings = [];
        try {
            $res = Http::withToken($token)->timeout(3)->get("{$baseUrl}/api/v1/settings");
            if ($res->successful()) {
                $raw = $res->json('data') ?? [];
                foreach ($raw as $item) {
                    $settings[$item['key']] = $item['value'];
                }
            }
        } catch (\Exception $e) {
            Log::warning("SettingController getSettings error: " . $e->getMessage());
        }

        return $settings;
    }

    private function saveSetting($key, $value)
    {
        $token = session('api_token');
        $baseUrl = config('services.api.base_url');

        try {
            Http::withToken($token)->post("{$baseUrl}/api/v1/settings", [
                'key' => $key,
                'value' => $value,
            ]);
        } catch (\Exception $e) {
            Log::error("SettingController saveSetting error for key {$key}: " . $e->getMessage());
        }
    }

    // 1. Pembayaran
    public function payment()
    {
        $settings = $this->getSettings();

        $cashActive = $settings['payment_cash_active'] ?? '1';
        $qrisActive = $settings['payment_qris_active'] ?? '1';
        $instructionActive = $settings['payment_instruction_active'] ?? '1';
        $instructionText = $settings['payment_instruction_text'] ?? 'Pastikan pembayaran QRIS sudah masuk sebelum menekan konfirmasi';

        return view('pengaturan.pembayaran', compact('cashActive', 'qrisActive', 'instructionActive', 'instructionText'));
    }

    public function updatePayment(Request $request)
    {
        $cashActive = $request->has('payment_cash_active') ? '1' : '0';
        $qrisActive = $request->has('payment_qris_active') ? '1' : '0';
        $instructionActive = $request->has('payment_instruction_active') ? '1' : '0';
        $instructionText = $request->input('payment_instruction_text', '');

        $this->saveSetting('payment_cash_active', $cashActive);
        $this->saveSetting('payment_qris_active', $qrisActive);
        $this->saveSetting('payment_instruction_active', $instructionActive);
        $this->saveSetting('payment_instruction_text', $instructionText);

        return back()->with('success', 'Pengaturan metode pembayaran berhasil disimpan.');
    }

    // 2. Struk
    public function receipt()
    {
        $settings = $this->getSettings();

        $storeName = $settings['receipt_store_name'] ?? 'Cakrawala Eatery & Cafe';
        $storeAddress = $settings['receipt_store_address'] ?? 'Jl. Margasana No. 12, Bandung';
        $storePhone = $settings['receipt_store_phone'] ?? '0812-0000-0000';
        $footerText = $settings['receipt_footer_text'] ?? 'Terima kasih sudah makan di sini';
        $showLogo = $settings['receipt_show_logo'] ?? '1';
        $showTax = $settings['receipt_show_tax'] ?? '1';
        $showMethod = $settings['receipt_show_method'] ?? '1';

        return view('pengaturan.struk', compact('storeName', 'storeAddress', 'storePhone', 'footerText', 'showLogo', 'showTax', 'showMethod'));
    }

    public function updateReceipt(Request $request)
    {
        $storeName = $request->input('receipt_store_name', 'Cakrawala Eatery & Cafe');
        $storeAddress = $request->input('receipt_store_address', '');
        $storePhone = $request->input('receipt_store_phone', '');
        $footerText = $request->input('receipt_footer_text', '');
        $showLogo = $request->has('receipt_show_logo') ? '1' : '0';
        $showTax = $request->has('receipt_show_tax') ? '1' : '0';
        $showMethod = $request->has('receipt_show_method') ? '1' : '0';

        $this->saveSetting('receipt_store_name', $storeName);
        $this->saveSetting('receipt_store_address', $storeAddress);
        $this->saveSetting('receipt_store_phone', $storePhone);
        $this->saveSetting('receipt_footer_text', $footerText);
        $this->saveSetting('receipt_show_logo', $showLogo);
        $this->saveSetting('receipt_show_tax', $showTax);
        $this->saveSetting('receipt_show_method', $showMethod);

        return back()->with('success', 'Pengaturan struk pembayaran berhasil disimpan.');
    }

    // 3. Pajak
    public function tax()
    {
        $settings = $this->getSettings();

        $taxActive = $settings['tax_active'] ?? '1';
        $taxPercentage = $settings['tax_percentage'] ?? '10';

        return view('pengaturan.pajak', compact('taxActive', 'taxPercentage'));
    }

    public function updateTax(Request $request)
    {
        $taxActive = $request->has('tax_active') ? '1' : '0';
        $taxPercentage = $request->input('tax_percentage', '10');

        $this->saveSetting('tax_active', $taxActive);
        $this->saveSetting('tax_percentage', $taxPercentage);

        return back()->with('success', 'Pengaturan pajak berhasil disimpan.');
    }
}
