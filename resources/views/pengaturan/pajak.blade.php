<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Pajak - Cakrawala Eatery & Cafe</title>
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
            max-width: 720px;
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

        .tax-toggle-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 20px;
        }

        .tax-header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .tax-icon-box {
            width: 44px;
            height: 44px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #0f172a;
        }

        .tax-label {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
        }

        .tax-desc {
            font-size: 12px;
            color: #64748b;
            margin-top: 2px;
        }

        /* Switch */
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }

        .tax-input-wrap {
            position: relative;
            max-width: 200px;
        }

        .tax-input {
            width: 100%;
            height: 42px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 34px 0 14px;
            font-size: 15px;
            font-weight: 700;
            outline: none;
            transition: border-color 0.15s;
        }

        .tax-input:focus {
            border-color: #0f172a;
        }

        .tax-unit {
            position: absolute;
            right: 14px;
            top: 11px;
            color: #64748b;
            font-size: 14px;
            font-weight: 700;
        }

        .help-text {
            font-size: 11px;
            color: #64748b;
            margin-top: 6px;
        }

        /* Preview box */
        .preview-box {
            background: #fffbeb;
            border: 1px solid #fef3c7;
            border-radius: 10px;
            padding: 16px 18px;
            margin-top: 10px;
        }

        .preview-title {
            font-size: 12px;
            font-weight: 700;
            color: #92400e;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .preview-calc {
            font-size: 13px;
            color: #78350f;
            font-weight: 600;
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
                <h1 class="page-title">Pajak</h1>
                <p class="page-subtitle">Atur pajak yang diterapkan pada setiap transaksi kasir</p>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ url('/pengaturan/pajak') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="tax-toggle-item">
                        <div class="tax-header-left">
                            <div class="tax-icon-box"><i class="fa-solid fa-percent"></i></div>
                            <div>
                                <div class="tax-label">Pajak</div>
                                <div class="tax-desc">Aktifkan atau nonaktifkan pengenaan pajak pada transaksi</div>
                            </div>
                        </div>
                        <label class="switch">
                            <input type="checkbox" name="tax_active" id="tax-active-switch" value="1" {{ $taxActive == '1' ? 'checked' : '' }} onchange="updateCalc()">
                            <span class="slider"></span>
                        </label>
                    </div>

                    <div class="form-group" id="tax-field-section">
                        <label class="form-label">Tarif Pajak (%)</label>
                        <div class="tax-input-wrap">
                            <input type="number" name="tax_percentage" id="tax-pct-input" class="tax-input" value="{{ $taxPercentage }}" min="0" max="100" step="0.5" required oninput="updateCalc()">
                            <span class="tax-unit">%</span>
                        </div>
                        <div class="help-text">PPN / pajak restoran (PB1) yang berlaku secara umum</div>
                    </div>

                    <div class="preview-box">
                        <div class="preview-title">
                            <i class="fa-solid fa-calculator"></i>
                            <span>Preview Perhitungan</span>
                        </div>
                        <div class="preview-calc" id="preview-calculation-text">
                            Subtotal Rp 75.000 + Pajak 10% (Rp 7.500) = Rp 82.500
                        </div>
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

<script>
    function updateCalc() {
        const isActive = document.getElementById('tax-active-switch').checked;
        const pct = Math.max(0, Number(document.getElementById('tax-pct-input').value) || 0);

        const subtotal = 75000;
        const taxAmount = isActive ? Math.round(subtotal * (pct / 100)) : 0;
        const total = subtotal + taxAmount;

        const calcEl = document.getElementById('preview-calculation-text');

        if (!isActive) {
            calcEl.innerText = `Pajak Nonaktif: Subtotal Rp ${subtotal.toLocaleString('id-ID')} (Tidak dikenakan pajak) = Rp ${subtotal.toLocaleString('id-ID')}`;
        } else {
            calcEl.innerText = `Subtotal Rp ${subtotal.toLocaleString('id-ID')} + Pajak ${pct}% (Rp ${taxAmount.toLocaleString('id-ID')}) = Rp ${total.toLocaleString('id-ID')}`;
        }
    }

    updateCalc();
</script>

</body>
</html>
