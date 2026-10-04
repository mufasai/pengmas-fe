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
            padding: 20px 14px;
            display: flex;
            gap: 10px;
            align-items: center;
            overflow: hidden;
        }

        .admin-text {
            flex: 1;
            min-width: 0;
        }

        .admin-text strong {
            display: block;
            font-size: 13px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #111;
        }

        .admin-text span {
            display: block;
            font-size: 11px;
            color: #777;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
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
            padding: 28px 20px 20px;
            border-left: 1px solid #e1e5ef;
            display: flex;
            flex-direction: column;
            height: 100vh;
            position: sticky;
            top: 0;
        }

        .order-panel h2 {
            margin: 0;
            font-size: 24px;
        }

        .order-code {
            font-size: 12px;
            color: #777;
            margin-bottom: 20px;
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

        #cart-items {
            flex: 1;
            overflow-y: auto;
            margin-bottom: 20px;
            padding-right: 5px;
        }

        .summary {
            margin-top: auto;
            border-top: 1px solid #eee;
            padding-top: 15px;
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

        .pay-btn:disabled {
            background: #a0a0a0;
            cursor: not-allowed;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div class="layout">

        <aside class="sidebar">
            <div>
                <div class="brand">Cakrawala</div>

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
                    <strong>{{ session('user')['name'] ?? 'Admin' }}</strong>
                    <span>{{ session('user')['email'] ?? 'Van Houtte Cafe' }}</span>
                </div>
                <form action="/logout" method="POST" style="margin-left:auto">
                    @csrf
                    <button type="submit" style="background:none;border:none;cursor:pointer;color:#777;font-size:18px;"
                        title="Logout">⏻</button>
                </form>
            </div>
        </aside>

        <main class="content">

            <div class="tabs" id="category-tabs">
                <button class="active" onclick="filterCategory('all', this)">Semua</button>
                @foreach($categories as $category)
                    <button onclick="filterCategory({{ $category['id'] }}, this)">{{ $category['name'] }}</button>
                @endforeach
            </div>

            <input type="text" class="search" placeholder="🔍  Cari menu...">

            <div class="product-grid" id="product-grid">
                @foreach($menus as $menu)
                    <div class="product-card" data-category="{{ $menu['category_id'] }}"
                        data-name="{{ strtolower($menu['name']) }}">
                        <img src="{{ $menu['image_url'] ?? 'https://via.placeholder.com/500' }}" alt="{{ $menu['name'] }}">
                        <h4>{{ $menu['name'] }}</h4>
                        <div class="category">{{ $menu['category']['name'] ?? 'Lainnya' }}</div>
                        <div class="price">Rp {{ number_format($menu['price'], 0, ',', '.') }}</div>
                        <button class="add-btn"
                            onclick="addToCart({{ $menu['id'] }}, '{{ addslashes($menu['name']) }}', {{ $menu['price'] }})">+
                            Tambah</button>
                    </div>
                @endforeach
            </div>

        </main>

        <aside class="order-panel">
            <h2>Pesanan Baru</h2>
            <div class="order-code">Kasir: {{ session('user')['name'] ?? 'Admin' }}</div>

            <div id="cart-items">
                <!-- items will be injected here -->
                <p style="text-align:center; color:#999; margin-top:20px;">Belum ada pesanan</p>
            </div>

            <div class="summary">
                <div class="summary-row">
                    <span>Subtotal</span>
                    <strong id="subtotal">Rp 0</strong>
                </div>

                <div class="summary-row">
                    <span>Pajak (10%)</span>
                    <strong id="tax">Rp 0</strong>
                </div>

                <div class="total">
                    <span>Total</span>
                    <span id="total">Rp 0</span>
                </div>

                <div class="payment">
                    <button id="btn-tunai" onclick="setPaymentMethod('Tunai')" class="active"
                        style="background:#002b78;color:white;">▣<br>Tunai</button>
                    <button id="btn-digital" onclick="setPaymentMethod('Digital')">◉<br>Digital</button>
                </div>

                <button class="pay-btn" id="pay-btn" onclick="processCheckout()" disabled>Bayar Sekarang</button>
            </div>
        </aside>

    </div>

    <script>
        let cart = {};
        let paymentMethod = 'Tunai';

        function formatRupiah(number) {
            return 'Rp ' + number.toLocaleString('id-ID');
        }

        function filterCategory(catId, btnElement) {
            document.querySelectorAll('#category-tabs button').forEach(b => b.classList.remove('active'));
            btnElement.classList.add('active');

            document.querySelectorAll('.product-card').forEach(card => {
                if (catId === 'all' || card.getAttribute('data-category') == catId) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        document.querySelector('.search').addEventListener('input', function (e) {
            const term = e.target.value.toLowerCase();
            document.querySelectorAll('.product-card').forEach(card => {
                if (card.getAttribute('data-name').includes(term)) {
                    card.style.display = 'block';
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
        }

        function changeQty(id, delta) {
            if (!cart[id]) return;
            cart[id].qty += delta;
            if (cart[id].qty <= 0) {
                delete cart[id];
            }
            renderCart();
        }

        function setPaymentMethod(method) {
            paymentMethod = method;
            document.getElementById('btn-tunai').style = '';
            document.getElementById('btn-digital').style = '';
            if (method === 'Tunai') {
                document.getElementById('btn-tunai').style = 'background:#002b78;color:white;';
            } else {
                document.getElementById('btn-digital').style = 'background:#002b78;color:white;';
            }
        }

        function renderCart() {
            const cartEl = document.getElementById('cart-items');
            cartEl.innerHTML = '';
            let subtotal = 0;
            let count = 0;

            Object.values(cart).forEach(item => {
                subtotal += item.price * item.qty;
                count++;

                cartEl.innerHTML += `
                <div class="order-item">
                    <div>
                        <strong>${item.name}</strong><br>
                        <div class="qty">
                            <button onclick="changeQty(${item.id}, -1)">-</button>
                            <span>${item.qty}</span>
                            <button onclick="changeQty(${item.id}, 1)">+</button>
                        </div>
                    </div>
                    <div class="order-price">${formatRupiah(item.price * item.qty)}</div>
                </div>
            `;
            });

            if (count === 0) {
                cartEl.innerHTML = '<p style="text-align:center; color:#999; margin-top:20px;">Belum ada pesanan</p>';
            }

            const tax = subtotal * 0.1;
            const total = subtotal + tax;

            document.getElementById('subtotal').innerText = formatRupiah(subtotal);
            document.getElementById('tax').innerText = formatRupiah(tax);
            document.getElementById('total').innerText = formatRupiah(total);

            document.getElementById('pay-btn').disabled = count === 0;
        }

        async function processCheckout() {
            if (Object.keys(cart).length === 0) return;

            const btn = document.getElementById('pay-btn');
            btn.disabled = true;
            btn.innerText = 'Memproses...';

            const items = Object.values(cart).map(item => ({
                product_id: item.id,
                quantity: item.qty,
                notes: ""
            }));

            const payload = {
                payment_method: paymentMethod,
                items: items,
                notes: ""
            };

            try {
                const res = await fetch('/transaksi', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(payload)
                });

                const data = await res.json();
                if (data.success) {
                    alert('Transaksi Berhasil!');
                    cart = {};
                    renderCart();
                } else {
                    alert('Gagal: ' + data.message);
                }
            } catch (err) {
                alert('Terjadi kesalahan jaringan.');
            } finally {
                btn.innerText = 'Bayar Sekarang';
                if (Object.keys(cart).length > 0) btn.disabled = false;
            }
        }
    </script>

</body>

</html>