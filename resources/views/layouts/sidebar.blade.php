@php
    $user = session('user', []);
    $role = $user['role'] ?? 'kasir';
    $name = $user['name'] ?? ($role === 'admin' ? 'Admin' : 'Kasir');
    $username = $user['username'] ?? $name;
@endphp

<style>
    .sidebar {
        width: 230px;
        background: #ffffff;
        border-right: 1px solid #e5e7eb;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 100vh;
        position: sticky;
        top: 0;
        flex-shrink: 0;
        z-index: 1000;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .brand-section {
        padding: 18px 20px 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #f3f4f6;
    }

    .brand-logo-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .brand-badge {
        background: #111827;
        color: #ffffff;
        font-weight: 800;
        font-size: 11px;
        padding: 4px 7px;
        border-radius: 6px;
    }

    .brand-title {
        font-size: 15px;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }

    .btn-close-sidebar {
        display: none;
        background: none;
        border: none;
        color: #9ca3af;
        font-size: 16px;
        cursor: pointer;
        padding: 4px 6px;
        border-radius: 6px;
    }

    .btn-close-sidebar:hover {
        background: #f3f4f6;
        color: #111827;
    }

    .kasir-profile {
        padding: 16px 20px;
        border-bottom: 1px solid #f3f4f6;
    }

    .kasir-profile h3 {
        margin: 0;
        font-size: 14px;
        font-weight: 700;
        color: #111827;
    }

    .kasir-profile p {
        margin: 2px 0 0;
        font-size: 12px;
        color: #6b7280;
    }

    .nav-group-title {
        padding: 16px 20px 6px;
        font-size: 10px;
        font-weight: 800;
        color: #9ca3af;
        letter-spacing: 0.8px;
        text-transform: uppercase;
    }

    .sidebar-menu {
        display: flex;
        flex-direction: column;
        padding: 6px 12px;
        gap: 4px;
    }

    .sidebar-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 9px 14px;
        border-radius: 8px;
        color: #374151;
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.15s ease;
    }

    .sidebar-item i {
        font-size: 15px;
        width: 18px;
        text-align: center;
        color: #6b7280;
    }

    .sidebar-item:hover {
        background: #f3f4f6;
        color: #111827;
    }

    .sidebar-item.active {
        background: #111827;
        color: #ffffff;
        font-weight: 600;
    }

    .sidebar-item.active i {
        color: #ffffff;
    }

    .sidebar-footer {
        padding: 16px 20px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-logout-sidebar {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        background: none;
        border: none;
        padding: 8px 10px;
        color: #dc2626;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border-radius: 6px;
        transition: background 0.15s;
    }

    .btn-logout-sidebar:hover {
        background: #fee2e2;
    }

    /* Backdrop untuk mobile/tablet */
    .sidebar-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.45);
        backdrop-filter: blur(2px);
        z-index: 998;
        opacity: 0;
        transition: opacity 0.25s ease;
    }

    .sidebar-backdrop.active {
        display: block;
        opacity: 1;
    }

    /* Responsive Breakpoint: Layar di bawah 1200px (Tablet & Mobile) */
    @media (max-width: 1199px) {
        .btn-close-sidebar {
            display: block;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            height: 100dvh;
            width: 260px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transform: translateX(-100%);
            z-index: 1200;
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .sidebar-backdrop {
            z-index: 1198;
        }
    }
</style>

<!-- Backdrop overlay -->
<div id="sidebar-backdrop" class="sidebar-backdrop" onclick="toggleSidebar(false)"></div>

<aside class="sidebar" id="main-sidebar">
    <div style="overflow-y: auto; flex: 1;">
        <div class="brand-section">
            <div class="brand-logo-wrap">
                <span class="brand-badge">POS</span>
                <span class="brand-title">Cakrawala</span>
            </div>
            <button type="button" class="btn-close-sidebar" onclick="toggleSidebar(false)" title="Tutup Menu">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        @if($role === 'kasir')
            <!-- Tampilan Sidebar Khusus Kasir (Manual Book Hal 15) -->
            <div class="kasir-profile">
                <h3>Kasir</h3>
                <p>{{ $username }}</p>
            </div>

            <nav class="sidebar-menu" style="margin-top: 8px;">
                <a href="{{ url('/transaksi') }}" class="sidebar-item {{ request()->is('transaksi') || request()->is('pos') ? 'active' : '' }}">
                    <i class="fa-solid fa-table-cells-large"></i>
                    <span>Kasir / POS</span>
                </a>

                <a href="{{ url('/riwayat-transaksi') }}" class="sidebar-item {{ request()->is('riwayat-transaksi*') ? 'active' : '' }}">
                    <i class="fa-regular fa-clock"></i>
                    <span>Transaksi</span>
                </a>
            </nav>
        @else
            <!-- Tampilan Sidebar Khusus Admin (Manual Book Hal 16-17) -->
            <div class="nav-group-title">Operasional</div>
            <nav class="sidebar-menu">
                <a href="{{ url('/transaksi') }}" class="sidebar-item {{ request()->is('transaksi') || request()->is('pos') ? 'active' : '' }}">
                    <i class="fa-solid fa-table-cells-large"></i>
                    <span>Kasir / POS</span>
                </a>
                <a href="{{ url('/dashboard') }}" class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ url('/riwayat-transaksi') }}" class="sidebar-item {{ request()->is('riwayat-transaksi*') ? 'active' : '' }}">
                    <i class="fa-regular fa-clock"></i>
                    <span>Transaksi</span>
                </a>
                <a href="{{ url('/laporan') }}" class="sidebar-item {{ request()->is('laporan*') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Laporan</span>
                </a>
            </nav>

            <div class="nav-group-title">Master Data</div>
            <nav class="sidebar-menu">
                <a href="{{ url('/menu') }}" class="sidebar-item {{ request()->is('menu*') ? 'active' : '' }}">
                    <i class="fa-solid fa-utensils"></i>
                    <span>Menu</span>
                </a>
                <a href="{{ url('/kategori') }}" class="sidebar-item {{ request()->is('kategori*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tags"></i>
                    <span>Kategori</span>
                </a>
                <a href="{{ url('/stok') }}" class="sidebar-item {{ request()->is('stok*') ? 'active' : '' }}">
                    <i class="fa-solid fa-box-archive"></i>
                    <span>Stok & Ketersediaan</span>
                </a>
            </nav>

            <div class="nav-group-title">Pengaturan</div>
            <nav class="sidebar-menu">
                <a href="{{ url('/pengaturan/pembayaran') }}" class="sidebar-item {{ request()->is('pengaturan/pembayaran*') ? 'active' : '' }}">
                    <i class="fa-solid fa-credit-card"></i>
                    <span>Pembayaran</span>
                </a>
                <a href="{{ url('/pengaturan/struk') }}" class="sidebar-item {{ request()->is('pengaturan/struk*') ? 'active' : '' }}">
                    <i class="fa-solid fa-receipt"></i>
                    <span>Struk</span>
                </a>
                <a href="{{ url('/pengaturan/pajak') }}" class="sidebar-item {{ request()->is('pengaturan/pajak*') ? 'active' : '' }}">
                    <i class="fa-solid fa-percent"></i>
                    <span>Pajak</span>
                </a>
            </nav>

            <div class="nav-group-title">Akses</div>
            <nav class="sidebar-menu">
                <a href="{{ url('/pengguna') }}" class="sidebar-item {{ request()->is('pengguna*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users-gear"></i>
                    <span>Akun Pengguna</span>
                </a>
            </nav>
        @endif
    </div>

    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout-sidebar">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<script>
    function toggleSidebar(force) {
        const sidebar = document.getElementById('main-sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');
        if (!sidebar || !backdrop) return;

        const isOpen = sidebar.classList.contains('open');
        const nextState = force !== undefined ? force : !isOpen;

        if (nextState) {
            sidebar.classList.add('open');
            backdrop.classList.add('active');
            document.body.style.overflow = window.innerWidth < 1200 ? 'hidden' : '';
        } else {
            sidebar.classList.remove('open');
            backdrop.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // Auto-close sidebar on resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1200) {
            const sidebar = document.getElementById('main-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            if (sidebar) sidebar.classList.remove('open');
            if (backdrop) backdrop.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
</script>
