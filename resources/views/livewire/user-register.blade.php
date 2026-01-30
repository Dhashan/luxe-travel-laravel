<div class="min-h-screen flex items-center justify-center px-6 py-12 lg:py-20">
    <div class="w-full max-w-xl">
        <div class="bg-white rounded-[2.5rem] lg:rounded-[3.5rem] p-10 lg:p-16 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.05)] border border-gray-50 animate-in fade-in zoom-in-95 duration-700">
            <header class="text-center mb-10 lg:mb-12">
                <p class="text-yellow-600 text-[8px] lg:text-[10px] font-black uppercase tracking-[0.4em] mb-4">Membership Application</p>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 tracking-tighter leading-none">Join the <span class="text-yellow-600 italic">Elite.</span></h2>
            </header>

            <form wire:submit="register" class="space-y-6 lg:space-y-8">
                <div class="space-y-4 lg:space-y-6">
                    <div class="group">
                        <label for="name" class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Full Name</label>
                        <input wire:model="name" id="name" type="text" required autofocus
                               class="w-full bg-gray-50/50 border-2 border-transparent px-6 lg:px-8 py-4 lg:py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 placeholder-gray-300"
                               placeholder="Elite Member Name">
                        @error('name') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="group">
                        <label for="email" class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Digital Identity</label>
                        <input wire:model="email" id="email" type="email" required
                               class="w-full bg-gray-50/50 border-2 border-transparent px-6 lg:px-8 py-4 lg:py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 placeholder-gray-300"
                               placeholder="Email Address">
                        @error('email') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="group">
                        <label for="password" class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Access Key</label>
                        <input wire:model="password" id="password" type="password" required 
                               class="w-full bg-gray-50/50 border-2 border-transparent px-6 lg:px-8 py-4 lg:py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 placeholder-gray-300"
                               placeholder="Create Password">
                        @error('password') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="group">
                        <label for="password_confirmation" class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Verify Key</label>
                        <input wire:model="password_confirmation" id="password_confirmation" type="password" required 
                               class="w-full bg-gray-50/50 border-2 border-transparent px-6 lg:px-8 py-4 lg:py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 placeholder-gray-300"
                               placeholder="Confirm Password">
                    </div>
                </div>

                <div class="pt-4 relative">
                    <button type="submit" wire:loading.attr="disabled"
                            class="w-full py-5 bg-yellow-600 text-white rounded-full text-[10px] lg:text-xs font-black uppercase tracking-widest hover:bg-yellow-700 hover:-translate-y-1 transition duration-300 shadow-xl shadow-yellow-600/20 active:translate-y-0 text-center disabled:opacity-50 disabled:cursor-not-allowed">
                        <span wire:loading.remove wire:target="register">Create Membership</span>
                        <span wire:loading wire:target="register">Processing Application...</span>
                    </button>

                    <!-- Atmospheric Loading Message -->
                    <div wire:loading wire:target="register" class="absolute -bottom-12 inset-x-0 text-center animate-in fade-in slide-in-from-top-2 duration-500">
                        <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.3em] text-yellow-600 italic">Initializing your elite membership profile...</p>
                    </div>
                </div>

                <div class="text-center pt-8 border-t border-gray-50">
                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400">
                        Already have access? 
                        <a href="{{ route('user.login') }}" class="text-yellow-600 hover:text-black transition ml-2 italic">
                            Sign in to Portal &rarr;
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <footer class="mt-12 text-center px-4">
            <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.4em] text-gray-300 italic">© {{ date('Y') }} LUXE TRAVEL GROUP</p>
        </footer>
    </div>
</div>
