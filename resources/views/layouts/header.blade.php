@php
    $user = session('user', []);
    $role = $user['role'] ?? 'kasir';
    $name = $user['name'] ?? ($role === 'admin' ? 'Admin' : 'Kasir');
    $username = $user['username'] ?? $name;
@endphp

<style>
    .top-header {
        height: 56px;
        background: #ffffff;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .btn-hamburger {
        display: none;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        color: #111827;
        font-size: 15px;
        padding: 6px 10px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .btn-hamburger:hover {
        background: #f3f4f6;
        border-color: #cbd5e1;
    }

    .header-left .pos-tag {
        background: #111827;
        color: #ffffff;
        font-weight: 800;
        font-size: 11px;
        padding: 4px 8px;
        border-radius: 6px;
        letter-spacing: 0.5px;
    }

    .header-left .brand-name {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 16px;
        font-size: 13px;
    }

    .status-badge {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #15803d;
        font-size: 12px;
        font-weight: 600;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        background: #22c55e;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.2);
    }

    .user-info {
        color: #4b5563;
        font-weight: 500;
        white-space: nowrap;
    }

    .user-info strong {
        color: #111827;
        font-weight: 700;
    }

    .realtime-clock {
        color: #6b7280;
        font-size: 12px;
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
        white-space: nowrap;
    }

    .header-logout {
        color: #6b7280;
        text-decoration: none;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 6px;
        transition: all 0.15s;
    }

    .header-logout:hover {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-header-cart {
        display: none;
        align-items: center;
        gap: 6px;
        background: #0f172a;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        position: relative;
        transition: all 0.15s ease;
    }

    .btn-header-cart:hover {
        background: #1e293b;
    }

    .btn-header-cart .header-cart-badge {
        background: #ef4444;
        color: #ffffff;
        font-size: 11px;
        font-weight: 800;
        border-radius: 10px;
        padding: 1px 6px;
        line-height: 1.2;
    }

    /* Responsivitas Top Header */
    @media (max-width: 1199px) {
        .btn-hamburger {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-header-cart {
            display: inline-flex;
        }
    }

    @media (max-width: 768px) {
        .realtime-clock {
            display: none;
        }
        .top-header {
            padding: 0 12px;
        }
        .header-right {
            gap: 8px;
        }
        .status-badge {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .header-left .brand-name {
            display: none;
        }
        .user-info {
            display: none;
        }
    }
</style>

<header class="top-header">
    <div class="header-left">
        <button type="button" class="btn-hamburger" onclick="toggleSidebar()" title="Buka Menu Navigasi" aria-label="Toggle Navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <span class="pos-tag">POS</span>
        <span class="brand-name">Cakrawala</span>
    </div>

    <div class="header-right">
        @if(request()->is('transaksi') || request()->is('pos') || request()->is('/'))
            <button type="button" class="btn-header-cart" id="btn-header-cart" onclick="typeof toggleCartDrawer === 'function' && toggleCartDrawer()" title="Keranjang Pesanan">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="header-cart-badge" id="header-cart-badge">0</span>
            </button>
        @endif

        <div class="status-badge">
            <span class="status-dot"></span>
            <span>Online</span>
        </div>

        <div class="user-info">
            {{ ucfirst($role) }}: <strong>{{ $username }}</strong>
        </div>

        <div class="realtime-clock" id="live-clock">
            --:--:--
        </div>

        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="header-logout" title="Logout">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="logout-text">Logout</span>
            </button>
        </form>
    </div>
</header>

<script>
    function updateClock() {
        const now = new Date();
        const days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        
        const dayName = days[now.getDay()];
        const date = now.getDate();
        const monthName = months[now.getMonth()];
        const year = now.getFullYear();

        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const clockEl = document.getElementById('live-clock');
        if (clockEl) {
            clockEl.textContent = `${hours}:${minutes}:${seconds} | ${dayName}, ${date} ${monthName} ${year}`;
        }
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>
