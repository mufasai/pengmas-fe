<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Pengguna - Cakrawala Eatery & Cafe</title>
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 16px;
            flex-wrap: wrap;
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

        .btn-add-user {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #0f172a;
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s;
        }

        .btn-add-user:hover {
            background: #000000;
            transform: translateY(-1px);
        }

        /* Alert notifications */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* Stat cards */
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

        .stat-icon.role {
            background: #eff6ff;
            color: #2563eb;
        }

        .stat-icon.active {
            background: #ecfdf5;
            color: #059669;
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

        /* Table Card */
        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table th {
            text-align: left;
            padding: 14px 20px;
            font-size: 11px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 700;
            letter-spacing: 0.5px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        .user-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
            vertical-align: middle;
        }

        .user-table tr:last-child td {
            border-bottom: none;
        }

        .user-table tr:hover td {
            background: #fafafa;
        }

        /* User profile cell */
        .user-profile-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar-circle {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            color: #ffffff;
            background: #10b981;
            flex-shrink: 0;
            text-transform: uppercase;
        }

        .avatar-circle.kasir {
            background: #3b82f6;
        }

        .user-name-title {
            font-weight: 600;
            color: #0f172a;
            line-height: 1.3;
        }

        .user-email-subtitle {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 2px;
        }

        .username-badge {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            background: #f1f5f9;
            color: #334155;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Role badge */
        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .role-badge.admin {
            background: #e0f2fe;
            color: #0369a1;
        }

        .role-badge.kasir {
            background: #f1f5f9;
            color: #475569;
        }

        /* Password masked */
        .password-masked {
            letter-spacing: 2px;
            color: #94a3b8;
            font-weight: 700;
            font-size: 14px;
        }

        /* Status pill */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 600;
            color: #059669;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10b981;
        }

        .status-badge.inactive {
            color: #94a3b8;
        }

        .status-badge.inactive .status-dot {
            background: #cbd5e1;
        }

        .login-time {
            font-size: 12px;
            color: #64748b;
        }

        /* Action buttons */
        .action-btns {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-action-icon {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #64748b;
            cursor: pointer;
            transition: all 0.15s;
            font-size: 13px;
        }

        .btn-action-icon:hover {
            background: #f8fafc;
            color: #0f172a;
            border-color: #cbd5e1;
        }

        .btn-action-icon.delete:hover {
            background: #fef2f2;
            color: #dc2626;
            border-color: #fecaca;
        }

        /* Modals */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(2px);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-card {
            background: #ffffff;
            border-radius: 14px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            animation: modalPop 0.2s ease-out;
        }

        @keyframes modalPop {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .modal-header {
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #f1f5f9;
        }

        .modal-title {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
        }

        .btn-close-modal {
            background: none;
            border: none;
            color: #94a3b8;
            font-size: 18px;
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
        }

        .btn-close-modal:hover {
            color: #0f172a;
        }

        .modal-body {
            padding: 24px;
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
            height: 42px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 0 14px;
            font-size: 13px;
            outline: none;
            transition: border-color 0.15s;
        }

        .form-control:focus {
            border-color: #0f172a;
            box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.06);
        }

        .form-hint {
            font-size: 11px;
            color: #64748b;
            margin-top: 5px;
        }

        .role-radio-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 6px;
        }

        .role-radio-label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.15s;
        }

        .role-radio-label:hover {
            border-color: #94a3b8;
            background: #f8fafc;
        }

        .role-radio-label input[type="radio"]:checked + .role-radio-content .role-name {
            color: #0f172a;
            font-weight: 700;
        }

        .role-radio-label:has(input[type="radio"]:checked) {
            border-color: #0f172a;
            background: #f8fafc;
        }

        .role-radio-content {
            display: flex;
            flex-direction: column;
        }

        .role-name {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
        }

        .role-desc {
            font-size: 11px;
            color: #94a3b8;
        }

        .modal-footer {
            padding: 16px 24px;
            background: #f8fafc;
            border-top: 1px solid #f1f5f9;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-modal-cancel {
            padding: 9px 16px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-modal-submit {
            padding: 9px 20px;
            border: none;
            background: #0f172a;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-modal-submit:hover {
            background: #000000;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="layout">
        {{-- Sidebar navigasi --}}
        @include('layouts.sidebar')

        <div class="main-wrapper">
            {{-- Header atas --}}
            @include('layouts.header')

            <main class="content">
                {{-- Header Halaman (Manual Book Hal 26) --}}
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Akun Pengguna</h1>
                        <p class="page-subtitle">Kelola akun Admin dan Kasir yang bisa login ke sistem kasir ini.</p>
                    </div>
                    <button type="button" class="btn-add-user" onclick="openAddModal()">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Tambah Akun</span>
                    </button>
                </div>

                {{-- Alert Pesan --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                {{-- 3 Statistik Kartu (Manual Book Hal 26) --}}
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon total">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">TOTAL AKUN</span>
                            <span class="stat-value">{{ $totalUsers ?? count($users) }}</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon role">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">ADMIN / KASIR</span>
                            <span class="stat-value">{{ $adminCount ?? 1 }} / {{ $kasirCount ?? 1 }}</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon active">
                            <i class="fa-solid fa-user-check"></i>
                        </div>
                        <div class="stat-info">
                            <span class="stat-label">AKUN AKTIF</span>
                            <span class="stat-value">{{ $activeCount ?? count($users) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Tabel Daftar Akun Pengguna --}}
                <div class="card">
                    <div class="table-responsive">
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>USERNAME</th>
                                    <th>ROLE</th>
                                    <th>PASSWORD</th>
                                    <th>STATUS</th>
                                    <th>TERAKHIR LOGIN</th>
                                    <th style="text-align: right;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    @php
                                        $initial = strtoupper(substr($user['name'] ?? 'U', 0, 1));
                                        $role = strtolower($user['role'] ?? 'kasir');
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="user-profile-cell">
                                                <div class="avatar-circle {{ $role }}">
                                                    {{ $initial }}
                                                </div>
                                                <div>
                                                    <div class="user-name-title">{{ $user['name'] ?? 'Pengguna' }}</div>
                                                    <div class="user-email-subtitle">{{ $user['email'] ?? ($user['username'] . '@cakrawala.com') }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="username-badge">{{ $user['username'] ?? '-' }}</span>
                                        </td>
                                        <td>
                                            @if($role === 'admin')
                                                <span class="role-badge admin">
                                                    <i class="fa-solid fa-shield"></i>
                                                    Admin
                                                </span>
                                            @else
                                                <span class="role-badge kasir">
                                                    <i class="fa-solid fa-user"></i>
                                                    Kasir
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="password-masked">••••••</span>
                                        </td>
                                        <td>
                                            @if(!isset($user['is_active']) || $user['is_active'])
                                                <span class="status-badge">
                                                    <span class="status-dot"></span>
                                                    Aktif
                                                </span>
                                            @else
                                                <span class="status-badge inactive">
                                                    <span class="status-dot"></span>
                                                    Nonaktif
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="login-time">{{ $user['last_login_at'] ?? '29 Jun 2026, 03:38' }}</span>
                                        </td>
                                        <td>
                                            <div class="action-btns" style="justify-content: flex-end;">
                                                <button type="button" class="btn-action-icon" title="Edit Akun"
                                                    onclick="openEditModal({{ json_encode($user) }})">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                                <form action="{{ url('/pengguna/' . $user['id']) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun {{ $user['name'] }}?');"
                                                    style="margin: 0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-action-icon delete" title="Hapus Akun">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" style="text-align: center; padding: 40px; color: #94a3b8;">
                                            <i class="fa-solid fa-users" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
                                            Belum ada data akun pengguna.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- Modal Tambah Akun (Manual Book Hal 26) --}}
    <div id="modalAddUser" class="modal-overlay">
        <div class="modal-card">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Akun Pengguna</h3>
                <button type="button" class="btn-close-modal" onclick="closeAddModal()">&times;</button>
            </div>
            <form action="{{ url('/pengguna') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Danny Kasir Sore" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Username *</label>
                        <input type="text" name="username" class="form-control" placeholder="Contoh: kasir_sore" required autocomplete="off">
                        <div class="form-hint">Digunakan untuk masuk ke sistem kasir</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password *</label>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required minlength="6">
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Hak Akses (Role) *</label>
                        <div class="role-radio-group">
                            <label class="role-radio-label">
                                <input type="radio" name="role" value="kasir" checked>
                                <div class="role-radio-content">
                                    <span class="role-name">Kasir</span>
                                    <span class="role-desc">Akses POS & transaksi</span>
                                </div>
                            </label>
                            <label class="role-radio-label">
                                <input type="radio" name="role" value="admin">
                                <div class="role-radio-content">
                                    <span class="role-name">Admin</span>
                                    <span class="role-desc">Akses seluruh sistem</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal-cancel" onclick="closeAddModal()">Batal</button>
                    <button type="submit" class="btn-modal-submit">+ Tambah Akun</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit Akun (Manual Book Hal 26) --}}
    <div id="modalEditUser" class="modal-overlay">
        <div class="modal-card">
            <div class="modal-header">
                <h3 class="modal-title">Edit Akun Pengguna</h3>
                <button type="button" class="btn-close-modal" onclick="closeEditModal()">&times;</button>
            </div>
            <form id="formEditUser" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text" id="edit_name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Username *</label>
                        <input type="text" id="edit_username" name="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Ganti Password (Opsional)</label>
                        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password" minlength="6">
                        <div class="form-hint">Isi hanya jika ingin mengubah kata sandi akun ini.</div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Hak Akses (Role) *</label>
                        <div class="role-radio-group">
                            <label class="role-radio-label">
                                <input type="radio" id="edit_role_kasir" name="role" value="kasir">
                                <div class="role-radio-content">
                                    <span class="role-name">Kasir</span>
                                    <span class="role-desc">Akses POS & transaksi</span>
                                </div>
                            </label>
                            <label class="role-radio-label">
                                <input type="radio" id="edit_role_admin" name="role" value="admin">
                                <div class="role-radio-content">
                                    <span class="role-name">Admin</span>
                                    <span class="role-desc">Akses seluruh sistem</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal-cancel" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="btn-modal-submit">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('modalAddUser').classList.add('active');
        }

        function closeAddModal() {
            document.getElementById('modalAddUser').classList.remove('active');
        }

        function openEditModal(user) {
            document.getElementById('formEditUser').action = "{{ url('/pengguna') }}/" + user.id;
            document.getElementById('edit_name').value = user.name || '';
            document.getElementById('edit_username').value = user.username || '';
            
            const role = (user.role || 'kasir').toLowerCase();
            if (role === 'admin') {
                document.getElementById('edit_role_admin').checked = true;
            } else {
                document.getElementById('edit_role_kasir').checked = true;
            }

            document.getElementById('modalEditUser').classList.add('active');
        }

        function closeEditModal() {
            document.getElementById('modalEditUser').classList.remove('active');
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeAddModal();
                closeEditModal();
            }
        });
    </script>
</body>
</html>
