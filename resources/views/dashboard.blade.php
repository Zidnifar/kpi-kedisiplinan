<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KPI Kedisiplinan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: #f4f6f9;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 30px;
            background: #17365d;
            color: white;
        }
        .navbar h2 {
            font-size: 20px;
        }
        .navbar form button {
            padding: 9px 16px;
            border: none;
            border-radius: 5px;
            background: white;
            color: #17365d;
            cursor: pointer;
        }
        .container {
            padding: 30px;
        }
        .welcome {
            margin-bottom: 25px;
        }
        .welcome h2 {
            color: #17365d;
            margin-bottom: 8px;
        }
        .welcome p {
            color: #666;
        }
        .content {
            padding: 25px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .content h3 {
            margin-bottom: 12px;
            color: #333;
        }
        .content p {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>KPI Kedisiplinan</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    <div class="container">
        <div class="welcome">
            <h2>Selamat Datang, {{ Auth::user()->username }}!</h2>
            <p>Anda berhasil masuk ke Sistem KPI Kedisiplinan.</p>
        </div>
        <div class="content">
            <h3>Dashboard</h3>
            <p>
                Sistem ini digunakan untuk mengelola dan memantau
                penilaian KPI kedisiplinan karyawan Departemen Formalin.
            </p>
            <p>
                Role Anda: <strong>{{ Auth::user()->role }}</strong>
            </p>
        </div>
    </div>
</body>
</html>