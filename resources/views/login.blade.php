<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cakrawala Eatery & Cafe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f1f3f7;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-radius: 20px;
            padding: 36px 36px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: left;
        }

        .brand-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .pos-badge {
            background: #111827;
            color: #ffffff;
            font-size: 11px;
            font-weight: 800;
            padding: 5px 9px;
            border-radius: 8px;
            letter-spacing: 0.5px;
        }

        .brand-info h1 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            color: #111827;
        }

        .brand-info p {
            margin: 2px 0 0;
            font-size: 11px;
            color: #6b7280;
        }

        .title {
            margin: 0;
            color: #111827;
            font-size: 24px;
            font-weight: 800;
        }

        .subtitle {
            font-size: 13px;
            color: #6b7280;
            margin: 6px 0 24px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i.prefix-icon {
            position: absolute;
            left: 14px;
            color: #9ca3af;
            font-size: 14px;
        }

        .input-wrapper input {
            width: 100%;
            height: 44px;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            border-radius: 10px;
            padding: 0 40px 0 38px;
            font-size: 13px;
            color: #111827;
            outline: none;
            transition: all 0.2s ease;
        }

        .input-wrapper input:focus {
            border-color: #111827;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(17, 24, 39, 0.08);
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            border: none;
            background: none;
            cursor: pointer;
            color: #9ca3af;
            font-size: 14px;
            padding: 4px;
        }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            font-size: 12px;
        }

        .remember-row label {
            display: flex;
            align-items: center;
            gap: 7px;
            cursor: pointer;
            color: #4b5563;
        }

        .btn-login {
            width: 100%;
            height: 46px;
            border: none;
            border-radius: 10px;
            background: #111827;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.2s;
        }

        .btn-login:hover {
            background: #000000;
        }

        .role-notice {
            text-align: center;
            font-size: 11px;
            color: #9ca3af;
            margin-top: 18px;
        }

        .error {
            background: #fef2f2;
            border: 1px solid #fee2e2;
            color: #b91c1c;
            font-size: 12px;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .success {
            background: #f0fdf4;
            border: 1px solid #dcfce7;
            color: #15803d;
            font-size: 12px;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="brand-header">
        <span class="pos-badge">POS</span>
        <div class="brand-info">
            <h1>Cakrawala Eatery & Cafe</h1>
            <p>Nikmat, Sehat, Terjangkau</p>
        </div>
    </div>

    <h2 class="title">Login</h2>
    <p class="subtitle">Masuk menggunakan username dan password akun POS</p>

    @if(session('error'))
        <div class="error">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if(session('status'))
        <div class="success">
            <i class="fa-solid fa-circle-check"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="login">Username / Email</label>
            <div class="input-wrapper">
                <i class="fa-regular fa-user prefix-icon"></i>
                <input 
                    type="text" 
                    name="login" 
                    id="login"
                    value="{{ old('login') }}"
                    placeholder="Masukkan username akun POS"
                    required
                    autofocus
                >
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="input-wrapper">
                <i class="fa-solid fa-lock prefix-icon"></i>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    placeholder="••••••••"
                    required
                >
                <button type="button" class="toggle-password" onclick="togglePassword()" title="Lihat password">
                    <i class="fa-regular fa-eye-slash" id="toggle-icon"></i>
                </button>
            </div>
        </div>

        <div class="remember-row">
            <label>
                <input type="checkbox" name="remember" value="1">
                <span>Ingat saya</span>
            </label>
            <a href="{{ route('password.request') }}" style="color:#4b5563; text-decoration:none;">Lupa Kata Sandi?</a>
        </div>

        <button type="submit" class="btn-login">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
            <span>Masuk</span>
        </button>
    </form>

    <div class="role-notice">
        Role akun menentukan menu yang dapat dibuka
    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('toggle-icon');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }
</script>

</body>
</html>