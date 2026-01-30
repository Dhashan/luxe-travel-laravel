<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LUXE TRAVEL - Your Journey Begins</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
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
    </head>
    <body class="bg-black font-sans antialiased min-h-screen flex items-center justify-center p-6 selection:bg-yellow-500">
        <!-- Immersive Background -->
        <div class="fixed inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1436491865332-7a61a109c0f3?q=80&w=2000" class="absolute inset-0 w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/20 to-black/80"></div>
        </div>

        <main class="relative z-10 w-full max-w-5xl text-center px-4">
            <p class="text-yellow-500 text-[10px] lg:text-xs font-black uppercase tracking-[0.5em] mb-6 lg:mb-8 animate-in slide-in-from-bottom-4 duration-1000">Excellence in Motion</p>
            <h1 class="text-5xl md:text-8xl lg:text-9xl font-black text-white tracking-tighter mb-10 lg:mb-12 animate-in fade-in duration-1000 leading-tight">
                LUXE <span class="italic text-yellow-600 block md:inline mt-2 md:mt-0">TRAVEL</span>
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 max-w-3xl mx-auto animate-in fade-in slide-in-from-bottom-8 duration-1000 delay-300">
                <div class="bg-white/10 backdrop-blur-2xl border border-white/20 p-8 lg:p-12 rounded-[2.5rem] lg:rounded-[3.5rem] hover:bg-white/20 transition group shadow-2xl">
                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-white/40 mb-6 lg:mb-8 block">Client Access</p>
                    <div class="space-y-4">
                        <a href="{{ route('user.login') }}" class="block w-full py-4 lg:py-5 bg-yellow-600 text-white rounded-full text-[10px] lg:text-xs font-black uppercase tracking-widest hover:bg-yellow-700 transition shadow-xl">Private Login</a>
                        <a href="{{ route('user.register') }}" class="block w-full py-4 lg:py-5 border border-white/20 text-white rounded-full text-[10px] lg:text-xs font-black uppercase tracking-widest hover:bg-white hover:text-black transition">Apply for Membership</a>
                    </div>
                </div>

                <div class="bg-black/40 backdrop-blur-2xl border border-white/5 p-8 lg:p-12 rounded-[2.5rem] lg:rounded-[3.5rem] hover:bg-black/60 transition shadow-2xl flex flex-col justify-center">
                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-white/20 mb-6 lg:mb-8 block">Management</p>
                    <a href="{{ route('admin.login') }}" class="block w-full py-4 lg:py-5 bg-white text-black rounded-full text-[10px] lg:text-xs font-black uppercase tracking-widest hover:bg-yellow-600 hover:text-white transition shadow-xl text-center">Personnel Login</a>
                </div>
            </div>

            <footer class="mt-16 lg:mt-20">
                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.4em] text-white/30 italic">© {{ date('Y') }} LUXE TRAVEL GROUP. ALL RIGHTS RESERVED.</p>
            </footer>
        </main>
    </body>
</html>

