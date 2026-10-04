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
            background: #ccc;
            border-radius: 20px;
            position: relative;
            cursor: pointer;
            transition: background 0.2s;
        }

        .switch::after {
            content: "";
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            position: absolute;
            left: 3px;
            top: 3px;
            transition: left 0.2s;
        }

        .switch.active {
            background: #0077c8;
        }

        .switch.active::after {
            left: 25px;
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
            cursor: pointer;
        }

        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
            max-width: 900px;
        }

        .alert-success {
            background: #e6f9ed;
            color: #1e7e34;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #ffe5e5;
            color: #c0392b;
            border: 1px solid #f5c6cb;
        }

        .menu-list {
            margin-top: 40px;
            max-width: 900px;
        }

        .menu-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .menu-table th,
        .menu-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
            font-size: 13px;
        }

        .menu-table th {
            background: #f0f4f8;
            color: #333;
            font-weight: 600;
        }

        .menu-table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 11px;
        }
    </style>
</head>

<body>

    <div class="layout">

        <aside class="sidebar">
            <div>
                <div class="brand">Cakrawala</div>

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

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            <form id="menu-form" action="/menu" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="method-container"></div>
                <div class="form-area">

                    <div class="card">
                        <div class="label-title">Pratinjau Foto Produk</div>

                        <img id="preview" src="https://via.placeholder.com/600x400?text=Pilih+Foto" class="preview-img"
                            alt="Foto Produk">

                        <input type="file" name="image" id="image" style="display: none;" accept="image/png, image/jpeg"
                            onchange="previewImage(event)">
                        <button type="button" class="upload-btn"
                            onclick="document.getElementById('image').click()">Unggah Foto Produk</button>

                        <div class="format">
                            Format: JPG, PNG, Max 2MB
                        </div>
                    </div>

                    <div>
                        <div class="card">
                            <h3>Informasi Dasar</h3>

                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <label>Kategori Produk</label>
                                <input type="hidden" name="category_id" id="category_id"
                                    value="{{ old('category_id', $categories[0]['id'] ?? '') }}">
                                <div class="category-buttons">
                                    @foreach($categories as $category)
                                        <button type="button"
                                            class="{{ ($loop->first && !old('category_id')) || old('category_id') == $category['id'] ? 'active' : '' }}"
                                            onclick="setCategory({{ $category['id'] }}, this)">{{ $category['name'] }}</button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input type="number" name="price" value="{{ old('price') }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Kode SKU (Opsional)</label>
                                    <input type="text" name="sku" value="{{ old('sku') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Produk</label>
                                <textarea name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div>
                                <strong>Ketersediaan Stok</strong>
                                <p>Aktifkan untuk menampilkan menu di daftar pesanan kasir.</p>
                            </div>

                            <div class="switch active" onclick="toggleActive()">
                                <input type="checkbox" name="is_active" id="is_active" value="1" checked
                                    style="display:none;">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="actions">
                    <button type="button" class="btn-cancel" onclick="resetForm()">Batalkan</button>
                    <button type="submit" class="btn-save" id="btn-submit">▣ Simpan Menu</button>
                </div>
            </form>

            <div class="menu-list">
                <h3>Daftar Menu</h3>
                <table class="menu-table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                            <tr>
                                <td>
                                    <img src="{{ $menu['image_url'] ?? 'https://via.placeholder.com/50' }}" alt="Foto">
                                </td>
                                <td>
                                    <strong>{{ $menu['name'] }}</strong><br>
                                    <span style="font-size:10px; color:#777;">{{ $menu['sku'] }}</span>
                                </td>
                                <td>{{ $menu['category']['name'] ?? '-' }}</td>
                                <td>Rp {{ number_format($menu['price'], 0, ',', '.') }}</td>
                                <td>{{ $menu['is_active'] ? 'Aktif' : 'Non-aktif' }}</td>
                                <td>
                                    <div style="display: flex; gap: 8px;">
                                        <button type="button" class="btn-edit" style="background:#f39c12; color:white; border:none; padding: 6px 12px; border-radius: 4px; cursor:pointer; font-weight:bold;" onclick="editMenu({{ json_encode($menu) }})">Edit</button>
                                        <form action="/menu/{{ $menu['id'] }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus menu ini?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">Belum ada menu terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>

    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function setCategory(id, btn) {
            document.getElementById('category_id').value = id;
            document.querySelectorAll('.category-buttons button').forEach(b => b.classList.remove('active'));
            if (btn) {
                btn.classList.add('active');
            }
        }

        function toggleActive() {
            const checkbox = document.getElementById('is_active');
            const switchUi = document.querySelector('.switch');
            checkbox.checked = !checkbox.checked;

            if (checkbox.checked) {
                switchUi.classList.add('active');
            } else {
                switchUi.classList.remove('active');
            }
        }

        function editMenu(menu) {
            // Scroll to top/form area smoothly
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Set form action & method override
            const form = document.getElementById('menu-form');
            form.action = '/menu/' + menu.id;
            document.getElementById('method-container').innerHTML = '<input type="hidden" name="_method" value="PUT">';

            // Fill inputs
            form.querySelector('input[name="name"]').value = menu.name;
            form.querySelector('input[name="price"]').value = menu.price;
            form.querySelector('input[name="sku"]').value = menu.sku || '';
            form.querySelector('textarea[name="description"]').value = menu.description || '';

            // Set Category active button
            setCategory(menu.category_id, document.querySelector(`.category-buttons button[onclick*="${menu.category_id}"]`));

            // Set active checkbox & switch UI color
            const checkbox = document.getElementById('is_active');
            const switchUi = document.querySelector('.switch');
            checkbox.checked = !!menu.is_active;

            if (checkbox.checked) {
                switchUi.classList.add('active');
            } else {
                switchUi.classList.remove('active');
            }

            // Preview Image
            const preview = document.getElementById('preview');
            preview.src = menu.image_url ? menu.image_url : 'https://via.placeholder.com/600x400?text=Pilih+Foto';

            // Change Submit Button text
            document.getElementById('btn-submit').innerHTML = '▣ Update Menu';
        }

        function resetForm() {
            const form = document.getElementById('menu-form');
            form.reset();
            form.action = '/menu';
            document.getElementById('method-container').innerHTML = '';
            document.getElementById('btn-submit').innerHTML = '▣ Simpan Menu';
            document.getElementById('preview').src = 'https://via.placeholder.com/600x400?text=Pilih+Foto';

            // Click the first category button to restore state
            const firstCatBtn = document.querySelector('.category-buttons button');
            if (firstCatBtn) {
                firstCatBtn.click();
            }

            // Restore switch to active
            const checkbox = document.getElementById('is_active');
            const switchUi = document.querySelector('.switch');
            checkbox.checked = true;
            switchUi.classList.add('active');
        }
    </script>

</body>

</html>