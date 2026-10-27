<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Struk - Cakrawala Eatery & Cafe</title>
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
            max-width: 1100px;
            width: 100%;
            margin: 0 auto;
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

        .struk-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 24px;
            align-items: start;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .card-title {
            margin: 0 0 18px;
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            height: 40px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 14px;
            font-size: 13px;
            outline: none;
            transition: border-color 0.15s;
        }

        .form-control:focus {
            border-color: #0f172a;
        }

        textarea.form-control {
            height: auto;
            padding: 10px 14px;
            resize: vertical;
        }

        /* Toggle row */
        .toggle-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 0;
            border-top: 1px solid #f1f5f9;
        }

        .toggle-title {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
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
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
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
            transform: translateX(20px);
        }

        .btn-save {
            margin-top: 20px;
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

        /* Receipt Preview */
        .receipt-preview-card {
            background: #ffffff;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            padding: 24px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .receipt-header-center {
            text-align: center;
            margin-bottom: 12px;
        }

        .receipt-logo-badge {
            display: inline-block;
            background: #111827;
            color: #ffffff;
            font-weight: 800;
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .receipt-store-title {
            margin: 0 0 4px;
            font-size: 15px;
            font-weight: 800;
            color: #0f172a;
        }

        .receipt-store-info {
            margin: 2px 0;
            font-size: 11px;
            color: #64748b;
        }

        .receipt-divider {
            border: none;
            border-top: 1px dashed #cbd5e1;
            margin: 12px 0;
        }

        .receipt-line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .receipt-total-line {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            font-weight: 800;
            margin-top: 6px;
            padding-top: 6px;
            border-top: 1px dashed #cbd5e1;
        }

        .receipt-footer-msg {
            text-align: center;
            font-size: 11px;
            color: #64748b;
            margin-top: 16px;
            font-style: italic;
        }

        @media (max-width: 900px) {
            .content {
                padding: 16px;
            }
            .struk-grid {
                grid-template-columns: 1fr;
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
                <h1 class="page-title">Pengaturan Struk</h1>
                <p class="page-subtitle">Atur informasi yang tercetak pada struk pembayaran kasir</p>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ url('/pengaturan/struk') }}" method="POST">
                @csrf
                <div class="struk-grid">
                    <!-- Form Pengaturan -->
                    <div class="card">
                        <h2 class="card-title">Informasi Struk</h2>

                        <div class="form-group">
                            <label class="form-label">Nama Toko / Usaha</label>
                            <input type="text" name="receipt_store_name" id="input-store-name" class="form-control" value="{{ $storeName }}" required oninput="syncPreview()">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <textarea name="receipt_store_address" id="input-store-address" class="form-control" rows="2" oninput="syncPreview()">{{ $storeAddress }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Telepon / WhatsApp</label>
                            <input type="text" name="receipt_store_phone" id="input-store-phone" class="form-control" value="{{ $storePhone }}" oninput="syncPreview()">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pesan Penutup / Footer Struk</label>
                            <input type="text" name="receipt_footer_text" id="input-footer-text" class="form-control" value="{{ $footerText }}" oninput="syncPreview()">
                        </div>

                        <div class="toggle-item">
                            <span class="toggle-title">Tampilkan Logo POS</span>
                            <label class="switch">
                                <input type="checkbox" name="receipt_show_logo" id="toggle-logo" value="1" {{ $showLogo == '1' ? 'checked' : '' }} onchange="syncPreview()">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="toggle-item">
                            <span class="toggle-title">Tampilkan Garis Pajak (PB1 / PPN)</span>
                            <label class="switch">
                                <input type="checkbox" name="receipt_show_tax" id="toggle-tax" value="1" {{ $showTax == '1' ? 'checked' : '' }} onchange="syncPreview()">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="toggle-item">
                            <span class="toggle-title">Tampilkan Metode Pembayaran</span>
                            <label class="switch">
                                <input type="checkbox" name="receipt_show_method" id="toggle-method" value="1" {{ $showMethod == '1' ? 'checked' : '' }} onchange="syncPreview()">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <button type="submit" class="btn-save">
                            <i class="fa-solid fa-check"></i>
                            <span>Simpan Pengaturan</span>
                        </button>
                    </div>

                    <!-- Live Preview Box -->
                    <div class="card" style="background: #fafafa;">
                        <h2 class="card-title"><i class="fa-solid fa-eye" style="margin-right: 6px;"></i> Preview Struk</h2>

                        <div class="receipt-preview-card">
                            <div class="receipt-header-center">
                                <div id="preview-logo-badge" class="receipt-logo-badge" style="{{ $showLogo == '1' ? '' : 'display:none;' }}">POS</div>
                                <h3 class="receipt-store-title" id="preview-store-name">{{ $storeName }}</h3>
                                <p class="receipt-store-info" id="preview-store-address">{{ $storeAddress }}</p>
                                <p class="receipt-store-info" id="preview-store-phone">{{ $storePhone }}</p>
                                <p class="receipt-store-info" style="margin-top: 6px;">{{ date('d M Y, H:i') }} | #TRX-SAMPLE</p>
                            </div>

                            <hr class="receipt-divider">

                            <div class="receipt-line">
                                <span>Mie Ayam Cakrawala x1</span>
                                <span>Rp 12.000</span>
                            </div>
                            <div class="receipt-line">
                                <span>Ikan Nila Bakar x1</span>
                                <span>Rp 25.000</span>
                            </div>

                            <hr class="receipt-divider">

                            <div class="receipt-line">
                                <span>Subtotal:</span>
                                <span>Rp 37.000</span>
                            </div>

                            <div class="receipt-line" id="preview-tax-line" style="{{ $showTax == '1' ? '' : 'display:none;' }}">
                                <span>Pajak (10%):</span>
                                <span>Rp 3.700</span>
                            </div>

                            <div class="receipt-total-line">
                                <span>Total:</span>
                                <span id="preview-total-amount">Rp 40.700</span>
                            </div>

                            <div class="receipt-line" id="preview-method-line" style="margin-top: 6px; {{ $showMethod == '1' ? '' : 'display:none;' }}">
                                <span>Metode:</span>
                                <span>Tunai</span>
                            </div>

                            <div class="receipt-footer-msg" id="preview-footer-text">
                                {{ $footerText }}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

<script>
    function syncPreview() {
        const name = document.getElementById('input-store-name').value;
        const address = document.getElementById('input-store-address').value;
        const phone = document.getElementById('input-store-phone').value;
        const footer = document.getElementById('input-footer-text').value;

        const showLogo = document.getElementById('toggle-logo').checked;
        const showTax = document.getElementById('toggle-tax').checked;
        const showMethod = document.getElementById('toggle-method').checked;

        document.getElementById('preview-store-name').innerText = name || 'Nama Toko';
        document.getElementById('preview-store-address').innerText = address || '-';
        document.getElementById('preview-store-phone').innerText = phone || '-';
        document.getElementById('preview-footer-text').innerText = footer || '';

        document.getElementById('preview-logo-badge').style.display = showLogo ? 'inline-block' : 'none';
        document.getElementById('preview-tax-line').style.display = showTax ? 'flex' : 'none';
        document.getElementById('preview-method-line').style.display = showMethod ? 'flex' : 'none';

        document.getElementById('preview-total-amount').innerText = showTax ? 'Rp 40.700' : 'Rp 37.000';
    }
</script>

</body>
</html>
