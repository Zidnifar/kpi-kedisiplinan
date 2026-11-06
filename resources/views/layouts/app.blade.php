
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
            font-family: 'Segoe UI', Inter, Arial, sans-serif;
            font-size: 14px;
            background: #eef2f6;
            color: #1f2937;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 265px;
            height: 100vh;
            background: #172b4d;
            color: white;
            overflow-y: auto;
            z-index: 100;
        }
        .sidebar-brand {
            display: flex;
            align-items: center;
            padding: 22px 20px;
            gap: 10px;
        }
        .brand-logo {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            background: #ff941c;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 17px;
            font-weight: 700;
        }
        .brand-text h2 {
            font-size: 16px;
            margin-bottom: 4px;
        }
        .brand-text p {
            font-size: 11px;
            line-height: 1.3;
        }
        .sidebar-label {
            padding: 16px 24px 12px;
            font-size: 11px;
            font-weight: 600;
            opacity: 0.55;
        }
        .sidebar-menu {
            padding: 0 17px 20px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            height: 40px;
            padding: 0 14px;
            margin-bottom: 4px;
            border-radius: 8px;
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }
        .sidebar-menu a:hover {
            background: #294568;
        }
        .sidebar-menu a.active {
            background: #ff941c;
        }
        .menu-icon {
            width: 32px;
            font-size: 17px;
        }
        .main {
            margin-left: 265px;
            min-height: 100vh;
        }
        .topbar {
            height: 72px;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 33px;
        }
        .topbar h1 {
            font-size: 24px;
            font-weight: 700;
            color: #000;
        }
        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .notification {
            font-size: 20px;
            margin-right: 12px;
        }
        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #d0d5dd;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: 700;
        }
        .user-details strong {
            display: block;
            font-size: 15px;
            color: #111;
        }
        .user-details span {
            display: block;
            margin-top: 3px;
            font-size: 12px;
            color: #6b7280;
        }
        .content {
            padding: 24px 33px 35px;
        }
        .logout-form {
            padding: 12px 0;
        }
        .logout-button {
            width: 100%;
            height: 40px;
            border: none;
            border-radius: 8px;
            background: #a83232;
            color: white;
            font-size: 14px;
            font-weight: 600;
            text-align: left;
            padding: 0 14px;
            cursor: pointer;
        }
        .logout-button:hover {
            background: #872727;
        }
        @media (max-width: 900px) {
            .sidebar {
                width: 220px;
            }
            .main {
                margin-left: 220px;
            }
            .content {
                padding: 20px;
            }
        }
        @media (max-width: 650px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .sidebar-menu {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }
            .main {
                margin-left: 0;
            }
            .topbar {
                padding: 0 16px;
            }
            .topbar h1 {
                font-size: 19px;
            }
            .content {
                padding: 16px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">KPI</div>
            <div class="brand-text">
                <h2>KPI Kedisiplinan</h2>
                <p>PT. Intanwijaya</p>
                <p>Internasional Tbk.</p>
            </div>
        </div>
        <div class="sidebar-label">MENU ADMIN</div>
        <nav class="sidebar-menu">
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="menu-icon">▦</span>
                Dashboard
            </a>
            <a href="#">
                <span class="menu-icon">♙</span>
                Pengguna
            </a>
            <a href="#">
                <span class="menu-icon">♧</span>
                Data Karyawan
            </a>
            <a href="#">
                <span class="menu-icon">▣</span>
                Data Absensi
            </a>
            <a href="#">
                <span class="menu-icon">◷</span>
                Shift Kerja
            </a>
            <a href="#">
                <span class="menu-icon">▤</span>
                Rekap Lembur
            </a>
            <a href="#">
                <span class="menu-icon">✓</span>
                Penilaian KPI
            </a>
            <a href="#">
                <span class="menu-icon">♙</span>
                Hasil KPI
            </a>
            <a href="#">
                <span class="menu-icon">☷</span>
                Pengaturan KPI
            </a>
            <form action="{{ route('logout') }}"
                  method="POST"
                  class="logout-form">
                @csrf
                <button type="submit" class="logout-button">
                    Keluar
                </button>
            </form>
        </nav>
    </aside>
    <main class="main">
        <header class="topbar">
            <h1>@yield('header', 'Dashboard')</h1>
            <div class="topbar-user">
                <div class="notification">♧</div>
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                </div>
                <div class="user-details">
                    <strong>{{ Auth::user()->username }}</strong>
                    <span>Administrator</span>
                </div>
            </div>
        </header>
        <section class="content">
            @yield('content')
        </section>
    </main>
    @stack('scripts')
</body>
</html>
