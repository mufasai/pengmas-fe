<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Menu - Cakrawala Eatery & Cafe</title>
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
            max-width: 1200px;
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

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .kategori-grid {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 24px;
            align-items: start;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .card-header {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
        }

        /* Preview badge */
        .preview-box {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            padding: 14px;
            text-align: center;
            margin-bottom: 20px;
        }

        .preview-label {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 8px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .badge-preview {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: 20px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            font-size: 13px;
            font-weight: 600;
            color: #0f172a;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .badge-preview .strip {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #0284c7;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            height: 40px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 14px;
            font-size: 13px;
            outline: none;
            transition: border-color 0.15s;
        }

        .form-control:focus {
            border-color: #0f172a;
        }

        /* Color palette */
        .color-palette {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 6px;
        }

        .color-dot {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.15s;
            position: relative;
        }

        .color-dot:hover {
            transform: scale(1.1);
        }

        .color-dot.active {
            border-color: #0f172a;
            box-shadow: 0 0 0 2px #ffffff inset;
        }

        /* Toggle switch */
        .toggle-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 0;
            border-top: 1px solid #f1f5f9;
        }

        .toggle-label {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            inset: 0;
            background-color: #cbd5e1;
            transition: .2s;
            border-radius: 24px;
        }

        .slider:before {
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

        input:checked + .slider {
            background-color: #10b981;
        }

        input:checked + .slider:before {
            transform: translateX(20px);
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-cancel {
            flex: 1;
            height: 40px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-submit {
            flex: 2;
            height: 40px;
            border: none;
            background: #0f172a;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-submit:hover {
            background: #000000;
        }

        /* List table */
        .category-table {
            width: 100%;
            border-collapse: collapse;
        }

        .category-table th {
            text-align: left;
            padding: 12px 16px;
            font-size: 11px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 700;
            border-bottom: 1px solid #e2e8f0;
        }

        .category-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
            vertical-align: middle;
        }

        .category-table tr:last-child td {
            border-bottom: none;
        }

        .category-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .color-strip-bar {
            width: 8px;
            height: 24px;
            border-radius: 4px;
        }

        .category-name {
            font-weight: 600;
            color: #0f172a;
        }

        .menu-count-badge {
            display: inline-block;
            background: #f1f5f9;
            color: #475569;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 12px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            background: #ecfdf5;
            color: #059669;
        }

        .action-btns {
            display: flex;
            gap: 6px;
        }

        .btn-icon {
            width: 30px;
            height: 30px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            cursor: pointer;
            transition: all 0.15s;
        }

        .btn-icon:hover {
            border-color: #0f172a;
            color: #0f172a;
        }

        .btn-icon.delete:hover {
            border-color: #ef4444;
            color: #ef4444;
            background: #fef2f2;
        }

        @media (max-width: 900px) {
            .content {
                padding: 16px;
            }
            .kategori-grid {
                grid-template-columns: 1fr;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .category-table {
                min-width: 480px;
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
                <h1 class="page-title">Kategori</h1>
                <p class="page-subtitle">Kelola kategori menu yang ditampilkan di POS</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="kategori-grid">
                <!-- Form Tambah / Edit Kategori -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title" id="form-card-title">Tambah Kategori</h2>
                    </div>

                    <!-- Live Preview Badge -->
                    <div class="preview-box">
                        <div class="preview-label">Preview Tampilan di POS</div>
                        <div class="badge-preview">
                            <span class="strip" id="preview-strip"></span>
                            <span id="preview-text">Nama Kategori</span>
                        </div>
                    </div>

                    <form id="category-form" action="{{ url('/kategori') }}" method="POST">
                        @csrf
                        <div id="method-slot"></div>

                        <div class="form-group">
                            <label class="form-label">Nama Kategori *</label>
                            <input type="text" name="name" id="cat-name-input" class="form-control" placeholder="Contoh: Coffee, Dessert..." required oninput="updatePreview()">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Warna Strip (Penanda POS)</label>
                            <input type="hidden" name="color" id="cat-color-input" value="#0284c7">
                            <div class="color-palette" id="color-palette">
                                <div class="color-dot active" style="background: #0284c7;" data-color="#0284c7" onclick="pickColor('#0284c7', this)"></div>
                                <div class="color-dot" style="background: #0d9488;" data-color="#0d9488" onclick="pickColor('#0d9488', this)"></div>
                                <div class="color-dot" style="background: #8b5cf6;" data-color="#8b5cf6" onclick="pickColor('#8b5cf6', this)"></div>
                                <div class="color-dot" style="background: #f59e0b;" data-color="#f59e0b" onclick="pickColor('#f59e0b', this)"></div>
                                <div class="color-dot" style="background: #ef4444;" data-color="#ef4444" onclick="pickColor('#ef4444', this)"></div>
                                <div class="color-dot" style="background: #10b981;" data-color="#10b981" onclick="pickColor('#10b981', this)"></div>
                                <div class="color-dot" style="background: #ec4899;" data-color="#ec4899" onclick="pickColor('#ec4899', this)"></div>
                                <div class="color-dot" style="background: #475569;" data-color="#475569" onclick="pickColor('#475569', this)"></div>
                            </div>
                        </div>

                        <div class="toggle-row">
                            <div>
                                <div class="toggle-label">Tampil di POS</div>
                                <div style="font-size: 11px; color: #64748b;">Tampilkan tab kategori ini di kasir</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" name="is_pos_active" value="1" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-cancel" onclick="resetForm()">Batal</button>
                            <button type="submit" class="btn-submit" id="btn-submit-cat">+ Tambah Kategori</button>
                        </div>
                    </form>
                </div>

                <!-- Daftar Kategori -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Daftar Kategori</h2>
                        <span style="font-size: 12px; color: #64748b; font-weight: 600;">Total: {{ count($categories) }}</span>
                    </div>

                    <div class="table-responsive">
                        <table class="category-table">
                            <thead>
                                <tr>
                                    <th>KATEGORI</th>
                                    <th>MENU TERKAIT</th>
                                    <th>STATUS POS</th>
                                    <th style="text-align: right;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $cat)
                                    <tr>
                                        <td>
                                            <div class="category-info">
                                                <div class="color-strip-bar" style="background-color: {{ $cat['color'] ?? '#0284c7' }};"></div>
                                                <span class="category-name">{{ $cat['name'] }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="menu-count-badge">{{ $cat['menu_count'] ?? 0 }} menu</span>
                                        </td>
                                        <td>
                                            <span class="status-pill">
                                                <i class="fa-solid fa-circle" style="font-size: 6px;"></i> Aktif
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-btns" style="justify-content: flex-end;">
                                                <button type="button" class="btn-icon" onclick="editCategory({{ json_encode($cat) }})" title="Edit Kategori">
                                                    <i class="fa-solid fa-pencil" style="font-size: 12px;"></i>
                                                </button>
                                                <form action="{{ url('/kategori/' . $cat['id']) }}" method="POST" onsubmit="return confirm('Hapus kategori {{ $cat['name'] }}?');" style="margin: 0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-icon delete" title="Hapus Kategori">
                                                        <i class="fa-solid fa-trash-can" style="font-size: 12px;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center; color: #94a3b8; padding: 40px;">Belum ada kategori yang ditambahkan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function updatePreview() {
        const input = document.getElementById('cat-name-input');
        const previewText = document.getElementById('preview-text');
        previewText.innerText = input.value.trim() ? input.value : 'Nama Kategori';
    }

    function pickColor(color, el) {
        document.querySelectorAll('.color-dot').forEach(d => d.classList.remove('active'));
        if (el) el.classList.add('active');
        document.getElementById('cat-color-input').value = color;
        document.getElementById('preview-strip').style.backgroundColor = color;
    }

    function editCategory(cat) {
        document.getElementById('form-card-title').innerText = 'Edit Kategori';
        document.getElementById('cat-name-input').value = cat.name;
        document.getElementById('preview-text').innerText = cat.name;

        const color = cat.color || '#0284c7';
        document.getElementById('cat-color-input').value = color;
        document.getElementById('preview-strip').style.backgroundColor = color;

        document.querySelectorAll('.color-dot').forEach(d => {
            if (d.getAttribute('data-color') === color) {
                d.classList.add('active');
            } else {
                d.classList.remove('active');
            }
        });

        const form = document.getElementById('category-form');
        form.action = '/kategori/' + cat.id;
        document.getElementById('method-slot').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('btn-submit-cat').innerText = '✓ Update Kategori';

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function resetForm() {
        document.getElementById('form-card-title').innerText = 'Tambah Kategori';
        const form = document.getElementById('category-form');
        form.reset();
        form.action = '/kategori';
        document.getElementById('method-slot').innerHTML = '';
        document.getElementById('btn-submit-cat').innerText = '+ Tambah Kategori';
        pickColor('#0284c7', document.querySelector('.color-dot[data-color="#0284c7"]'));
        document.getElementById('preview-text').innerText = 'Nama Kategori';
    }
</script>

</body>
</html>
