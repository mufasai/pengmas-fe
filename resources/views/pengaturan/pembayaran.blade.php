<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Pembayaran - Cakrawala Eatery & Cafe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f8fafc;
            color: #0f172a;
        }

        .layout {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            background: #f8fafc;
        }

        .content {
            flex: 1;
            padding: 30px;
            max-width: 800px;
            width: 100%;
        }

        .page-header {
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .page-subtitle {
            font-size: 13px;
            color: #64748b;
            margin: 4px 0 0;
        }

        .alert-success {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .section-title {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 16px;
        }

        .method-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .method-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .method-icon {
            width: 44px;
            height: 44px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #0f172a;
        }

        .method-label {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
        }

        .method-desc {
            font-size: 12px;
            color: #64748b;
            margin-top: 2px;
        }

        /* Toggle switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 26px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            inset: 0;
            background-color: #cbd5e1;
            transition: .2s;
            border-radius: 26px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .2s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #0f172a;
        }

        input:checked + .slider:before {
            transform: translateX(22px);
        }

        .instruction-box {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px dashed #e2e8f0;
        }

        .textarea-control {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 13px;
            outline: none;
            margin-top: 10px;
            resize: vertical;
            min-height: 80px;
        }

        .textarea-control:focus {
            border-color: #0f172a;
        }

        .btn-save {
            margin-top: 24px;
            padding: 12px 24px;
            background: #0f172a;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.15s;
        }

        .btn-save:hover {
            background: #000000;
        }

        @media (max-width: 768px) {
            .content {
                padding: 16px;
            }
        }
    </style>
</head>
<body>

<div class="layout">
    @include('layouts.sidebar')

    <div class="main-wrapper">
        @include('layouts.header')

        <main class="content">
            <div class="page-header">
                <h1 class="page-title">Pembayaran</h1>
                <p class="page-subtitle">Atur metode pembayaran yang aktif di kasir</p>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ url('/pengaturan/pembayaran') }}" method="POST">
                @csrf
                <div class="card">
                    <h2 class="section-title">Metode Aktif</h2>

                    <!-- Tunai -->
                    <div class="method-item">
                        <div class="method-info">
                            <div class="method-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
                            <div>
                                <div class="method-label">Tunai</div>
                                <div class="method-desc">Pembayaran langsung dengan uang fisik</div>
                            </div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="payment_cash_active" value="1" {{ $cashActive == '1' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <!-- QRIS -->
                    <div class="method-item">
                        <div class="method-info">
                            <div class="method-icon"><i class="fa-solid fa-qrcode"></i></div>
                            <div>
                                <div class="method-label">QRIS</div>
                                <div class="method-desc">Scan QR semua GoPay, OVO, Dana, ShopeePay, Mobile Banking</div>
                            </div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="payment_qris_active" value="1" {{ $qrisActive == '1' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                    </div>

                    <!-- Instruksi Kasir -->
                    <div class="instruction-box">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <div class="method-label">Instruksi Kasir</div>
                                <div class="method-desc">Tampilkan pesan pengingat kepada kasir saat memilih QRIS</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="payment_instruction_active" value="1" {{ $instructionActive == '1' ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <textarea name="payment_instruction_text" class="textarea-control" placeholder="Contoh: Pastikan pembayaran QRIS sudah masuk sebelum menekan konfirmasi">{{ $instructionText }}</textarea>
                    </div>

                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-check"></i>
                        <span>Simpan Pengaturan</span>
                    </button>
                </div>
            </form>
        </main>
    </div>
</div>

</body>
</html>
