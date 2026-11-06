<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KPI Kedisiplinan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f4f6f9;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 35px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        .login-container h2 {
            text-align: center;
            color: #17365d;
            margin-bottom: 10px;
        }
        .login-container p {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
        }
        input:focus {
            border-color: #17365d;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #17365d;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }
        button:hover {
            background: #102846;
        }
        .error {
            padding: 10px;
            margin-bottom: 15px;
            background: #ffe5e5;
            color: #b42318;
            border-radius: 6px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>KPI Kedisiplinan</h2>
        <p>Silakan masuk menggunakan akun Anda</p>
        @if (session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('login.proses') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Masukkan username"
                    required
>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>