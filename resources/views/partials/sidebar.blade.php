<aside :class="sidebarOpen ? 'w-64' : 'w-20'" class="bg-[#111c44] text-slate-300 transition-all duration-300 flex flex-col shrink-0">
    <!-- Brand Logo -->
    <div class="h-24 flex items-center px-6">
        <div class="w-10 h-10 rounded-xl bg-[#ff8a00] flex items-center justify-center text-white font-black text-sm shrink-0 shadow-md">
            KPI
        </div>
        <div x-show="sidebarOpen" class="ml-3 overflow-hidden">
            <h2 class="text-white font-bold text-sm tracking-wide whitespace-nowrap">KPI Kedisiplinan</h2>
            <p class="text-[10px] text-slate-400 whitespace-nowrap">PT. Intanwijaya<br>Internasional Tbk.</p>
        </div>
    </div>

    <!-- Menu Section Title -->
    <div class="px-6 pb-2 text-[10px] uppercase tracking-wider text-slate-400 font-bold" x-show="sidebarOpen">
        MENU ADMIN
    </div>

    <!-- Menu Navigation -->
    <nav class="flex-1 px-4 space-y-1 overflow-y-auto text-sm font-medium">
        <!-- Dashboard (Active State Oranye) -->
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-xl bg-[#ff8a00] text-white shadow-sm transition">
            <i class="fa-solid fa-border-all w-5 text-center text-base"></i>
            <span x-show="sidebarOpen" class="ml-3">Dashboard</span>
        </a>

        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800/50 hover:text-white transition">
            <i class="fa-regular fa-user w-5 text-center text-base"></i>
            <span x-show="sidebarOpen" class="ml-3">Pengguna</span>
        </a>

        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800/50 hover:text-white transition">
            <i class="fa-solid fa-user-gear w-5 text-center text-base"></i>
            <span x-show="sidebarOpen" class="ml-3">Data Karyawan</span>
        </a>

        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800/50 hover:text-white transition">
            <i class="fa-regular fa-calendar-days w-5 text-center text-base"></i>
            <span x-show="sidebarOpen" class="ml-3">Data Absensi</span>
        </a>

        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800/50 hover:text-white transition">
            <i class="fa-regular fa-clock w-5 text-center text-base"></i>
            <span x-show="sidebarOpen" class="ml-3">Shift Kerja</span>
        </a>

        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800/50 hover:text-white transition">
            <i class="fa-regular fa-clipboard w-5 text-center text-base"></i>
            <span x-show="sidebarOpen" class="ml-3">Rekap Lembur</span>
        </a>

        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800/50 hover:text-white transition">
            <i class="fa-regular fa-circle-check w-5 text-center text-base"></i>
            <span x-show="sidebarOpen" class="ml-3">Penilaian KPI</span>
        </a>

        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800/50 hover:text-white transition">
            <i class="fa-solid fa-award w-5 text-center text-base"></i>
            <span x-show="sidebarOpen" class="ml-3">Hasil KPI</span>
        </a>

        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800/50 hover:text-white transition">
            <i class="fa-solid fa-sliders w-5 text-center text-base"></i>
            <span x-show="sidebarOpen" class="ml-3">Pengaturan KPI</span>
        </a>
    </nav>
</aside>