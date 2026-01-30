<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-6 py-12 lg:py-20">
        <div class="w-full max-w-xl">
            <div class="bg-white rounded-[2.5rem] lg:rounded-[3.5rem] p-10 lg:p-16 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.05)] border border-gray-50 animate-in fade-in zoom-in-95 duration-700 text-center">
                <header class="mb-10 lg:mb-12">
                    <p class="text-yellow-600 text-[8px] lg:text-[10px] font-black uppercase tracking-[0.4em] mb-4">Management Access</p>
                    <h2 class="text-4xl lg:text-5xl font-black text-gray-900 tracking-tighter leading-none">Personnel <span class="text-yellow-600 italic">Login.</span></h2>
                </header>

                @if (session('error'))
                    <div class="mb-8 font-black text-[10px] uppercase tracking-widest text-red-600 text-center bg-red-50 py-4 rounded-full border border-red-100 italic">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6 lg:space-y-8 text-left">
                    @csrf
                    <div class="space-y-4 lg:space-y-6">
                        <div class="group">
                            <label for="email" class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Authorized Email</label>
                            <input name="email" id="email" type="email" required autofocus
                                   class="w-full bg-gray-50/50 border-2 border-transparent px-6 lg:px-8 py-4 lg:py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 placeholder-gray-300"
                                   placeholder="admin@luxetravel.com">
                            @error('email') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                        </div>

                        <div class="group">
                            <label for="password" class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Personnel Passkey</label>
                            <input name="password" id="password" type="password" required 
                                   class="w-full bg-gray-50/50 border-2 border-transparent px-6 lg:px-8 py-4 lg:py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 placeholder-gray-300"
                                   placeholder="Enter Secure Password">
                            @error('password') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full py-5 bg-gray-900 text-white rounded-full text-[10px] lg:text-xs font-black uppercase tracking-widest hover:bg-yellow-600 transition duration-300 shadow-xl active:scale-[0.98] text-center">
                            Management Entry
                        </button>
                    </div>

                    <div class="text-center pt-8 border-t border-gray-50">
                        <a href="{{ url('/') }}" class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-black transition italic">
                            &larr; Return to Port
                        </a>
                    </div>
                </form>
            </div>

            <footer class="mt-12 text-center px-4">
                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.4em] text-gray-300 italic">© {{ date('Y') }} LUXE TRAVEL GROUP | INTERNAL ACCESS ONLY</p>
            </footer>
        </div>
    </div>
</x-guest-layout>
