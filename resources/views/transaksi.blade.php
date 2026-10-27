<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kasir / POS - Cakrawala Eatery & Cafe</title>
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
            overflow-x: hidden;
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
            height: 100vh;
            overflow: hidden;
        }

        .pos-container {
            display: flex;
            flex: 1;
            overflow: hidden;
            position: relative;
            height: calc(100vh - 56px);
        }

        /* Panel Kiri: Menu & Kategori */
        .catalog-panel {
            flex: 1;
            padding: 20px 24px;
            overflow-y: auto;
            min-width: 0;
        }

        .search-bar {
            position: relative;
            margin-bottom: 16px;
        }

        .search-bar i {
            position: absolute;
            left: 14px;
            top: 12px;
            color: #94a3b8;
            font-size: 14px;
        }

        .search-bar input {
            width: 100%;
            max-width: 380px;
            height: 38px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            border-radius: 20px;
            padding: 0 16px 0 38px;
            font-size: 13px;
            outline: none;
            transition: all 0.2s;
        }

        .search-bar input:focus {
            border-color: #0f172a;
            box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.05);
        }

        .category-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
            overflow-x: auto;
            padding-bottom: 6px;
            -webkit-overflow-scrolling: touch;
        }

        .category-tabs::-webkit-scrollbar {
            height: 4px;
        }

        .category-tabs::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .tab-btn {
            padding: 7px 16px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            font-size: 12px;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.15s;
        }

        .tab-btn:hover {
            border-color: #cbd5e1;
            color: #0f172a;
        }

        .tab-btn.active {
            background: #0f172a;
            color: #ffffff;
            border-color: #0f172a;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
            gap: 16px;
        }

        .menu-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.15s, box-shadow 0.15s;
        }

        .menu-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .menu-card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            background: #f1f5f9;
        }

        .menu-body {
            padding: 12px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .menu-name {
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 4px;
            line-height: 1.3;
        }

        .menu-category {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 8px;
        }

        .menu-footer {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .menu-price {
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
        }

        .btn-add-item {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            border: 1px solid #0f172a;
            background: #ffffff;
            color: #0f172a;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            transition: all 0.15s;
        }

        .btn-add-item:hover {
            background: #0f172a;
            color: #ffffff;
        }

        /* Panel Kanan: Keranjang / Pesanan (Manual Book Hal 10-11) */
        .cart-panel {
            width: 350px;
            background: #ffffff;
            border-left: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            height: 100%;
            flex-shrink: 0;
            z-index: 50;
        }

        .cart-header {
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cart-header-left {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cart-header h2 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
        }

        .cart-badge {
            background: #0f172a;
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;
            border-radius: 12px;
            padding: 2px 7px;
        }

        .btn-close-cart {
            display: none;
            background: none;
            border: none;
            color: #64748b;
            font-size: 16px;
            cursor: pointer;
            padding: 4px;
        }

        .cart-items-wrapper {
            flex: 1;
            overflow-y: auto;
            padding: 16px 20px;
        }

        .cart-empty {
            text-align: center;
            padding: 50px 0;
            color: #94a3b8;
        }

        .cart-empty i {
            font-size: 36px;
            margin-bottom: 10px;
            color: #cbd5e1;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid #f8fafc;
        }

        .cart-item-title {
            font-size: 13px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .cart-item-calc {
            font-size: 11px;
            color: #64748b;
        }

        .cart-qty-ctrl {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 6px;
        }

        .btn-qty {
            width: 22px;
            height: 22px;
            border-radius: 4px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-qty:hover {
            background: #f1f5f9;
        }

        .cart-item-total {
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
            text-align: right;
        }

        /* Panel Ringkasan & Tombol Checkout (Manual Book Hal 11) */
        .cart-footer {
            padding: 16px 20px;
            border-top: 1px solid #e2e8f0;
            background: #f8fafc;
        }

        .discount-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 12px;
            color: #475569;
        }

        .discount-input-wrapper {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .discount-input-wrapper input {
            width: 48px;
            height: 28px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            text-align: center;
            font-size: 12px;
            font-weight: 600;
            outline: none;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #64748b;
            margin-bottom: 6px;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            font-size: 15px;
            font-weight: 800;
            color: #0f172a;
            margin: 10px 0 14px;
            padding-top: 8px;
            border-top: 1px dashed #cbd5e1;
        }

        .btn-checkout {
            width: 100%;
            height: 44px;
            background: #0f172a;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.15s;
        }

        .btn-checkout:hover:not(:disabled) {
            background: #000000;
        }

        .btn-checkout:disabled {
            background: #94a3b8;
            cursor: not-allowed;
        }

        .btn-cancel-cart {
            width: 100%;
            background: none;
            border: none;
            color: #64748b;
            font-size: 12px;
            cursor: pointer;
            margin-top: 8px;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-cancel-cart:hover {
            color: #dc2626;
        }

        /* Floating Mobile Cart Bar */
        .mobile-cart-bar {
            display: none;
            position: fixed;
            bottom: 14px;
            left: 14px;
            right: 14px;
            background: #0f172a;
            color: #ffffff;
            border-radius: 14px;
            padding: 12px 18px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.25);
            z-index: 900;
            cursor: pointer;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.2s;
        }

        .mobile-cart-bar:active {
            transform: scale(0.98);
        }

        .m-cart-summary {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .m-cart-icon-badge {
            position: relative;
            font-size: 18px;
        }

        .m-count-badge {
            position: absolute;
            top: -6px;
            right: -8px;
            background: #ef4444;
            color: #ffffff;
            font-size: 10px;
            font-weight: 800;
            padding: 1px 5px;
            border-radius: 10px;
        }

        .m-cart-text {
            display: flex;
            flex-direction: column;
        }

        .m-cart-label {
            font-size: 11px;
            color: #94a3b8;
        }

        .m-cart-total {
            font-size: 14px;
            font-weight: 700;
        }

        .m-cart-btn-open {
            display: flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        /* Cart Backdrop */
        .cart-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(2px);
            z-index: 1140;
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .cart-backdrop.active {
            display: block;
            opacity: 1;
        }

        /* Modals: Pembayaran & Struk (Manual Book Hal 12-14) */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(2px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1300;
            padding: 16px;
        }

        .modal-content {
            background: #ffffff;
            border-radius: 16px;
            width: 100%;
            max-width: 440px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 22px;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .modal-title {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .modal-close {
            background: none;
            border: none;
            color: #94a3b8;
            font-size: 18px;
            cursor: pointer;
            padding: 4px;
        }

        .method-tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 18px;
        }

        .method-tab {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px;
            text-align: center;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            color: #475569;
        }

        .method-tab i {
            font-size: 20px;
        }

        .method-tab.active {
            background: #0f172a;
            color: #ffffff;
            border-color: #0f172a;
        }

        .tagihan-box {
            display: flex;
            justify-content: space-between;
            background: #f8fafc;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .tagihan-box strong {
            font-size: 16px;
            font-weight: 800;
        }

        .quick-amounts {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            margin: 10px 0 16px;
        }

        .quick-btn {
            padding: 8px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .quick-btn:hover {
            border-color: #0f172a;
        }

        .change-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            padding: 10px 14px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            color: #166534;
            font-size: 13px;
            font-weight: 600;
        }

        .qris-warning {
            background: #fffbeb;
            border: 1px solid #fef3c7;
            padding: 12px;
            border-radius: 8px;
            color: #92400e;
            font-size: 12px;
            margin-bottom: 16px;
            display: flex;
            gap: 8px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-modal-cancel {
            padding: 9px 18px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-modal-confirm {
            padding: 9px 20px;
            border: none;
            background: #0f172a;
            color: #ffffff;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        /* Struk Preview */
        .receipt-card {
            background: #fbfbfb;
            border: 1px dashed #cbd5e1;
            padding: 18px;
            border-radius: 8px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .receipt-card h3 {
            margin: 0;
            font-size: 14px;
            text-align: center;
        }

        .receipt-card p {
            margin: 3px 0;
            text-align: center;
            font-size: 11px;
            color: #64748b;
        }

        /* RESPONSIVE BREAKPOINT KHUSUS POS & CART (< 1200px) */
        @media (max-width: 1199px) {
            .btn-close-cart {
                display: block;
            }

            .catalog-panel {
                padding: 16px;
                padding-bottom: 95px; /* Ruang untuk floating mobile cart bar */
            }

            .search-bar input {
                max-width: 100%;
            }

            .cart-panel {
                position: fixed;
                top: 0;
                right: 0;
                width: 100%;
                max-width: 390px;
                height: 100vh;
                height: 100dvh;
                z-index: 1150;
                box-shadow: -6px 0 25px rgba(0, 0, 0, 0.2);
                transform: translateX(100%);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .cart-panel.open {
                transform: translateX(0);
            }

            .mobile-cart-bar {
                display: flex;
            }
        }

        @media (max-width: 640px) {
            .catalog-panel {
                padding: 12px;
                padding-bottom: 95px;
            }

            .menu-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .menu-card img {
                height: 105px;
            }

            .menu-body {
                padding: 8px 10px;
            }

            .menu-name {
                font-size: 12px;
            }

            .menu-price {
                font-size: 12px;
            }

            .cart-panel {
                max-width: 100%;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }
            #receipt-printable, #receipt-printable * {
                visibility: visible;
            }
            #receipt-printable {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="layout">
    @include('layouts.sidebar')

    <div class="main-wrapper">
        @include('layouts.header')

        <div class="pos-container">
            <!-- Katalog Menu (Kiri) -->
            <div class="catalog-panel">
                <div class="search-bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="search-input" placeholder="Cari menu...">
                </div>

                <div class="category-tabs" id="category-tabs">
                    <button class="tab-btn active" onclick="filterCategory('all', this)">Semua</button>
                    @foreach($categories as $cat)
                        <button class="tab-btn" onclick="filterCategory('{{ $cat['id'] }}', this)">{{ $cat['name'] }}</button>
                    @endforeach
                </div>

                <div class="menu-grid" id="menu-grid">
                    @forelse($menus as $menu)
                        <div class="menu-card" data-category="{{ $menu['category_id'] }}" data-name="{{ strtolower($menu['name']) }}">
                            <img src="{{ $menu['image_url'] ?? 'https://via.placeholder.com/200?text=Menu' }}" alt="{{ $menu['name'] }}">
                            <div class="menu-body">
                                <h3 class="menu-name">{{ $menu['name'] }}</h3>
                                <span class="menu-category">{{ $menu['category']['name'] ?? 'Menu' }}</span>
                                <div class="menu-footer">
                                    <span class="menu-price">Rp {{ number_format($menu['price'], 0, ',', '.') }}</span>
                                    <button class="btn-add-item" onclick="addToCart({{ $menu['id'] }}, '{{ addslashes($menu['name']) }}', {{ $menu['price'] }})" title="Tambah ke Pesanan">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #94a3b8;">
                            Belum ada menu yang tersedia.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Backdrop Keranjang untuk Mobile/Tablet -->
            <div id="cart-backdrop" class="cart-backdrop" onclick="toggleCartDrawer(false)"></div>

            <!-- Panel Pesanan / Cart (Kanan - Responsive Drawer on Mobile) -->
            <div class="cart-panel" id="cart-panel">
                <div class="cart-header">
                    <div class="cart-header-left">
                        <h2>Pesanan</h2>
                        <span class="cart-badge" id="cart-count">0</span>
                    </div>
                    <button type="button" class="btn-close-cart" onclick="toggleCartDrawer(false)" title="Tutup Keranjang">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="cart-items-wrapper" id="cart-items">
                    <div class="cart-empty">
                        <i class="fa-solid fa-receipt"></i>
                        <p style="margin: 0; font-size: 13px;">Belum ada pesanan</p>
                    </div>
                </div>

                <div class="cart-footer">
                    <div class="discount-row">
                        <span>Diskon</span>
                        <div class="discount-input-wrapper">
                            <input type="number" id="discount-pct" value="0" min="0" max="100" oninput="calculateTotals()">
                            <span>%</span>
                        </div>
                    </div>

                    <div class="summary-line">
                        <span>Subtotal</span>
                        <strong id="subtotal-text">Rp 0</strong>
                    </div>

                    <div class="summary-line">
                        <span>Diskon</span>
                        <span id="discount-amount-text" style="color: #dc2626;">- Rp 0</span>
                    </div>

                    <div class="summary-total">
                        <span>Total</span>
                        <span id="total-text">Rp 0</span>
                    </div>

                    <button class="btn-checkout" id="btn-checkout" onclick="openPaymentModal()" disabled>
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Proses Pembayaran</span>
                    </button>

                    <button class="btn-cancel-cart" onclick="clearCart()">
                        <i class="fa-solid fa-ban"></i>
                        <span>Batalkan Pesanan</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Floating Bottom Mobile Cart Bar (< 1024px) -->
        <div class="mobile-cart-bar" id="mobile-cart-bar" onclick="toggleCartDrawer(true)">
            <div class="m-cart-summary">
                <div class="m-cart-icon-badge">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <span class="m-count-badge" id="m-count-badge">0</span>
                </div>
                <div class="m-cart-text">
                    <span class="m-cart-label">Keranjang Pesanan</span>
                    <strong class="m-cart-total" id="m-cart-total-text">Rp 0</strong>
                </div>
            </div>
            <button type="button" class="m-cart-btn-open">
                <span>Lihat Pesanan</span>
                <i class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
    </div>
</div>

<!-- Modal Pembayaran (Manual Book Hal 12-14) -->
<div class="modal-overlay" id="modal-payment">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title"><i class="fa-solid fa-wallet"></i> Pembayaran</h3>
            <button class="modal-close" onclick="closeModal('modal-payment')">&times;</button>
        </div>

        <div class="method-tabs">
            <div class="method-tab active" id="tab-tunai" onclick="selectPaymentMethod('Tunai')">
                <i class="fa-solid fa-money-bill-wave"></i>
                <span>Tunai</span>
            </div>
            <div class="method-tab" id="tab-qris" onclick="selectPaymentMethod('QRIS')">
                <i class="fa-solid fa-qrcode"></i>
                <span>QRIS</span>
            </div>
        </div>

        <div class="tagihan-box">
            <span>Total Tagihan:</span>
            <strong id="modal-bill-amount">Rp 0</strong>
        </div>

        <!-- Bagian Tunai -->
        <div id="section-tunai">
            <label style="font-size: 12px; font-weight: 600; display: block; margin-bottom: 6px;">UANG DITERIMA</label>
            <input type="number" id="cash-received" placeholder="0" class="filter-input" style="width: 100%; height: 42px; border: 1px solid #cbd5e1; border-radius: 8px; padding: 0 12px; font-size: 16px; font-weight: 700; margin-bottom: 8px;" oninput="calculateChange()">

            <div class="quick-amounts" id="quick-amount-buttons">
                <!-- Injected via JavaScript -->
            </div>

            <div class="change-box">
                <span>Kembalian:</span>
                <strong id="change-text">Rp 0</strong>
            </div>
        </div>

        <!-- Bagian QRIS -->
        <div id="section-qris" style="display: none;">
            <div class="qris-warning">
                <i class="fa-solid fa-triangle-exclamation" style="margin-top: 2px;"></i>
                <div>
                    <strong>Perhatian — Pembayaran QRIS</strong><br>
                    Pastikan pembayaran QRIS sudah masuk sebelum menekan konfirmasi.
                </div>
            </div>

            <label style="display: flex; align-items: center; gap: 8px; font-size: 13px; margin: 16px 0; cursor: pointer;">
                <input type="checkbox" id="qris-confirmed">
                <span>Saya konfirmasi pembayaran QRIS sudah diterima</span>
            </label>
        </div>

        <div class="modal-actions">
            <button class="btn-modal-cancel" onclick="closeModal('modal-payment')">Batal</button>
            <button class="btn-modal-confirm" id="btn-confirm-payment" onclick="submitTransaction()">
                <i class="fa-solid fa-check"></i> Konfirmasi
            </button>
        </div>
    </div>
</div>

<!-- Modal Struk Pembayaran (Manual Book Hal 12 & 14) -->
<div class="modal-overlay" id="modal-receipt">
    <div class="modal-content" style="max-width: 380px;">
        <div class="modal-header">
            <h3 class="modal-title"><i class="fa-solid fa-receipt"></i> Struk Pembayaran</h3>
            <button class="modal-close" onclick="closeModal('modal-receipt')">&times;</button>
        </div>

        <div class="receipt-card" id="receipt-printable">
            <div style="text-align: center; margin-bottom: 8px;">
                <span style="background:#111;color:#fff;font-weight:bold;font-size:10px;padding:2px 6px;border-radius:4px;">POS</span>
            </div>
            <h3>Cakrawala Eatery & Cafe</h3>
            <p>Jl. Margasana No. 12</p>
            <p id="receipt-time">--</p>
            <p id="receipt-code" style="font-weight: bold; color: #111;">--</p>
            <hr style="border: none; border-top: 1px dashed #cbd5e1; margin: 10px 0;">

            <div id="receipt-items-list" style="margin-bottom: 10px;"></div>

            <hr style="border: none; border-top: 1px dashed #cbd5e1; margin: 10px 0;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                <span>Subtotal:</span>
                <span id="receipt-subtotal">Rp 0</span>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;" id="receipt-discount-row">
                <span>Diskon:</span>
                <span id="receipt-discount">- Rp 0</span>
            </div>
            <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 13px; margin-top: 6px;">
                <span>Total:</span>
                <span id="receipt-total">Rp 0</span>
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: 4px;">
                <span>Metode:</span>
                <span id="receipt-method">Tunai</span>
            </div>
            <p style="margin-top: 14px; text-align: center; font-size: 11px;">Terima kasih telah berkunjung!</p>
        </div>

        <div class="modal-actions" style="justify-content: space-between;">
            <button class="btn-modal-cancel" onclick="newOrder()"><i class="fa-solid fa-rotate-left"></i> Pesanan Baru</button>
            <button class="btn-modal-confirm" onclick="window.print()"><i class="fa-solid fa-print"></i> Cetak</button>
        </div>
    </div>
</div>

<script>
    let cart = {};
    let selectedMethod = 'Tunai';
    let currentTotal = 0;
    let lastTransactionData = null;

    function formatRupiah(num) {
        return 'Rp ' + Number(num).toLocaleString('id-ID');
    }

    // Drawer Cart Toggle (< 1200px)
    function toggleCartDrawer(force) {
        const cartPanel = document.getElementById('cart-panel');
        const backdrop = document.getElementById('cart-backdrop');
        if (!cartPanel || !backdrop) return;

        const isOpen = cartPanel.classList.contains('open');
        const nextState = force !== undefined ? force : !isOpen;

        if (nextState) {
            cartPanel.classList.add('open');
            backdrop.classList.add('active');
            if (window.innerWidth < 1200) document.body.style.overflow = 'hidden';
        } else {
            cartPanel.classList.remove('open');
            backdrop.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // Close cart drawer when resizing to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1200) {
            const cartPanel = document.getElementById('cart-panel');
            const backdrop = document.getElementById('cart-backdrop');
            if (cartPanel) cartPanel.classList.remove('open');
            if (backdrop) backdrop.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    function filterCategory(catId, btn) {
        document.querySelectorAll('#category-tabs .tab-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        document.querySelectorAll('.menu-card').forEach(card => {
            if (catId === 'all' || card.getAttribute('data-category') == catId) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    document.getElementById('search-input').addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase();
        document.querySelectorAll('.menu-card').forEach(card => {
            const name = card.getAttribute('data-name');
            if (name.includes(query)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    });

    function addToCart(id, name, price) {
        if (cart[id]) {
            cart[id].qty += 1;
        } else {
            cart[id] = { id, name, price, qty: 1 };
        }
        renderCart();

        // Feedback pada header cart button dan mobile cart bar jika di bawah 1200px
        if (window.innerWidth < 1200) {
            const bar = document.getElementById('mobile-cart-bar');
            if (bar) {
                bar.style.transform = 'scale(1.03)';
                setTimeout(() => { bar.style.transform = 'none'; }, 200);
            }
            const headerCartBtn = document.getElementById('btn-header-cart');
            if (headerCartBtn) {
                headerCartBtn.style.transform = 'scale(1.15)';
                setTimeout(() => { headerCartBtn.style.transform = 'none'; }, 200);
            }
        }
    }

    function changeQty(id, delta) {
        if (!cart[id]) return;
        cart[id].qty += delta;
        if (cart[id].qty <= 0) {
            delete cart[id];
        }
        renderCart();
    }

    function clearCart() {
        if (confirm('Yakin ingin membatalkan semua pesanan?')) {
            cart = {};
            document.getElementById('discount-pct').value = 0;
            renderCart();
            if (window.innerWidth < 1200) {
                toggleCartDrawer(false);
            }
        }
    }

    function renderCart() {
        const cartEl = document.getElementById('cart-items');
        const items = Object.values(cart);
        let count = 0;
        let subtotal = 0;

        const headerBadge = document.getElementById('header-cart-badge');

        if (items.length === 0) {
            cartEl.innerHTML = `
                <div class="cart-empty">
                    <i class="fa-solid fa-receipt"></i>
                    <p style="margin: 0; font-size: 13px;">Belum ada pesanan</p>
                </div>
            `;
            document.getElementById('cart-count').innerText = 0;
            document.getElementById('m-count-badge').innerText = 0;
            if (headerBadge) headerBadge.innerText = 0;
            document.getElementById('subtotal-text').innerText = 'Rp 0';
            document.getElementById('discount-amount-text').innerText = '- Rp 0';
            document.getElementById('total-text').innerText = 'Rp 0';
            document.getElementById('m-cart-total-text').innerText = 'Rp 0';
            document.getElementById('btn-checkout').disabled = true;
            currentTotal = 0;
            return;
        }

        cartEl.innerHTML = '';
        items.forEach(item => {
            const lineTotal = item.price * item.qty;
            subtotal += lineTotal;
            count += item.qty;

            cartEl.innerHTML += `
                <div class="cart-item">
                    <div>
                        <div class="cart-item-title">${item.name}</div>
                        <div class="cart-item-calc">${formatRupiah(item.price)} x ${item.qty}</div>
                        <div class="cart-qty-ctrl">
                            <button class="btn-qty" onclick="changeQty(${item.id}, -1)">-</button>
                            <span style="font-weight: 700; font-size: 12px;">${item.qty}</span>
                            <button class="btn-qty" onclick="changeQty(${item.id}, 1)">+</button>
                        </div>
                    </div>
                    <div class="cart-item-total">${formatRupiah(lineTotal)}</div>
                </div>
            `;
        });

        document.getElementById('cart-count').innerText = count;
        document.getElementById('m-count-badge').innerText = count;
        if (headerBadge) headerBadge.innerText = count;
        calculateTotals(subtotal);
        document.getElementById('btn-checkout').disabled = false;
    }

    function calculateTotals(calculatedSubtotal) {
        const items = Object.values(cart);
        let subtotal = calculatedSubtotal !== undefined ? calculatedSubtotal : items.reduce((acc, it) => acc + (it.price * it.qty), 0);

        const discountPct = Math.min(100, Math.max(0, Number(document.getElementById('discount-pct').value) || 0));
        const discountAmount = Math.round(subtotal * (discountPct / 100));
        const total = Math.max(0, subtotal - discountAmount);

        currentTotal = total;

        document.getElementById('subtotal-text').innerText = formatRupiah(subtotal);
        document.getElementById('discount-amount-text').innerText = '- ' + formatRupiah(discountAmount);
        document.getElementById('total-text').innerText = formatRupiah(total);
        document.getElementById('m-cart-total-text').innerText = formatRupiah(total);
    }

    function openPaymentModal() {
        if (currentTotal <= 0) return;

        // Tutup drawer cart jika terbuka pada layar kecil
        if (window.innerWidth < 1200) {
            toggleCartDrawer(false);
        }

        document.getElementById('modal-bill-amount').innerText = formatRupiah(currentTotal);
        document.getElementById('cash-received').value = '';
        document.getElementById('change-text').innerText = 'Rp 0';
        document.getElementById('qris-confirmed').checked = false;

        generateQuickAmounts(currentTotal);
        selectPaymentMethod('Tunai');
        document.getElementById('modal-payment').style.display = 'flex';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    function selectPaymentMethod(method) {
        selectedMethod = method;
        if (method === 'Tunai') {
            document.getElementById('tab-tunai').classList.add('active');
            document.getElementById('tab-qris').classList.remove('active');
            document.getElementById('section-tunai').style.display = 'block';
            document.getElementById('section-qris').style.display = 'none';
        } else {
            document.getElementById('tab-qris').classList.add('active');
            document.getElementById('tab-tunai').classList.remove('active');
            document.getElementById('section-qris').style.display = 'block';
            document.getElementById('section-tunai').style.display = 'none';
        }
    }

    function generateQuickAmounts(total) {
        const quickAmounts = [total, 50000, 100000, 200000];
        const uniqueAmounts = [...new Set(quickAmounts)].filter(amt => amt >= total).sort((a,b) => a - b);

        const container = document.getElementById('quick-amount-buttons');
        container.innerHTML = '';
        uniqueAmounts.forEach(amt => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'quick-btn';
            btn.innerText = formatRupiah(amt);
            btn.onclick = () => {
                document.getElementById('cash-received').value = amt;
                calculateChange();
            };
            container.appendChild(btn);
        });
    }

    function calculateChange() {
        const received = Number(document.getElementById('cash-received').value) || 0;
        const change = received - currentTotal;
        document.getElementById('change-text').innerText = formatRupiah(Math.max(0, change));
    }

    async function submitTransaction() {
        if (selectedMethod === 'Tunai') {
            const received = Number(document.getElementById('cash-received').value) || 0;
            if (received < currentTotal) {
                alert('Nominal uang yang diterima kurang dari total tagihan.');
                return;
            }
        } else if (selectedMethod === 'QRIS') {
            if (!document.getElementById('qris-confirmed').checked) {
                alert('Silakan centang konfirmasi pembayaran QRIS terlebih dahulu.');
                return;
            }
        }

        const btn = document.getElementById('btn-confirm-payment');
        btn.disabled = true;
        btn.innerText = 'Menyimpan...';

        const discountPct = Number(document.getElementById('discount-pct').value) || 0;
        const itemsPayload = Object.values(cart).map(it => ({
            product_id: it.id,
            quantity: it.qty,
            notes: ''
        }));

        try {
            const res = await fetch('/transaksi', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    payment_method: selectedMethod,
                    items: itemsPayload,
                    notes: ''
                })
            });

            const data = await res.json();
            if (data.success) {
                closeModal('modal-payment');
                showReceiptModal(data.data);
            } else {
                alert('Gagal membuat transaksi: ' + (data.message || 'Error'));
            }
        } catch (err) {
            alert('Terjadi kesalahan jaringan.');
        } finally {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Konfirmasi';
        }
    }

    function showReceiptModal(trxData) {
        lastTransactionData = trxData;
        const now = new Date();
        document.getElementById('receipt-time').innerText = now.toLocaleString('id-ID');
        document.getElementById('receipt-code').innerText = trxData?.transaction_code || ('TRX-' + now.getTime());

        const itemsList = document.getElementById('receipt-items-list');
        itemsList.innerHTML = '';

        let subtotal = 0;
        Object.values(cart).forEach(it => {
            const line = it.price * it.qty;
            subtotal += line;
            itemsList.innerHTML += `
                <div style="display:flex; justify-content:space-between; margin-bottom: 4px;">
                    <span>${it.name} x ${it.qty}</span>
                    <span>${formatRupiah(line)}</span>
                </div>
            `;
        });

        const discountPct = Number(document.getElementById('discount-pct').value) || 0;
        const discountAmt = Math.round(subtotal * (discountPct / 100));

        document.getElementById('receipt-subtotal').innerText = formatRupiah(subtotal);
        document.getElementById('receipt-discount').innerText = '- ' + formatRupiah(discountAmt);
        document.getElementById('receipt-total').innerText = formatRupiah(currentTotal);
        document.getElementById('receipt-method').innerText = selectedMethod;

        document.getElementById('modal-receipt').style.display = 'flex';
    }

    function newOrder() {
        closeModal('modal-receipt');
        cart = {};
        document.getElementById('discount-pct').value = 0;
        renderCart();
    }
</script>

</body>
</html>