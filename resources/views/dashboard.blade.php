<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kasir</title>

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

        .admin-text strong {
            font-size: 12px;
            display: block;
        }

        .admin-text span {
            font-size: 11px;
            color: #777;
        }

        .main {
            flex: 1;
            padding: 28px 36px;
        }

        .topbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 14px;
            margin-bottom: 45px;
            font-size: 12px;
            color: #333;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #002b78;
        }

        .cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 28px;
        }

        .card {
            background: white;
            border: 1px solid #d6ddeb;
            border-radius: 12px;
            padding: 26px;
        }

        .card-icon {
            width: 38px;
            height: 38px;
            background: #eef6ff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #0067b1;
            font-size: 20px;
        }

        .target {
            float: right;
            background: #eef3ff;
            color: #31558d;
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 11px;
        }

        .card-title {
            font-size: 13px;
            color: #444;
            margin-bottom: 8px;
        }

        .number {
            font-size: 32px;
            font-weight: 800;
            color: #071f4f;
        }

        .note {
            font-size: 11px;
            color: #777;
            margin-top: 12px;
        }

        .report-card {
            background: white;
            border: 1px solid #d6ddeb;
            border-radius: 12px;
            padding: 28px;
        }

        .report-card h3 {
            margin: 0 0 22px;
            color: #002b78;
            font-size: 17px;
        }

        .product {
            display: grid;
            grid-template-columns: 55px 1fr 120px;
            align-items: center;
            margin-bottom: 18px;
        }

        .product img {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            object-fit: cover;
        }

        .product strong {
            font-size: 13px;
            display: block;
            color: #111;
        }

        .product span {
            font-size: 12px;
            color: #555;
        }

        .price {
            text-align: right;
            font-weight: 700;
            color: #002b78;
        }

        .btn-report {
            display: block;
            width: 100%;
            text-align: center;
            border: 1px solid #d7e3f5;
            border-radius: 6px;
            padding: 10px;
            color: #0067b1;
            text-decoration: none;
            font-size: 12px;
            margin-top: 26px;
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

    <main class="main">

        <div class="topbar">
            <div>
                Senin, 24 Mei 2024<br>
                <strong>10.38.18</strong>
            </div>
            <div class="avatar"></div>
        </div>

        <div class="cards">
            <div class="card">
                <span class="target">Target: 200</span>
                <div class="card-icon">▤</div>
                <div class="card-title">Jumlah Transaksi</div>
                <div class="number">142</div>
                <div class="note">Rata-rata: 12 transaksi / jam</div>
            </div>

            <div class="card">
                <div class="card-icon">▣</div>
                <div class="card-title">Rata-rata Struk</div>
                <div class="number">Rp 29.930</div>
                <div class="note">ⓘ Berdasarkan 142 transaksi hari ini</div>
            </div>
        </div>

        <div class="report-card">
            <h3>Produk Terlaris</h3>

            <div class="product">
                <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=100" alt="">
                <div>
                    <strong>Van Houtte Signature Latte</strong>
                    <span>42 Terjual</span>
                </div>
                <div class="price">Rp 1.470k</div>
            </div>

            <div class="product">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=100" alt="">
                <div>
                    <strong>Caramel Macchiato Ice</strong>
                    <span>38 Terjual</span>
                </div>
                <div class="price">Rp 1.330k</div>
            </div>

            <div class="product">
                <img src="https://images.unsplash.com/photo-1549903072-7e6e0bedb7fb?w=100" alt="">
                <div>
                    <strong>Almond Croissant</strong>
                    <span>25 Terjual</span>
                </div>
                <div class="price">Rp 875k</div>
            </div>

            <a href="#" class="btn-report">Lihat Laporan Lengkap</a>
        </div>

    </main>

</div>

</body>
</html>