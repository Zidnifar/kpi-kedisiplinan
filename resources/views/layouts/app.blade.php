
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - KPI Kedisiplinan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }
        .sidebar {
            position: fixed;
            width: 250px;
            height: 100vh;
            background-color: #17365d;
            color: white;
            overflow-y: auto;
        }
        .sidebar-header {
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid #ffffff30;
        }
        .sidebar-header h2 {
            font-size: 19px;
            margin-bottom: 6px;
        }
        .sidebar-header p {
            font-size: 12px;
            color: #cbd5e1;
        }
        .menu {
            padding: 15px 12px;
        }
        .menu-title {
            font-size: 11px;
            color: #aebed1;
            margin: 18px 10px 8px;
            text-transform: uppercase;
        }
        .menu a {
            display: block;
            padding: 11px 12px;
            margin-bottom: 4px;
            color: #e5eaf1;
            text-decoration: none;
            font-size: 14px;
            border-radius: 6px;
        }
        .menu a:hover,
        .menu a.active {
            background-color: #294d78;
            color: white;
        }
        .main {
            margin-left: 250px;
            min-height: 100vh;
        }
        .navbar {
            height: 70px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 5px #00000010;
        }
        .navbar h3 {
            font-size: 18px;
            color: #17365d;
        }
        .user-info {
            font-size: 14px;
            text-align: right;
        }
        .user-info span {
            display: block;
            color: #777;
            font-size: 12px;
            margin-top: 4px;
        }
        .content {
            padding: 30px;
        }
        .page-title {
            font-size: 22px;
            color: #17365d;
            margin-bottom: 8px;
        }
        .page-description {
            color: #777;
            font-size: 14px;
            margin-bottom: 25px;
        }
        .logout-form {
            padding: 10px 12px;
        }
        .logout-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background-color: #a83232;
            color: white;
            cursor: pointer;
            text-align: left;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .main {
                margin-left: 0;
            }
            .navbar {
                padding: 0 15px;
            }
            .content {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>KPI KEDISIPLINAN</h2>
            <p>PT Intan Wijaya Internasional</p>
        </div>
        <nav class="menu">
            <p class="menu-title">Menu Utama</p>
            <a href="{{ route('dashboard') }}" class="active">
                Dashboard
            </a>
            <p class="menu-title">Master Data</p>
            <a href="#">Data Karyawan</a>
            <a href="#">Data Departemen</a>
            <a href="#">Data Pengguna</a>
            <a href="#">Data Shift Kerja</a>
            <a href="#">Jadwal Shift</a>
            
            <p class="menu-title">Absensi</p>
            <a href="#">Impor Absensi</a>
            <a href="#">Data Absensi</a>
            <a href="#">Kesalahan Absensi</a>
            <a href="#">Konfirmasi Absensi</a>
            
            <p class="menu-title">Penilaian KPI</p>
            <a href="#">Periode Penilaian</a>
            <a href="#">Indikator KPI</a>
            <a href="#">Predikat Nilai</a>
            <a href="#">Pelanggaran Karyawan</a>
            <a href="#">Hasil KPI</a>
            <a href="#">Nilai Semester</a>

            <p class="menu-title">Lembur</p>
            <a href="#">Rencana Lembur</a>
            <a href="#">Persetujuan Lembur</a>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    Keluar
                </button>
            </form>
        </nav>
    </aside>
    <main class="main">
        <header class="navbar">
            <h3>@yield('header', 'Dashboard')</h3>
            <div class="user-info">
                <strong>{{ Auth::user()->username }}</strong>
                <span>{{ Auth::user()->role }}</span>
            </div>
        </header>
        <section class="content">
            @yield('content')
        </section>
    </main>
</body>
</html>
