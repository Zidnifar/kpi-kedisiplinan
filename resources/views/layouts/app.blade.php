
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - KPI Kedisiplinan</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Segoe UI',Arial,sans-serif;background:#eef2f6;color:#101828;min-height:100vh}
        .app-container{min-height:100vh}
        .sidebar{position:fixed;top:0;left:0;width:235px;height:100vh;background:#172b4d;color:#fff;z-index:100;overflow-y:auto}
        .sidebar-brand{height:96px;padding:20px 17px;display:flex;align-items:center;gap:9px}
        .brand-logo{width:50px;height:50px;border-radius:11px;background:#ff941c;display:flex;align-items:center;justify-content:center;color:#fff;font-size:15px;font-weight:700;flex-shrink:0}
        .brand-info{min-width:0}
        .brand-title{font-size:14px;font-weight:700;white-space:nowrap}
        .brand-company{font-size:10px;line-height:1.4;color:#d0d5dd;margin-top:4px}
        .sidebar-label{padding:6px 20px 12px;font-size:10px;font-weight:700;color:#98a2b3}
        .sidebar-menu{padding:0 15px 20px}
        .sidebar-menu a{height:30px;margin-bottom:4px;padding:0 11px;display:flex;align-items:center;gap:10px;border-radius:7px;text-decoration:none;color:#fff;font-size:12px;font-weight:600;transition:.2s}
        .sidebar-menu a:hover{background:rgba(255,255,255,.12)}
        .sidebar-menu a.active{background:#ff941c;color:#fff}
        .sidebar-menu a.disabled{cursor:default;opacity:1}
        .menu-icon{width:20px;height:20px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
        .menu-icon svg{width:14px;height:14px;stroke:currentColor;stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round}
        .main-area{margin-left:235px;min-height:100vh}
        .topbar{height:48px;background:#fff;display:flex;align-items:center;justify-content:space-between;padding:0 22px 0 28px;position:sticky;top:0;z-index:50}
        .page-title{font-size:20px;font-weight:700;color:#101828}
        .topbar-right{display:flex;align-items:center;gap:22px}
        .notification{width:24px;height:24px;display:flex;align-items:center;justify-content:center;color:#172b4d}
        .notification svg{width:17px;height:17px;stroke:currentColor;stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round}
        .profile-container{position:relative}
        .profile-button{border:0;background:transparent;display:flex;align-items:center;gap:10px;cursor:pointer;color:#101828;text-align:left}
        .profile-avatar{width:38px;height:38px;border-radius:50%;background:#d0d5dd;display:flex;align-items:center;justify-content:center;color:#fff;flex-shrink:0}
        .profile-avatar svg{width:19px;height:19px;fill:#fff}
        .profile-info{min-width:100px}
        .profile-name{font-size:13px;font-weight:700}
        .profile-role{font-size:10px;color:#667085;margin-top:3px}
        .profile-arrow{width:17px;height:17px;stroke:#172b4d;stroke-width:2;fill:none;stroke-linecap:round;stroke-linejoin:round;transition:transform .2s}
        .profile-button.active .profile-arrow{transform:rotate(180deg)}
        .dropdown-menu{position:absolute;top:48px;right:0;width:175px;background:#fff;border:1px solid #e4e7ec;border-radius:9px;box-shadow:0 5px 18px rgba(16,24,40,.12);padding:6px;display:none;z-index:200}
        .dropdown-menu.show{display:block}
        .dropdown-menu a,.dropdown-menu button{width:100%;min-height:36px;padding:8px 10px;display:flex;align-items:center;gap:9px;text-decoration:none;color:#344054;font-family:inherit;font-size:12px;font-weight:500;border:0;background:transparent;border-radius:6px;cursor:pointer;text-align:left}
        .dropdown-menu a:hover,.dropdown-menu button:hover{background:#f2f4f7}
        .dropdown-menu svg{width:16px;height:16px;stroke:currentColor;stroke-width:1.8;fill:none;stroke-linecap:round;stroke-linejoin:round}
        .dropdown-divider{height:1px;background:#eaecf0;margin:5px 0}
        .logout-button{color:#d92d20!important}
        .content-area{padding:16px 20px 24px;width:100%;min-width:0}
        @media(max-width:900px){
            .sidebar{width:200px}
            .main-area{margin-left:200px}
            .content-area{padding:14px 12px 20px}
            .topbar{padding:0 14px}
            .page-title{font-size:18px}
        }
        @media(max-width:600px){
            .sidebar{width:65px}
            .sidebar-brand{height:75px;padding:12px 8px;justify-content:center}
            .brand-logo{width:43px;height:43px;font-size:13px}
            .brand-info,.sidebar-label,.menu-text{display:none}
            .sidebar-menu{padding:10px 9px}
            .sidebar-menu a{justify-content:center;padding:0;margin-bottom:8px}
            .menu-icon{width:22px;height:22px}
            .main-area{margin-left:65px}
            .topbar{height:52px;padding:0 10px}
            .page-title{font-size:16px}
            .topbar-right{gap:10px}
            .profile-avatar{width:32px;height:32px}
            .profile-info{display:none}
            .content-area{padding:12px 8px 18px}
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="app-container">
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">KPI</div>
            <div class="brand-info">
                <div class="brand-title">KPI Kedisiplinan</div>
                <div class="brand-company">PT. Intan Wijaya<br>Internasional Tbk.</div>
            </div>
        </div>
        <div class="sidebar-label">MENU ADMIN</div>
        <nav class="sidebar-menu">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="menu-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></span>
                <span class="menu-text">Dashboard</span>
            </a>
            <a href="#" class="disabled">
                <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M10 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM20 8v6M23 11h-6"/></svg></span>
                <span class="menu-text">Pengguna</span>
            </a>
            <a href="#" class="disabled">
                <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/></svg></span>
                <span class="menu-text">Data Karyawan</span>
            </a>
            <a href="#" class="disabled">
                <span class="menu-icon"><svg viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h6M9 13h6M9 17h3"/></svg></span>
                <span class="menu-text">Data Absensi</span>
            </a>
            <a href="#" class="disabled">
                <span class="menu-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span>
                <span class="menu-text">Shift Kerja</span>
            </a>
            <a href="#" class="disabled">
                <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M4 4h16v16H4zM8 8h8M8 12h8M8 16h5"/></svg></span>
                <span class="menu-text">Rekap Lembur</span>
            </a>
            <a href="#" class="disabled">
                <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></svg></span>
                <span class="menu-text">Penilaian KPI</span>
            </a>
            <a href="#" class="disabled">
                <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM5 21a7 7 0 0 1 14 0"/></svg></span>
                <span class="menu-text">Hasil KPI</span>
            </a>
            <a href="#" class="disabled">
                <span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16M8 4v4M16 10v4M10 16v4"/></svg></span>
                <span class="menu-text">Pengaturan KPI</span>
            </a>
        </nav>
    </aside>
    <main class="main-area">
        <header class="topbar">
            <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
            <div class="topbar-right">
                <div class="notification">
                    <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9M10 21h4"/></svg>
                </div>
                <div class="profile-container">
                    <button type="button" class="profile-button" id="profileButton">
                        <div class="profile-avatar">
                            <svg viewBox="0 0 24 24"><path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0 2c-4 0-7 2-7 5v1h14v-1c0-3-3-5-7-5z"/></svg>
                        </div>
                        <div class="profile-info">
                            <div class="profile-name">{{ auth()->user()->username ?? 'Admin Sistem' }}</div>
                            <div class="profile-role">Administrator</div>
                        </div>
                        <svg class="profile-arrow" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="dropdown-menu" id="profileDropdown">
                        <a href="#">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M5 21a7 7 0 0 1 14 0"/></svg>
                            Profil Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="logout-button">
                                <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9"/></svg>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <div class="content-area">
            @yield('content')
        </div>
    </main>
</div>
<script>
document.addEventListener('DOMContentLoaded',function(){
    const profileButton=document.getElementById('profileButton');
    const profileDropdown=document.getElementById('profileDropdown');
    if(profileButton&&profileDropdown){
        profileButton.addEventListener('click',function(event){
            event.stopPropagation();
            profileDropdown.classList.toggle('show');
            profileButton.classList.toggle('active');
        });
        document.addEventListener('click',function(event){
            if(!profileButton.contains(event.target)&&!profileDropdown.contains(event.target)){
                profileDropdown.classList.remove('show');
                profileButton.classList.remove('active');
            }
        });
    }
});
</script>
@stack('scripts')
</body>
</html>
