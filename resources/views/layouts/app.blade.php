<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LaporKampus - @yield('title')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        * { font-family: 'Inter', sans-serif; }
        
        .status-menunggu { 
            background: #FEF3C7; 
            color: #D97706; 
            padding: 4px 12px; 
            border-radius: 20px; 
            font-size: 12px; 
            font-weight: 600;
        }
        .status-diproses { 
            background: #DBEAFE; 
            color: #2563EB; 
            padding: 4px 12px; 
            border-radius: 20px; 
            font-size: 12px; 
            font-weight: 600;
        }
        .status-selesai { 
            background: #D1FAE5; 
            color: #059669; 
            padding: 4px 12px; 
            border-radius: 20px; 
            font-size: 12px; 
            font-weight: 600;
        }
        
        .sidebar-transition { transition: all 0.3s ease; }
        
        @media (max-width: 768px) {
            .sidebar-mobile { 
                transform: translateX(-100%); 
                position: fixed; 
                top: 0; 
                left: 0; 
                height: 100vh; 
                z-index: 50; 
                overflow-y: auto; 
                width: 280px; 
            }
            .sidebar-mobile.open { transform: translateX(0); }
            .overlay { 
                display: none; 
                position: fixed; 
                top: 0; 
                left: 0; 
                right: 0; 
                bottom: 0; 
                background: rgba(0,0,0,0.5); 
                z-index: 40; 
            }
            .overlay.active { display: block; }
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05), 0 10px 10px -5px rgba(0,0,0,0.01);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-[#F8FAFC]">

<div id="overlay" class="overlay" onclick="closeSidebar()"></div>

<div class="flex min-h-screen">
    @yield('sidebar')

    <div class="flex-1 flex flex-col min-h-screen">
        <!-- Navbar -->
        <nav class="bg-white border-b border-gray-100 px-6 py-4 flex justify-between items-center sticky top-0 z-30">
            <button id="sidebarToggle" class="lg:hidden text-gray-500 hover:text-gray-700 text-xl">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="flex items-center gap-4">
                <div class="hidden sm:block text-right">
                    <p class="text-sm font-semibold text-gray-800" id="userName">@yield('user_name', 'Pengguna')</p>
                    <p class="text-xs text-gray-500" id="userRole">@yield('user_role', 'Role')</p>
                </div>
                <div class="w-9 h-9 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center text-white text-sm font-semibold shadow-sm">
                    {{ substr(implode('', array_slice(str_split(view()->shared('user_name', 'U')), 0, 1)), 0, 1) }}
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6 lg:p-8">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('components.footer')
    </div>
</div>

<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const overlay = document.getElementById('overlay');
    
    function closeSidebar() {
        document.querySelectorAll('.sidebar-mobile').forEach(s => s.classList.remove('open'));
        overlay?.classList.remove('active');
    }
    
    sidebarToggle?.addEventListener('click', () => {
        const sidebar = document.querySelector('.sidebar-mobile');
        sidebar?.classList.toggle('open');
        overlay?.classList.toggle('active');
    });
</script>
@stack('scripts')
</body>
</html>