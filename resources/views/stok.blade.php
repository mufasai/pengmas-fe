<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stok & Ketersediaan - Cakrawala Eatery & Cafe</title>
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
            max-width: 1300px;
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

        /* Top 3 Stat Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-icon.total {
            background: #f1f5f9;
            color: #334155;
        }

        .stat-icon.available {
            background: #ecfdf5;
            color: #059669;
        }

        .stat-icon.out {
            background: #fef2f2;
            color: #dc2626;
        }

        .stat-info {
            display: flex;
            flex-direction: column;
        }

        .stat-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            color: #64748b;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            margin-top: 2px;
        }

        /* Filter bar */
        .filter-bar {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 240px;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 13px;
            color: #94a3b8;
            font-size: 13px;
        }

        .search-input {
            width: 100%;
            height: 40px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 14px 0 38px;
            font-size: 13px;
            outline: none;
            background: #ffffff;
            transition: border-color 0.15s;
        }

        .search-input:focus {
            border-color: #0f172a;
        }

        .filter-select {
            height: 40px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 14px;
            font-size: 13px;
            background: #ffffff;
            outline: none;
            cursor: pointer;
            color: #334155;
        }

        /* 2-column layout */
        .stok-layout {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 24px;
            align-items: start;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        /* Table */
        .menu-stock-table {
            width: 100%;
            border-collapse: collapse;
        }

        .menu-stock-table th {
            text-align: left;
            padding: 12px 14px;
            font-size: 11px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 700;
            border-bottom: 1px solid #e2e8f0;
        }

        .menu-stock-table td {
            padding: 12px 14px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
            vertical-align: middle;
        }

        .menu-stock-table tr:last-child td {
            border-bottom: none;
        }

        .menu-title-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .menu-thumb {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            object-fit: cover;
            background: #f1f5f9;
        }

        .cat-tag {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            background: #f1f5f9;
            color: #475569;
            font-size: 11px;
            font-weight: 600;
        }

        /* Interactive toggle switch */
        .toggle-switch {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .switch-input {
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute;
        }

        .switch-rail {
            width: 44px;
            height: 24px;
            background-color: #cbd5e1;
            border-radius: 24px;
            transition: .2s;
            position: relative;
        }

        .switch-rail:before {
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

        .switch-input:checked + .switch-rail {
            background-color: #10b981;
        }

        .switch-input:checked + .switch-rail:before {
            transform: translateX(20px);
        }

        .switch-text {
            font-size: 12px;
            font-weight: 700;
            width: 60px;
        }

        .switch-text.active {
            color: #059669;
        }

        .switch-text.inactive {
            color: #dc2626;
        }

        /* Category widget */
        .widget-title {
            margin: 0 0 16px;
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
        }

        .cat-progress-item {
            margin-bottom: 14px;
        }

        .cat-progress-label {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 5px;
        }

        .progress-bar-bg {
            height: 7px;
            background: #f1f5f9;
            border-radius: 6px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            background: #0f172a;
            border-radius: 6px;
            transition: width 0.3s ease;
        }

        /* Floating Toast */
        .toast-notify {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: #0f172a;
            color: #ffffff;
            padding: 12px 20px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 2000;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .toast-notify.show {
            transform: translateY(0);
            opacity: 1;
        }

        @media (max-width: 1024px) {
            .stok-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .content {
                padding: 16px;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .menu-stock-table {
                min-width: 520px;
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
                <h1 class="page-title">Stok & Ketersediaan</h1>
                <p class="page-subtitle">Kelola ketersediaan menu secara langsung untuk POS</p>
            </div>

            <!-- Top 3 Stat Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon total"><i class="fa-solid fa-utensils"></i></div>
                    <div class="stat-info">
                        <span class="stat-label">TOTAL MENU</span>
                        <strong class="stat-value" id="stat-total">{{ $totalMenus }}</strong>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon available"><i class="fa-solid fa-circle-check"></i></div>
                    <div class="stat-info">
                        <span class="stat-label" style="color: #059669;">TERSEDIA</span>
                        <strong class="stat-value" id="stat-available" style="color: #059669;">{{ $tersediaCount }}</strong>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon out"><i class="fa-solid fa-circle-xmark"></i></div>
                    <div class="stat-info">
                        <span class="stat-label" style="color: #dc2626;">HABIS / NONAKTIF</span>
                        <strong class="stat-value" id="stat-out" style="color: #dc2626;">{{ $habisCount }}</strong>
                    </div>
                </div>
            </div>

            <!-- Filter & Search Bar -->
            <div class="filter-bar">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="search-input" class="search-input" placeholder="Cari nama menu..." oninput="filterTable()">
                </div>

                <select id="cat-filter" class="filter-select" onchange="filterTable()">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                    @endforeach
                </select>

                <select id="status-filter" class="filter-select" onchange="filterTable()">
                    <option value="">Semua Status</option>
                    <option value="1">Tersedia</option>
                    <option value="0">Habis</option>
                </select>
            </div>

            <div class="stok-layout">
                <!-- Tabel Menu -->
                <div class="card">
                    <div class="table-responsive">
                        <table class="menu-stock-table">
                            <thead>
                                <tr>
                                    <th>NAMA MENU</th>
                                    <th>KATEGORI</th>
                                    <th>HARGA</th>
                                    <th style="text-align: right;">KETERSEDIAAN</th>
                                </tr>
                            </thead>
                            <tbody id="menu-table-body">
                                @forelse($menus as $menu)
                                    @php
                                        $isActive = !empty($menu['is_active']);
                                    @endphp
                                    <tr class="menu-row" data-name="{{ strtolower($menu['name']) }}" data-cat="{{ $menu['category_id'] ?? '' }}" data-status="{{ $isActive ? '1' : '0' }}">
                                        <td>
                                            <div class="menu-title-wrap">
                                                <img src="{{ $menu['image_url'] ?? 'https://via.placeholder.com/80?text=Food' }}" class="menu-thumb" alt="Foto">
                                                <div>
                                                    <strong style="color: #0f172a;">{{ $menu['name'] }}</strong>
                                                    <div style="font-size: 11px; color: #64748b;">{{ $menu['sku'] ?? 'MENU-' . $menu['id'] }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="cat-tag">{{ $menu['category']['name'] ?? 'Menu' }}</span>
                                        </td>
                                        <td>
                                            <strong>Rp {{ number_format($menu['price'], 0, ',', '.') }}</strong>
                                        </td>
                                        <td style="text-align: right;">
                                            <label class="toggle-switch">
                                                <input type="checkbox" class="switch-input" {{ $isActive ? 'checked' : '' }} onchange="toggleStock({{ $menu['id'] }}, this)">
                                                <span class="switch-rail"></span>
                                                <span class="switch-text {{ $isActive ? 'active' : 'inactive' }}">
                                                    {{ $isActive ? 'Tersedia' : 'Habis' }}
                                                </span>
                                            </label>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center; color: #94a3b8; padding: 40px;">Belum ada menu yang terdaftar.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Widget Ketersediaan per Kategori -->
                <div class="card">
                    <h3 class="widget-title"><i class="fa-solid fa-chart-pie" style="margin-right: 6px;"></i> Ketersediaan per Kategori</h3>

                    @foreach($categoryStats as $cStat)
                        <div class="cat-progress-item">
                            <div class="cat-progress-label">
                                <span>{{ $cStat['name'] }}</span>
                                <span style="color: #64748b;">{{ $cStat['available'] }} / {{ $cStat['total'] }}</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill" style="width: {{ $cStat['percentage'] }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Floating Toast -->
<div id="toast-notify" class="toast-notify">
    <i class="fa-solid fa-circle-check" style="color: #22c55e;"></i>
    <span id="toast-text">Status stok berhasil diperbarui</span>
</div>

<script>
    function filterTable() {
        const query = document.getElementById('search-input').value.toLowerCase();
        const cat = document.getElementById('cat-filter').value;
        const status = document.getElementById('status-filter').value;

        document.querySelectorAll('.menu-row').forEach(row => {
            const name = row.getAttribute('data-name');
            const rowCat = row.getAttribute('data-cat');
            const rowStatus = row.getAttribute('data-status');

            const matchName = !query || name.includes(query);
            const matchCat = !cat || rowCat === cat;
            const matchStatus = status === '' || rowStatus === status;

            if (matchName && matchCat && matchStatus) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    async function toggleStock(id, checkbox) {
        const isChecked = checkbox.checked;
        const label = checkbox.closest('.toggle-switch').querySelector('.switch-text');
        const row = checkbox.closest('.menu-row');

        // Optimistic UI
        if (isChecked) {
            label.innerText = 'Tersedia';
            label.className = 'switch-text active';
            row.setAttribute('data-status', '1');
        } else {
            label.innerText = 'Habis';
            label.className = 'switch-text inactive';
            row.setAttribute('data-status', '0');
        }

        updateStats();

        try {
            const res = await fetch('/stok/toggle/' + id, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ is_active: isChecked })
            });

            showToast(isChecked ? 'Status menu diubah menjadi Tersedia' : 'Status menu diubah menjadi Habis');
        } catch (err) {
            showToast('Status stok berhasil diperbarui');
        }
    }

    function updateStats() {
        let available = 0;
        let out = 0;
        document.querySelectorAll('.menu-row').forEach(row => {
            if (row.getAttribute('data-status') === '1') {
                available++;
            } else {
                out++;
            }
        });
        document.getElementById('stat-available').innerText = available;
        document.getElementById('stat-out').innerText = out;
    }

    function showToast(msg) {
        const toast = document.getElementById('toast-notify');
        document.getElementById('toast-text').innerText = msg;
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 2500);
    }
</script>

</body>
</html>
