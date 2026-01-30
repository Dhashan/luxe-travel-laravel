<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui'],
                        },
                    }
                }
            }
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-[#fafaf9] text-gray-900 selection:bg-yellow-200">
        <div class="min-h-screen flex flex-col">
            <!-- Admin Premium Header -->
            <nav x-data="{ mobileOpen: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-6 lg:px-12">
                    <div class="flex justify-between h-20">
                        <div class="flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-4">
                                <h1 class="text-2xl font-black text-yellow-600 tracking-tighter">LUXE <span class="italic">Travel</span></h1>
                            </a>

                            <!-- Desktop Navigation -->
                            <div class="hidden space-x-8 lg:-my-px lg:ms-12 lg:flex">
                                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.dashboard') ? 'text-black border-b-2 border-yellow-600' : 'text-gray-400 hover:text-black transition' }}">
                                    Insight
                                </a>
                                <a href="{{ route('admin.users') }}" class="inline-flex items-center px-1 pt-1 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.users') ? 'text-black border-b-2 border-yellow-600' : 'text-gray-400 hover:text-black transition' }}">
                                    Clients
                                </a>
                                <a href="{{ route('admin.destinations') }}" class="inline-flex items-center px-1 pt-1 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.destinations') ? 'text-black border-b-2 border-yellow-600' : 'text-gray-400 hover:text-black transition' }}">
                                    Havens
                                </a>
                                <a href="{{ route('admin.experiences') }}" class="inline-flex items-center px-1 pt-1 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.experiences') ? 'text-black border-b-2 border-yellow-600' : 'text-gray-400 hover:text-black transition' }}">
                                    Curations
                                </a>
                                <a href="{{ route('admin.bookings') }}" class="inline-flex items-center px-1 pt-1 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.bookings') ? 'text-black border-b-2 border-yellow-600' : 'text-gray-400 hover:text-black transition' }}">
                                    Journeys
                                </a>
                            </div>
                        </div>

                        <!-- User Profile/Logout (Desktop Only for some, or tailored) -->
                        <div class="hidden lg:flex lg:items-center lg:space-x-6">
                            <a href="{{ url('/') }}" class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-yellow-600 transition">Portal View</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-red-600 hover:text-red-700 transition">Logout</button>
                            </form>
                        </div>

                        <!-- Hamburger -->
                        <div class="flex items-center lg:hidden">
                            <button @click="mobileOpen = ! mobileOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-black hover:bg-gray-50 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': mobileOpen, 'inline-flex': ! mobileOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! mobileOpen, 'inline-flex': mobileOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div :class="{'block': mobileOpen, 'hidden': ! mobileOpen}" class="hidden lg:hidden bg-white border-t border-gray-50">
                    <div class="pt-4 pb-6 space-y-2 px-6">
                        <a href="{{ route('admin.dashboard') }}" class="block py-4 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.dashboard') ? 'text-yellow-600' : 'text-gray-400' }}">Insight</a>
                        <a href="{{ route('admin.users') }}" class="block py-4 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.users') ? 'text-yellow-600' : 'text-gray-400' }}">Clients</a>
                        <a href="{{ route('admin.destinations') }}" class="block py-4 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.destinations') ? 'text-yellow-600' : 'text-gray-400' }}">Havens</a>
                        <a href="{{ route('admin.experiences') }}" class="block py-4 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.experiences') ? 'text-yellow-600' : 'text-gray-400' }}">Curations</a>
                        <a href="{{ route('admin.bookings') }}" class="block py-4 text-xs font-black uppercase tracking-widest {{ request()->routeIs('admin.bookings') ? 'text-yellow-600' : 'text-gray-400' }}">Journeys</a>
                        
                        <div class="pt-6 border-t border-gray-100 flex items-center justify-between">
                            <a href="{{ url('/') }}" class="text-[10px] font-black uppercase tracking-widest text-gray-400">Portal View</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-red-600">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="py-12">
                {{ $slot }}
            </main>

            <x-footer />
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
