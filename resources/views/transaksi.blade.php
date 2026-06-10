<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f7f8fc;
            color: #071f4f;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background: #eef3ff;
            border-right: 1px solid #d6ddeb;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            padding: 28px 24px;
            font-size: 26px;
            font-weight: 700;
            color: #002b78;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: #1f2f46;
            text-decoration: none;
            font-size: 14px;
        }

        .menu a.active {
            background: #dce7fb;
            color: #002b78;
            border-radius: 0 22px 22px 0;
            font-weight: 600;
        }

        .admin-box {
            border-top: 1px solid #d6ddeb;
            padding: 20px 24px;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .admin-icon {
            width: 34px;
            height: 34px;
            background: #002b78;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content {
            flex: 1;
            padding: 24px;
        }

        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 18px;
        }

        .tabs button {
            border: 1px solid #cfd7e8;
            background: white;
            padding: 8px 18px;
            border-radius: 20px;
            color: #071f4f;
            font-weight: 600;
        }

        .tabs .active {
            background: #002b78;
            color: white;
        }

        .search {
            width: 330px;
            height: 38px;
            border: none;
            border-radius: 22px;
            background: #dce4f5;
            padding: 0 18px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 260px);
            gap: 24px 48px;
        }

        .product-card {
            background: white;
            border: 1px solid #d6ddeb;
            border-radius: 12px;
            padding: 14px;
        }

        .product-card img {
            width: 100%;
            height: 155px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-card h4 {
            margin: 10px 0 3px;
            font-size: 14px;
            color: #111;
        }

        .category {
            font-size: 12px;
            color: #555;
            margin-bottom: 8px;
        }

        .price {
            font-size: 14px;
            font-weight: 700;
            color: #002b78;
            margin-bottom: 10px;
        }

        .add-btn {
            width: 100%;
            height: 34px;
            border: 1px solid #002b78;
            background: white;
            color: #002b78;
            border-radius: 6px;
            font-weight: 700;
            cursor: pointer;
        }

        .order-panel {
            width: 320px;
            background: white;
            padding: 28px 24px;
            border-left: 1px solid #e1e5ef;
        }

        .order-panel h2 {
            margin: 0;
            font-size: 24px;
        }

        .order-code {
            font-size: 12px;
            color: #777;
            margin-bottom: 48px;
        }

        .order-item {
            display: grid;
            grid-template-columns: 1fr auto;
            margin-bottom: 22px;
        }

        .order-item strong {
            font-size: 13px;
            color: #111;
        }

        .order-item span {
            font-size: 12px;
            color: #555;
        }

        .qty {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 8px;
        }

        .qty button {
            width: 22px;
            height: 22px;
            border: 1px solid #d7ddeb;
            background: white;
            border-radius: 6px;
        }

        .order-price {
            font-weight: 700;
            font-size: 14px;
        }

        .summary {
            margin-top: 180px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 24px;
            font-size: 14px;
            color: #555;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            font-weight: 700;
            margin: 25px 0;
        }

        .total span:last-child {
            color: #002b78;
            font-size: 24px;
        }

        .payment {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-bottom: 16px;
        }

        .payment button {
            height: 70px;
            background: white;
            border: 1px solid #cfd7e8;
            border-radius: 10px;
            font-weight: 700;
            color: #002b78;
        }

        .pay-btn {
            width: 100%;
            height: 62px;
            background: #002b78;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="layout">

    <aside class="sidebar">
        <div>
            <div class="brand">Van Houtte</div>

            <nav class="menu">
    <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
        ▦ Dashboard
    </a>

    <a href="{{ url('/transaksi') }}" class="{{ request()->is('transaksi') ? 'active' : '' }}">
        ▤ Transaksi
    </a>

    <a href="{{ url('/menu') }}" class="{{ request()->is('menu') ? 'active' : '' }}">
        ⚒ Menu
    </a>

    <a href="{{ url('/laporan') }}" class="{{ request()->is('laporan') ? 'active' : '' }}">
        ▣ Laporan
    </a>
</nav>
        </div>

        <div class="admin-box">
            <div class="admin-icon">☻</div>
            <div class="admin-text">
                <strong>Admin Kasir</strong>
                <span>Van Houtte Cafe</span>
            </div>
        </div>
    </aside>

    <main class="content">

        <div class="tabs">
            <button class="active">Semua</button>
            <button>Makanan</button>
            <button>Minuman</button>
            <button>Cemilan</button>
        </div>

        <input type="text" class="search" placeholder="🔍  Cari menu...">

        <div class="product-grid">

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?w=500" alt="">
                <h4>Mie Goreng</h4>
                <div class="category">Makanan</div>
                <div class="price">Rp 15.000</div>
                <button class="add-btn">+ Tambah</button>
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=500" alt="">
                <h4>Latte Art Special</h4>
                <div class="category">Minuman</div>
                <div class="price">Rp 25.000</div>
                <button class="add-btn">+ Tambah</button>
            </div>

            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?w=500" alt="">
                <h4>Kentang Goreng</h4>
                <div class="category">Cemilan</div>
                <div class="price">Rp 12.000</div>
                <button class="add-btn">+ Tambah</button>
            </div>

        </div>

    </main>

    <aside class="order-panel">
        <h2>Pesanan Baru</h2>
        <div class="order-code">ID: #VHC-20231024</div>

        <div class="order-item">
            <div>
                <strong>Latte Art Special</strong><br>
                <span>Ice, Less Sugar</span>
                <div class="qty">
                    <button>-</button>
                    <span>1</span>
                    <button>+</button>
                </div>
            </div>
            <div class="order-price">Rp 28.000</div>
        </div>

        <div class="order-item">
            <div>
                <strong>Club Sandwich</strong><br>
                <span>Extra Cheese</span>
                <div class="qty">
                    <button>-</button>
                    <span>2</span>
                    <button>+</button>
                </div>
            </div>
            <div class="order-price">Rp 70.000</div>
        </div>

        <div class="summary">
            <div class="summary-row">
                <span>Subtotal</span>
                <strong>Rp 98.000</strong>
            </div>

            <div class="summary-row">
                <span>Pajak (10%)</span>
                <strong>Rp 9.800</strong>
            </div>

            <div class="total">
                <span>Total</span>
                <span>Rp 107.800</span>
            </div>

            <div class="payment">
                <button>▣<br>Tunai</button>
                <button>◉<br>Digital</button>
            </div>

            <button class="pay-btn">Bayar Sekarang</button>
        </div>
    </aside>

</div>

</body>
</html>