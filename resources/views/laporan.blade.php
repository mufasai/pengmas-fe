<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan</title>

    <style>
        *{box-sizing:border-box;font-family:Arial,sans-serif}
        body{margin:0;background:#f7f8fc;color:#071f4f}
        .layout{display:flex;min-height:100vh}

        .sidebar{
            width:220px;background:#eef3ff;border-right:1px solid #d6ddeb;
            display:flex;flex-direction:column;justify-content:space-between
        }
        .brand{padding:28px 24px;font-size:26px;font-weight:700;color:#002b78}
        .menu a{
            display:flex;gap:12px;align-items:center;padding:12px 24px;
            text-decoration:none;color:#1f2f46;font-size:14px
        }
        .menu a.active{
            background:#dce7fb;color:#002b78;border-radius:0 22px 22px 0;font-weight:700
        }
        .admin-box{border-top:1px solid #d6ddeb;padding:20px 24px;display:flex;gap:12px;align-items:center}
        .admin-icon{width:34px;height:34px;background:#002b78;color:white;border-radius:50%;display:flex;align-items:center;justify-content:center}

        .content{flex:1;padding:34px 28px;display:grid;grid-template-columns:370px 1fr;gap:18px}

        .search{
            width:100%;height:42px;border:1px solid #cfd7e8;border-radius:7px;
            padding:0 16px;background:#f9fbff;margin-bottom:10px
        }

        .filter{display:flex;gap:8px;margin-bottom:14px}
        .filter button{
            padding:7px 16px;border:1px solid #cfd7e8;border-radius:18px;background:white;color:#071f4f;font-size:12px
        }
        .filter .active{background:#002b78;color:white}

        .trx-card{
            background:white;border:1px solid #d6ddeb;border-radius:10px;
            padding:14px;margin-bottom:10px
        }
        .trx-card.active{border:2px solid #002b78}
        .trx-top{display:flex;justify-content:space-between;font-size:11px;color:#555}
        .trx-card h3{margin:10px 0 3px;font-size:17px}
        .trx-card p{margin:0;font-size:12px;color:#555}

        .detail h2{margin:0 0 4px;font-size:21px;color:#002b78}
        .date{font-size:12px;color:#555;margin-bottom:15px}

        .info-grid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin-bottom:16px}
        .info-box{
            background:#f9fbff;border:1px solid #d6ddeb;border-radius:7px;padding:12px;font-size:12px
        }
        .info-box span{display:block;color:#888;font-size:10px;margin-bottom:7px;text-transform:uppercase}

        .section-title{font-weight:700;margin-bottom:10px}

        .item{
            display:grid;grid-template-columns:50px 1fr 110px 110px;gap:12px;
            align-items:center;border-bottom:1px solid #d6ddeb;padding:10px 0
        }
        .item img{width:45px;height:45px;border-radius:8px;object-fit:cover}
        .item strong{font-size:13px}
        .item span{font-size:11px;color:#666}
        .qty,.item-price{text-align:right;font-size:13px}
        .item-price{font-weight:700}

        .summary{
            background:#eef3ff;margin-top:18px;padding:18px;border-radius:4px
        }
        .row{display:flex;justify-content:space-between;margin-bottom:10px;font-size:13px}
        .discount{color:#d63838}
        .total{display:flex;justify-content:space-between;margin-top:20px}
        .total strong{color:#002b78;font-size:28px}
        .pay{text-align:right;font-size:11px}

        .actions{display:flex;justify-content:flex-end;gap:14px;margin-top:22px}
        .btn{
            width:150px;height:45px;border-radius:7px;font-weight:700;cursor:pointer
        }
        .outline{background:white;border:1px solid #002b78;color:#002b78}
        .primary{background:#002b78;border:none;color:white}
    </style>
</head>
<body>

<div class="layout">

    <aside class="sidebar">
        <div>
            <div class="brand">Van Houtte</div>

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
                <strong style="font-size:12px;">Admin Kasir</strong><br>
                <span style="font-size:11px;color:#777;">Van Houtte Cafe</span>
            </div>
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

            <div class="trx-card active">
                <div class="trx-top">
                    <strong>#VH-98241</strong>
                    <span>14:20</span>
                </div>
                <h3>Rp 154.000</h3>
                <p>3 Items • QRIS</p>
            </div>

            <div class="trx-card">
                <div class="trx-top">
                    <strong>#VH-98240</strong>
                    <span>14:05</span>
                </div>
                <h3>Rp 42.500</h3>
                <p>1 Item • Tunai</p>
            </div>

            <div class="trx-card">
                <div class="trx-top">
                    <strong>#VH-98239</strong>
                    <span>13:45</span>
                </div>
                <h3>Rp 210.000</h3>
                <p>5 Items • Debit BCA</p>
            </div>

            <div class="trx-card">
                <div class="trx-top">
                    <strong>#VH-98238</strong>
                    <span>13:12</span>
                </div>
                <h3>Rp 88.000</h3>
                <p>2 Items • QRIS</p>
            </div>
        </section>

        <section class="detail">
            <h2>Detail Pesanan</h2>
            <div class="date">Selasa, 24 Okt 2023 • 14:20 WIB</div>

            <div class="info-grid">
                <div class="info-box">
                    <span>ID Transaksi</span>
                    #VH-98241
                </div>
                <div class="info-box">
                    <span>Kasir</span>
                    Budi Santoso
                </div>
                <div class="info-box">
                    <span>Metode Bayar</span>
                    QRIS (Gopay)
                </div>
            </div>

            <div class="section-title">Item Pesanan</div>

            <div class="item">
                <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=100">
                <div>
                    <strong>Cafe Latte</strong><br>
                    <span>Regular • Almond Milk</span>
                </div>
                <div class="qty">2 x Rp 38.000</div>
                <div class="item-price">Rp 76.000</div>
            </div>

            <div class="item">
                <img src="https://images.unsplash.com/photo-1549903072-7e6e0bedb7fb?w=100">
                <div>
                    <strong>Chocolate Croissant</strong><br>
                    <span>Heated</span>
                </div>
                <div class="qty">1 x Rp 32.000</div>
                <div class="item-price">Rp 32.000</div>
            </div>

            <div class="item">
                <img src="https://images.unsplash.com/photo-1525351484163-7529414344d8?w=100">
                <div>
                    <strong>Avocado Toast</strong><br>
                    <span>Extra Poached Egg</span>
                </div>
                <div class="qty">1 x Rp 46.000</div>
                <div class="item-price">Rp 46.000</div>
            </div>

            <div class="summary">
                <div class="row">
                    <span>Subtotal</span>
                    <span>Rp 154.000</span>
                </div>
                <div class="row">
                    <span>Pajak (10%)</span>
                    <span>Rp 15.400</span>
                </div>
                <div class="row discount">
                    <span>Diskon Promo</span>
                    <span>- Rp 15.400</span>
                </div>

                <div class="total">
                    <div>
                        <span>TOTAL PEMBAYARAN</span><br>
                        <strong>Rp 154.000</strong>
                    </div>
                    <div class="pay">
                        <b>DIBAYAR VIA QRIS</b><br>
                        Rp 154.000
                    </div>
                </div>
            </div>

            <div class="actions">
                <button class="btn outline">✉ E-Receipt</button>
                <button class="btn primary">🖨 Cetak Struk</button>
            </div>
        </section>

    </main>

</div>

</body>
</html>