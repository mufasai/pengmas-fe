<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            min-height:100vh;
            background:#f5f6fb;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card{
            width:420px;
            background:white;
            border-radius:24px;
            padding:50px 35px;
        }

        h2{
            color:#012b80;
            font-size:38px;
            font-weight:700;
            margin-bottom:10px;
        }

        .description{
            color:#666;
            font-size:14px;
            line-height:1.6;
            margin-bottom:30px;
        }

        .label{
            display:block;
            font-size:12px;
            font-weight:700;
            color:#444;
            margin-bottom:8px;
            text-transform:uppercase;
        }

        .input{
            width:100%;
            height:55px;
            border:1px solid #d6dbe8;
            border-radius:4px;
            padding:0 15px;
            font-size:14px;
            margin-bottom:35px;
        }

        .input:focus{
            outline:none;
            border-color:#012b80;
        }

        .btn{
            width:100%;
            height:55px;
            background:#012b80;
            color:white;
            border:none;
            border-radius:6px;
            font-size:22px;
            font-weight:600;
            cursor:pointer;
            box-shadow:0 4px 8px rgba(0,0,0,.15);
            transition:.3s;
        }

        .btn:hover{
            background:#001f5c;
        }

        .back-link{
            text-align:center;
            margin-top:20px;
        }

        .back-link a{
            color:#012b80;
            text-decoration:none;
            font-size:14px;
        }

        .success{
            background:#d4edda;
            color:#155724;
            padding:12px;
            border-radius:5px;
            margin-bottom:20px;
            font-size:14px;
        }

        .error{
            background:#f8d7da;
            color:#721c24;
            padding:12px;
            border-radius:5px;
            margin-bottom:20px;
            font-size:14px;
        }
    </style>
</head>
<body>

<div class="card">

    <h2>Lupa Kata Sandi</h2>

    <p class="description">
        Masukkan email pemulihan yang terdaftar untuk mengatur ulang kata sandi akun kasir Anda.
    </p>

    @if(session('status'))
        <div class="success">
            {{ session('status') }}
        </div>
    @endif

    @error('email')
        <div class="error">
            {{ $message }}
        </div>
    @enderror

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <label class="label">
            Email Pemulihan
        </label>

        <input
            type="email"
            name="email"
            class="input"
            placeholder="masukkan email anda"
            required
        >

        <button type="submit" class="btn">
            Kirim Link Pemulihan ➤
        </button>
    </form>

    <div class="back-link">
        <a href="{{ route('login') }}">
            Kembali ke Halaman Masuk
        </a>
    </div>

</div>

</body>
</html>