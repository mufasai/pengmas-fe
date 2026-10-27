<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Cakrawala Eatery & Cafe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f8fafc;
            color: #1e293b;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .content-area {
            padding: 24px;
            flex: 1;
        }

        .page-header {
            margin-bottom: 20px;
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

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: #f1f5f9;
            color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-info .stat-label {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 2px;
        }

        .stat-info .stat-value {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
        }

        .filter-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 220px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 12px;
            top: 11px;
            color: #94a3b8;
            font-size: 14px;
        }

        .search-box input {
            width: 100%;
            height: 38px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 14px 0 34px;
            font-size: 13px;
            outline: none;
        }

        .filter-input {
            height: 38px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 12px;
            font-size: 13px;
            background: #ffffff;
            color: #334155;
            outline: none;
        }

        .btn-filter {
            height: 38px;
            padding: 0 16px;
            border-radius: 8px;
            border: none;
            background: #0f172a;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-reset {
            height: 38px;
            padding: 0 14px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #475569;
            font-size: 13px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .table-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            text-align: left;
        }

        thead {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            padding: 12px 18px;
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        td {
            padding: 14px 18px;
            border-bottom: 1px solid #f1f5f9;
            color: #1e293b;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .badge-method {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-tunai {
            background: #f1f5f9;
            color: #334155;
            border: 1px solid #e2e8f0;
        }

        .badge-qris {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
        }

        .badge-status {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        .empty-state {
            padding: 60px 20px;
            text-align: center;
            color: #94a3b8;
        }

        .empty-state i {
            font-size: 40px;
            margin-bottom: 12px;
            color: #cbd5e1;
        }

        @media (max-width: 1023px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .content-area {
                padding: 16px;
            }
            .table-card {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            table {
                min-width: 580px;
            }
            .search-box {
                min-width: 100%;
            }
            .filter-card {
                gap: 8px;
            }
            .filter-input {
                flex: 1;
                min-width: 130px;
            }
        }
    </style>
</head>
<body>

<div class="layout">
    @include('layouts.sidebar')

    <div class="main-wrapper">
        @include('layouts.header')

        <main class="content-area">
            <div class="page-header">
                <h1 class="page-title">Transaksi</h1>
                <p class="page-subtitle">
                    @if(session('user.role') === 'kasir')
                        Riwayat transaksi penjualan yang dilakukan oleh akun Anda.
                    @else
                        Seluruh riwayat transaksi penjualan toko.
                    @endif
                </p>
            </div>

            <!-- Kartu Statistik (Manual Book Hal 15 & 18) -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-receipt"></i></div>
                    <div class="stat-info">
                        <div class="stat-label">Total Transaksi</div>
                        <div class="stat-value">{{ $summary['total_transactions'] ?? 0 }}</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
                    <div class="stat-info">
                        <div class="stat-label">Pendapatan Hari Ini</div>
                        <div class="stat-value">Rp {{ number_format($summary['today_income'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-coins"></i></div>
                    <div class="stat-info">
                        <div class="stat-label">Tunai</div>
                        <div class="stat-value">{{ $summary['cash_count'] ?? 0 }}</div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-qrcode"></i></div>
                    <div class="stat-info">
                        <div class="stat-label">QRIS</div>
                        <div class="stat-value">{{ $summary['qris_count'] ?? 0 }}</div>
                    </div>
                </div>
            </div>

            <!-- Form Filter Pencarian (Manual Book Hal 15 & 19) -->
            <form method="GET" action="{{ url('/riwayat-transaksi') }}" class="filter-card">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" value="{{ $params['search'] ?? '' }}" placeholder="Cari nomor transaksi...">
                </div>

                <input type="date" name="start_date" value="{{ $params['start_date'] ?? '' }}" class="filter-input" title="Dari Tanggal">
                <input type="date" name="end_date" value="{{ $params['end_date'] ?? '' }}" class="filter-input" title="Sampai Tanggal">

                <select name="payment_method" class="filter-input">
                    <option value="">Semua Metode</option>
                    <option value="Tunai" {{ ($params['payment_method'] ?? '') === 'Tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="QRIS" {{ ($params['payment_method'] ?? '') === 'QRIS' ? 'selected' : '' }}>QRIS</option>
                </select>

                <button type="submit" class="btn-filter">
                    <i class="fa-solid fa-filter"></i>
                    <span>Filter</span>
                </button>

                <a href="{{ url('/riwayat-transaksi') }}" class="btn-reset">
                    <i class="fa-solid fa-rotate-left"></i>
                    <span>Reset</span>
                </a>
            </form>

            <!-- Tabel Riwayat Transaksi (Manual Book Hal 15 & 18) -->
            <div class="table-card">
                <table>
                    <thead>
                        <tr>
                            <th>No. Transaksi</th>
                            <th>Waktu</th>
                            <th>Jumlah Item</th>
                            <th>Metode</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $trx)
                            <tr>
                                <td><strong>{{ $trx['transaction_code'] ?? '-' }}</strong></td>
                                <td style="color:#64748b;">
                                    {{ isset($trx['created_at']) ? \Carbon\Carbon::parse($trx['created_at'])->translatedFormat('d M Y, H:i') : '-' }}
                                </td>
                                <td>
                                    {{ count($trx['items'] ?? $trx['details'] ?? []) }} item
                                </td>
                                <td>
                                    @php $method = $trx['payment_method'] ?? 'Tunai'; @endphp
                                    <span class="badge-method {{ in_array($method, ['QRIS', 'Digital']) ? 'badge-qris' : 'badge-tunai' }}">
                                        {{ $method }}
                                    </span>
                                </td>
                                <td><strong>Rp {{ number_format($trx['total_amount'] ?? 0, 0, ',', '.') }}</strong></td>
                                <td>
                                    <span class="badge-status">Selesai</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fa-regular fa-clipboard"></i>
                                        <p style="margin: 0; font-size: 14px;">Belum ada riwayat transaksi yang ditemukan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

</body>
</html>
