<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif
        }

        body {
            margin: 0;
            background: #f7f8fc;
            color: #071f4f
        }

        .layout {
            display: flex;
            min-height: 100vh
        }

        .sidebar {
            width: 220px;
            background: #eef3ff;
            border-right: 1px solid #d6ddeb;
            display: flex;
            flex-direction: column;
            justify-content: space-between
        }

        .brand {
            padding: 28px 24px;
            font-size: 26px;
            font-weight: 700;
            color: #002b78
        }

        .menu a {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 12px 24px;
            text-decoration: none;
            color: #1f2f46;
            font-size: 14px
        }

        .menu a.active {
            background: #dce7fb;
            color: #002b78;
            border-radius: 0 22px 22px 0;
            font-weight: 700
        }

        .admin-box {
            border-top: 1px solid #d6ddeb;
            padding: 20px 24px;
            display: flex;
            gap: 12px;
            align-items: center
        }

        .admin-icon {
            width: 34px;
            height: 34px;
            background: #002b78;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .content {
            flex: 1;
            padding: 34px 28px;
            display: grid;
            grid-template-columns: 370px 1fr;
            gap: 18px
        }

        .search {
            width: 100%;
            height: 42px;
            border: 1px solid #cfd7e8;
            border-radius: 7px;
            padding: 0 16px;
            background: #f9fbff;
            margin-bottom: 10px
        }

        .filter {
            display: flex;
            gap: 8px;
            margin-bottom: 14px
        }

        .filter button {
            padding: 7px 16px;
            border: 1px solid #cfd7e8;
            border-radius: 18px;
            background: white;
            color: #071f4f;
            font-size: 12px
        }

        .filter .active {
            background: #002b78;
            color: white
        }

        .trx-card {
            background: white;
            border: 1px solid #d6ddeb;
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 10px
        }

        .trx-card.active {
            border: 2px solid #002b78
        }

        .trx-top {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: #555
        }

        .trx-card h3 {
            margin: 10px 0 3px;
            font-size: 17px
        }

        .trx-card p {
            margin: 0;
            font-size: 12px;
            color: #555
        }

        .detail h2 {
            margin: 0 0 4px;
            font-size: 21px;
            color: #002b78
        }

        .date {
            font-size: 12px;
            color: #555;
            margin-bottom: 15px
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            margin-bottom: 16px
        }

        .info-box {
            background: #f9fbff;
            border: 1px solid #d6ddeb;
            border-radius: 7px;
            padding: 12px;
            font-size: 12px
        }

        .info-box span {
            display: block;
            color: #888;
            font-size: 10px;
            margin-bottom: 7px;
            text-transform: uppercase
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 10px
        }

        .item {
            display: grid;
            grid-template-columns: 50px 1fr 110px 110px;
            gap: 12px;
            align-items: center;
            border-bottom: 1px solid #d6ddeb;
            padding: 10px 0
        }

        .item img {
            width: 45px;
            height: 45px;
            border-radius: 8px;
            object-fit: cover
        }

        .item strong {
            font-size: 13px
        }

        .item span {
            font-size: 11px;
            color: #666
        }

        .qty,
        .item-price {
            text-align: right;
            font-size: 13px
        }

        .item-price {
            font-weight: 700
        }

        .summary {
            background: #eef3ff;
            margin-top: 18px;
            padding: 18px;
            border-radius: 4px
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 13px
        }

        .discount {
            color: #d63838
        }

        .total {
            display: flex;
            justify-content: space-between;
            margin-top: 20px
        }

        .total strong {
            color: #002b78;
            font-size: 28px
        }

        .pay {
            text-align: right;
            font-size: 11px
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            margin-top: 22px
        }

        .btn {
            width: 150px;
            height: 45px;
            border-radius: 7px;
            font-weight: 700;
            cursor: pointer
        }

        .outline {
            background: white;
            border: 1px solid #002b78;
            color: #002b78
        }

        .primary {
            background: #002b78;
            border: none;
            color: white
        }
    </style>
</head>

