<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Masuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f5f6fb;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 360px;
            background: #ffffff;
            border-radius: 20px;
            padding: 24px 45px 42px;
            text-align: center;
        }

        .logo {
            width: 62px;
            height: 62px;
            border: 3px solid #0b2f80;
            border-radius: 50%;
            margin: 0 auto 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
        }

        h2 {
            margin: 0;
            color: #082f7e;
            font-size: 20px;
            font-weight: 700;
        }

        .subtitle {
            font-size: 11px;
            color: #777;
            margin: 8px 0 12px;
        }

        .forgot {
            text-align: right;
            margin-bottom: 18px;
        }

        .forgot a {
            font-size: 10px;
            color: #0b2f80;
            font-weight: 700;
            text-decoration: none;
        }

        .input-group {
            position: relative;
            margin-bottom: 18px;
        }

        .input-group i {
            position: absolute;
            left: 0;
            top: 8px;
            color: #9aa0a6;
            font-size: 13px;
        }

        .input-group input {
            width: 100%;
            border: none;
            border-bottom: 1px solid #d7d7d7;
            padding: 7px 28px 7px 24px;
            outline: none;
            font-size: 12px;
            color: #333;
        }

        .input-group input::placeholder {
            color: #b0b0b0;
        }

        .toggle-password {
            position: absolute;
            right: 0;
            top: 7px;
            border: none;
            background: none;
            cursor: pointer;
            color: #777;
        }

        .btn-login {
            width: 100%;
            margin-top: 22px;
            padding: 13px;
            border: none;
            border-radius: 25px;
            background: #002d7a;
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #001f57;
        }

        .error {
            background: #ffe5e5;
            color: #c0392b;
            font-size: 11px;
            padding: 8px;
            border-radius: 8px;
            margin-bottom: 14px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="logo">
        <img src="{{ asset('favicon.ico') }}" alt="Logo">
    </div>

    <h2>Masuk</h2>
    <p class="subtitle">Silakan login ke akun admin Anda</p>

    <div class="forgot">
       <a href="{{ route('password.request') }}">Lupa Kata Sandi?</a>
    </div>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-group">
            <i class="fa-regular fa-user"></i>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email') }}"
                placeholder="Nama pengguna / email pengguna"
                required
            >
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input 
                type="password" 
                name="password" 
                id="password"
                placeholder="Kata sandi"
                required
            >

            <button type="button" class="toggle-password" onclick="togglePassword()">
                <i class="fa-regular fa-eye-slash"></i>
            </button>
        </div>

        <button type="submit" class="btn-login">Masuk</button>
    </form>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        password.type = password.type === 'password' ? 'text' : 'password';
    }
</script>

</body>
</html>