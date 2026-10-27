<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Cakrawala Eatery & Cafe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
            width: 100%;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            background: #f8fafc;
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

        @media (max-width: 768px) {
            .main {
                padding: 16px;
            }
            .cards {
                grid-template-columns: 1fr;
                gap: 16px;
            }
        }
    </style>
</head>

<body>

    <div class="layout">
        @include('layouts.sidebar')

        <div class="main-wrapper">
            @include('layouts.header')

            <main class="main">

            <div class="cards">
                <div class="card">
                    <span class="target">Target: {{ $dashboardData['transactions']['target'] ?? 200 }}</span>
                    <div class="card-icon">▤</div>
                    <div class="card-title">Jumlah Transaksi</div>
                    <div class="number">{{ $dashboardData['transactions']['total'] ?? 0 }}</div>
                    <div class="note">Pencapaian: {{ $dashboardData['transactions']['percentage'] ?? 0 }}%</div>
                </div>

                <div class="card">
                    <div class="card-icon">▣</div>
                    <div class="card-title">Rata-rata Struk</div>
                    <div class="number">Rp {{ number_format($dashboardData['average_receipt'] ?? 0, 0, ',', '.') }}
                    </div>
                    <div class="note">ⓘ Berdasarkan {{ $dashboardData['transactions']['total'] ?? 0 }} transaksi hari
                        ini</div>
                </div>
            </div>

            <div class="report-card">
                <h3>Produk Terlaris</h3>

                @if(isset($dashboardData['top_products']) && count($dashboardData['top_products']) > 0)
                    @foreach($dashboardData['top_products'] as $product)
                        <div class="product">
                            <img src="{{ $product['image_url'] ?? 'https://via.placeholder.com/100' }}" alt="">
                            <div>
                                <strong>{{ $product['name'] }}</strong>
                                <span>{{ $product['total_sold'] }} Terjual</span>
                            </div>
                            <div class="price">Rp {{ number_format($product['total_revenue'], 0, ',', '.') }}</div>
                        </div>
                    @endforeach
                @else
                    <p>Belum ada data penjualan.</p>
                @endif

                <a href="{{ url('/laporan') }}" class="btn-report">Lihat Laporan Lengkap</a>
            </div>

            </main>
        </div>
    </div>

</body>

</html>