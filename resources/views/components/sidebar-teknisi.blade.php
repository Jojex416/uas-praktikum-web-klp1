<aside class="sidebar-mobile fixed lg:relative w-64 bg-white border-r border-gray-200 min-h-screen z-50 shadow-sm">
    <div class="p-6 border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-lg flex items-center justify-center">
                <i class="fas fa-tools text-white text-sm"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-800">LaporKampus</h1>
                <p class="text-xs text-gray-400">Panel Teknisi</p>
            </div>
        </div>
    </div>
    
    <nav class="p-4">
        <div class="mb-6 p-3 bg-emerald-50 rounded-xl">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-emerald-600 rounded-full flex items-center justify-center text-white text-sm font-semibold">BJ</div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name ?? 'Blenvilo J' }}</p>
                    <p class="text-xs text-emerald-600">Teknisi</p>
                </div>
            </div>
        </div>
        
        <a href="{{ route('teknisi.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-all duration-200 mb-1">
            <i class="fas fa-tachometer-alt w-5"></i>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('teknisi.laporan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 transition-all duration-200 mb-1">
            <i class="fas fa-clipboard-list w-5"></i>
            <span>Semua Laporan</span>
        </a>
        
        <div class="border-t border-gray-100 my-4"></div>
        
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-500 hover:bg-red-50 hover:text-red-600 transition-all duration-200 w-full">
                <i class="fas fa-sign-out-alt w-5"></i>
                <span>Logout</span>
            </button>
        </form>
    </nav>
</aside>