<body>

    <div class="layout">

        <aside class="sidebar">
            <div>
                <div class="brand">Cakrawala</div>

                <nav class="menu">
                    <a href="/dashboard">▦ Dashboard</a>
                    <a href="/transaksi">▤ Transaksi</a>
                    <a href="/menu">⚒ Menu</a>
                    <a href="/laporan" class="active">▣ Laporan</a>
                </nav>
            </div>

            <div class="admin-box">
                <div class="admin-icon">☻</div>
                <div>
                    <strong style="font-size:12px;">{{ session('user')['name'] ?? 'Admin' }}</strong><br>
                    <span style="font-size:11px;color:#777;">{{ session('user')['email'] ?? 'Van Houtte Cafe' }}</span>
                </div>
                <form action="/logout" method="POST" style="margin-left:auto">
                    @csrf
                    <button type="submit" style="background:none;border:none;cursor:pointer;color:#777;font-size:18px;"
                        title="Logout">⏻</button>
                </form>
            </div>
        </aside>

        <main class="content">

            <section>
                <input class="search" placeholder="🔍 Cari ID Transaksi atau Nama...">

                <div class="filter">
                    <button class="active">Semua</button>
                    <button>Tunai</button>
                    <button>Digital</button>
                </div>

                @foreach($reports as $index => $report)
                    <div class="trx-card {{ $index === 0 ? 'active' : '' }}" onclick="showDetail({{ $index }}, this)"
                        style="cursor:pointer;" data-payment="{{ strtolower($report['payment_method']) }}">
                        <div class="trx-top">
                            <strong>#{{ $report['transaction_id'] }}</strong>
                            <span>{{ $report['time'] }}</span>
                        </div>
                        <h3>Rp {{ number_format($report['payment_summary']['total_payment'], 0, ',', '.') }}</h3>
                        <p>{{ count($report['items']) }} Items • {{ $report['payment_method'] }}</p>
                    </div>
                @endforeach

                @if(count($reports) == 0)
                    <p>Belum ada transaksi.</p>
                @endif
            </section>

            <section class="detail" id="detail-section">
                @if(count($reports) > 0)
                    <h2 id="dt-title">Detail Pesanan</h2>
                    <div class="date" id="dt-date"></div>

                    <div class="info-grid">
                        <div class="info-box">
                            <span>ID Transaksi</span>
                            <span id="dt-id" style="color:inherit; font-size:inherit; font-weight:bold;"></span>
                        </div>
                        <div class="info-box">
                            <span>Kasir</span>
                            <span id="dt-cashier" style="color:inherit; font-size:inherit;"></span>
                        </div>
                        <div class="info-box">
                            <span>Metode Bayar</span>
                            <span id="dt-method" style="color:inherit; font-size:inherit;"></span>
                        </div>
                    </div>

                    <div class="section-title">Item Pesanan</div>

                    <div id="dt-items" style="max-height:300px; overflow-y:auto; padding-right:10px;">
                        <!-- Items rendered by JS -->
                    </div>

                    <div class="summary">
                        <div class="row">
                            <span>Subtotal</span>
                            <span id="dt-subtotal"></span>
                        </div>
                        <div class="row">
                            <span>Pajak</span>
                            <span id="dt-tax"></span>
                        </div>
                        <div class="row discount" id="dt-discount-row" style="display:none;">
                            <span>Diskon</span>
                            <span id="dt-discount"></span>
                        </div>

                        <div class="total">
                            <div>
                                <span>TOTAL PEMBAYARAN</span><br>
                                <strong id="dt-total"></strong>
                            </div>
                            <div class="pay">
                                <b id="dt-pay-method"></b><br>
                                <span id="dt-pay-total"></span>
                            </div>
                        </div>
                    </div>

                    <div class="actions">
                        <form action="/laporan/send-receipt" method="POST" style="display:flex; gap:10px; width:100%;">
                            @csrf
                            <input type="hidden" name="transaction_id" id="dt-form-id" value="1">
                            <input type="email" name="email" placeholder="Email tujuan"
                                style="flex:1; border:1px solid #cfd7e8; border-radius:7px; padding:0 16px;" required>
                            <button type="submit" class="btn outline" style="width:130px;">✉ E-Receipt</button>
                        </form>
                        <button class="btn primary" onclick="window.print()">🖨 Cetak Struk</button>
                    </div>
                @else
                    <p style="text-align:center; padding-top:100px;">Belum ada data riwayat transaksi.</p>
                @endif
            </section>

        </main>

    </div>

    <script>
        const reports = @json($reports);

        function formatRupiah(number) {
            return 'Rp ' + Number(number).toLocaleString('id-ID');
        }

        function showDetail(index, el) {
            // Highlight active card
            document.querySelectorAll('.trx-card').forEach(card => card.classList.remove('active'));
            if (el) el.classList.add('active');

            const r = reports[index];
            if (!r) return;

            document.getElementById('dt-date').innerText = r.date + ' • ' + r.time;
            document.getElementById('dt-id').innerText = '#' + r.transaction_id;
            document.getElementById('dt-cashier').innerText = r.cashier?.name || 'Admin';
            document.getElementById('dt-method').innerText = r.payment_method;

            const itemsEl = document.getElementById('dt-items');
            itemsEl.innerHTML = '';
            r.items.forEach(item => {
                const img = item.image_url ? item.image_url : 'https://via.placeholder.com/100';
                const notes = item.variant_notes ? item.variant_notes : 'Reguler';
                itemsEl.innerHTML += `
                <div class="item">
                    <img src="${img}">
                    <div>
                        <strong>${item.product_name}</strong><br>
                        <span>${notes}</span>
                    </div>
                    <div class="qty">${item.quantity} x ${formatRupiah(item.price)}</div>
                    <div class="item-price">${formatRupiah(item.total_price)}</div>
                </div>
            `;
            });

            document.getElementById('dt-subtotal').innerText = formatRupiah(r.payment_summary.subtotal);
            document.getElementById('dt-tax').innerText = formatRupiah(r.payment_summary.tax_amount);

            if (r.payment_summary.discount_amount > 0) {
                document.getElementById('dt-discount-row').style.display = 'flex';
                document.getElementById('dt-discount').innerText = '- ' + formatRupiah(r.payment_summary.discount_amount);
            } else {
                document.getElementById('dt-discount-row').style.display = 'none';
            }

            document.getElementById('dt-total').innerText = formatRupiah(r.payment_summary.total_payment);
            document.getElementById('dt-pay-method').innerText = 'DIBAYAR VIA ' + (r.payment_method || '').toUpperCase();
            document.getElementById('dt-pay-total').innerText = formatRupiah(r.payment_summary.total_payment);

            // Use the real database ID returned by BE for send-receipt
            document.getElementById('dt-form-id').value = r.id;
        }

        // Init first report
        if (reports.length > 0) {
            showDetail(0, document.querySelector('.trx-card'));
        }

        // Search and filter logic
        document.querySelector('.search').addEventListener('input', function (e) {
            const term = e.target.value.toLowerCase();
            document.querySelectorAll('.trx-card').forEach(card => {
                if (card.innerHTML.toLowerCase().includes(term)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        document.querySelectorAll('.filter button').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.filter button').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const type = this.innerText.toLowerCase();

                document.querySelectorAll('.trx-card').forEach(card => {
                    if (type === 'semua' || card.getAttribute('data-payment').includes(type)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>

</body>

</html>