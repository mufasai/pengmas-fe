<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>

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

        .menu-sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: #1f2f46;
            text-decoration: none;
            font-size: 14px;
        }

        .menu-sidebar a.active {
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
            padding: 56px 45px;
        }

        .form-area {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 24px;
            max-width: 900px;
        }

        .card {
            background: white;
            border: 1px solid #d6ddeb;
            border-radius: 10px;
            padding: 18px;
        }

        .label-title {
            font-size: 11px;
            font-weight: 700;
            color: #5f6b7a;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .preview-img {
            width: 100%;
            height: 245px;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 16px;
        }

        .upload-btn {
            width: 100%;
            height: 36px;
            border: 2px solid #002b78;
            background: white;
            color: #002b78;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .format {
            text-align: center;
            font-size: 10px;
            color: #777;
            margin-top: 10px;
        }

        h3 {
            margin: 0 0 18px;
            color: #002b78;
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: #5f6b7a;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #cfd7e8;
            border-radius: 5px;
            padding: 10px;
            color: #071f4f;
            outline: none;
            background: #f9fbff;
        }

        textarea {
            height: 115px;
            resize: none;
            line-height: 1.5;
        }

        .category-buttons {
            display: flex;
            gap: 8px;
        }

        .category-buttons button {
            padding: 8px 14px;
            border-radius: 20px;
            border: 1px solid #cfd7e8;
            background: white;
            color: #39485c;
            font-size: 12px;
            cursor: pointer;
        }

        .category-buttons .active {
            background: #002b78;
            color: white;
            border-color: #002b78;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .stock-card {
            margin-top: 24px;
            background: white;
            border: 1px solid #d6ddeb;
            border-radius: 10px;
            padding: 20px;
            max-width: 480px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stock-card strong {
            color: #002b78;
            font-size: 15px;
        }

        .stock-card p {
            margin: 5px 0 0;
            font-size: 11px;
            color: #555;
        }

        .switch {
            width: 48px;
            height: 26px;
            background: #0077c8;
            border-radius: 20px;
            position: relative;
        }

        .switch::after {
            content: "";
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            position: absolute;
            right: 3px;
            top: 3px;
        }

        .actions {
            margin-top: 34px;
            max-width: 900px;
            display: flex;
            justify-content: flex-end;
            gap: 16px;
        }

        .btn-cancel {
            width: 110px;
            height: 38px;
            border: 1px solid #7d8799;
            background: white;
            border-radius: 5px;
            color: #555;
        }

        .btn-save {
            width: 165px;
            height: 38px;
            border: none;
            background: #002b78;
            border-radius: 5px;
            color: white;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="layout">

    <aside class="sidebar">
        <div>
            <div class="brand">Van Houtte</div>

            <nav class="menu-sidebar">
                <a href="/dashboard">▦ Dashboard</a>
                <a href="/transaksi">▤ Transaksi</a>
                <a href="/menu" class="active">⚒ Menu</a>
                <a href="/laporan">▣ Laporan</a>
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

        <div class="form-area">

            <div class="card">
                <div class="label-title">Pratinjau Foto Produk</div>

                <img
                    src="https://images.unsplash.com/photo-1541167760496-1628856ab772?w=600"
                    class="preview-img"
                    alt="Foto Produk"
                >

                <button class="upload-btn">Ubah Foto Produk</button>

                <div class="format">
                    Format: JPG, PNG, Max 2MB
                </div>
            </div>

            <div>
                <div class="card">
                    <h3>Informasi Dasar</h3>

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" value="Caramel Macchiato">
                    </div>

                    <div class="form-group">
                        <label>Kategori Produk</label>

                        <div class="category-buttons">
                            <button class="active">Coffee</button>
                            <button>Non-Coffee</button>
                            <button>Pastry</button>
                            <button>Dessert</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" value="Rp 45.000">
                        </div>

                        <div class="form-group">
                            <label>Kode SKU (Opsional)</label>
                            <input type="text" value="CM-001-HOT">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Produk</label>
                        <textarea>Perpaduan espresso premium dengan steamed milk lembut dan sirup vanilla, diakhiri
dengan drizzle karamel manis di atasnya.</textarea>
                    </div>
                </div>

                <div class="stock-card">
                    <div>
                        <strong>Ketersediaan Stok</strong>
                        <p>Aktifkan untuk menampilkan menu di daftar pesanan kasir.</p>
                    </div>

                    <div class="switch"></div>
                </div>
            </div>

        </div>

        <div class="actions">
            <button class="btn-cancel">Batalkan</button>
            <button class="btn-save">▣ Simpan Perubahan</button>
        </div>

    </main>

</div>

</body>
</html>