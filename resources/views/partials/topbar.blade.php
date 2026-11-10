<header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 z-10">
    <!-- Toggle Sidebar Button -->
    <button @click="sidebarOpen = !sidebarOpen" class="text-slate-500 hover:text-slate-700 focus:outline-none transition">
        <i class="fa-solid fa-bars text-xl"></i>
    </button>

    <!-- Right Section (Notification & Profile) -->
    <div class="flex items-center space-x-4">
        <!-- Notification Bell -->
        <button class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-100 relative transition">
            <i class="fa-regular fa-bell text-base"></i>
            <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-rose-500 rounded-full ring-2 ring-white"></span>
        </button>

        <!-- User Profile Dropdown -->
        <div class="relative" x-data="{ profileOpen: false }">
            <button @click="profileOpen = !profileOpen" class="flex items-center space-x-3 focus:outline-none bg-slate-50 hover:bg-slate-100 border border-slate-200 px-3 py-1.5 rounded-full transition">
                <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-700 font-bold text-sm">
                    <i class="fa-solid fa-user text-xs"></i>
                </div>
                <div class="text-left hidden md:block">
                    <p class="text-xs font-bold text-slate-800 leading-tight">Admin Sistem</p>
                    <p class="text-[10px] text-slate-400">Administrator</p>
                </div>
                <i class="fa-solid fa-chevron-down text-xs text-slate-400 pl-1"></i>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="profileOpen" @click.away="profileOpen = false" class="absolute right-0 mt-2 w-48 bg-white border border-slate-200 rounded-xl shadow-lg py-1 z-50">
                <a href="#" class="block px-4 py-2 text-xs text-slate-600 hover:bg-slate-50">Profil Saya</a>
                <div class="border-t border-slate-100 my-1"></div>
                <form action="#" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 font-medium">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</header>