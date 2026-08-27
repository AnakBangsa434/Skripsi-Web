<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Monitoring Stok Kain</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 420px;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 35px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-box {
            width: 70px;
            height: 70px;
            border: 2px solid #333;
            border-radius: 8px;
            margin: 0 auto 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 12px;
            font-weight: bold;
        }

        .company-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .system-name {
            font-size: 14px;
            color: #666;
        }

        .login-title {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin: 25px 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            height: 44px;
            padding: 10px 12px;

            border: 1px solid #ccc;
            border-radius: 5px;

            font-size: 14px;
            outline: none;
        }

        .form-control:focus {
            border-color: #333;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .btn-login {
            width: 100%;
            height: 44px;

            border: none;
            border-radius: 5px;

            background: #333;
            color: white;

            font-size: 15px;
            font-weight: bold;

            cursor: pointer;
        }

        .btn-login:hover {
            background: #222;
        }

        .error-message {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;

            padding: 10px 12px;
            border-radius: 5px;

            margin-bottom: 18px;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 15px;

            border-top: 1px solid #ddd;

            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <!-- LOGO -->
        <div class="logo">

            <div class="logo-box">
                LOGO
            </div>

            <div class="company-name">
                PT Clint Jaya Textile
            </div>

            <div class="system-name">
                Sistem Informasi Monitoring Stok Kain
            </div>

        </div>


        <!-- JUDUL -->
        <div class="login-title">
            Login Admin
        </div>


        <!-- ERROR -->
        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif


        <!-- FORM LOGIN -->
        <form method="POST" action="{{ route('login') }}">

            @csrf

            <!-- EMAIL -->
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                    autofocus
                >

            </div>


            <!-- PASSWORD -->
            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required
                >

            </div>


            <!-- INGAT SAYA -->
            <div class="remember">

                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                >

                <label for="remember">
                    Ingat saya
                </label>

            </div>


            <!-- LOGIN -->
            <button type="submit" class="btn-login">
                Login
            </button>

        </form>


        <!-- FOOTER -->
        <div class="footer">
            © 2026 PT Clint Jaya Textile
        </div>

    </div>

</div>

</body>
</html>