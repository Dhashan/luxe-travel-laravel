<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center relative px-6 overflow-hidden">
        <!-- Immersive Background -->
        <div class="fixed inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2000" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>
        </div>

        <div class="relative z-10 w-full max-w-xl">
            <div class="bg-white/10 backdrop-blur-3xl border border-white/20 rounded-[3.5rem] p-16 shadow-2xl animate-in fade-in zoom-in-95 duration-700">
                <header class="text-center mb-12">
                    <p class="text-yellow-500 text-[10px] font-black uppercase tracking-[0.4em] mb-4">Security Recovery</p>
                    <h2 class="text-5xl font-black text-white tracking-tighter">Lost your <span class="text-yellow-600 italic">Key?</span></h2>
                </header>

                <div class="mb-8 text-[10px] font-black uppercase tracking-widest text-white/40 text-center leading-relaxed">
                    {{ __('Provide the email address associated with your sanctuary account. We shall dispatch a secure recovery link to restore your access.') }}
                </div>

                @session('status')
                    <div class="mb-8 font-black text-[10px] uppercase tracking-widest text-yellow-500 text-center bg-yellow-500/10 py-4 rounded-full border border-yellow-500/20">
                        {{ $value }}
                    </div>
                @endsession

                <x-validation-errors class="mb-8" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-8">
                    @csrf

                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-white/40 mb-3 ps-4">Identification</label>
                        <input type="email" name="email" :value="old('email')" required autofocus 
                               class="w-full bg-white/5 border border-white/10 rounded-full px-8 py-5 text-white placeholder-white/20 focus:bg-white focus:text-black focus:outline-none transition-all duration-500"
                               placeholder="Email Address">
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-6 bg-yellow-600 text-white rounded-full text-xs font-black uppercase tracking-widest hover:bg-yellow-700 transition shadow-2xl active:scale-95">Dispatch Recovery Link</button>
                    </div>

                    <div class="text-center pt-8 border-t border-white/5">
                        <a href="{{ route('login') }}" class="text-[10px] font-black uppercase tracking-widest text-white/20 hover:text-white transition underline">Return to Sanctuary Access</a>
                    </div>
                </form>
            </div>
            
            <p class="mt-12 text-center text-[10px] font-black uppercase tracking-[0.5em] text-white/20 italic">LUXE TRAVEL GROUP • SECURITY PROTOCOL</p>
        </div>
    </div>
</x-guest-layout>

