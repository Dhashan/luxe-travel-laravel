<div class="min-h-screen bg-[#fafaf9] font-sans selection:bg-yellow-200">
    <!-- Header -->
    <header class="flex justify-between items-center px-6 lg:px-12 py-4 lg:py-6 border-b border-gray-100 bg-white/80 backdrop-blur-md sticky top-0 z-50">
        <div class="flex items-center space-x-4">
            <h1 class="text-xl lg:text-2xl font-black text-yellow-600 tracking-tighter">LUXE TRAVEL</h1>
            <span class="h-6 w-[1px] bg-gray-200 hidden sm:block"></span>
            <p class="text-[8px] lg:text-[10px] font-bold uppercase tracking-[0.3em] text-gray-400 hidden sm:block">Personal Planner</p>
        </div>
        
        <div class="flex items-center space-x-6 lg:space-x-12">
            <div class="flex items-center space-x-3">
                <div class="flex space-x-1">
                    @for($i=1; $i<=4; $i++)
                        <div class="w-4 lg:w-8 h-1 rounded-full transition-all duration-500 {{ $step >= $i ? 'bg-yellow-600' : 'bg-gray-100' }}"></div>
                    @endfor
                </div>
                <span class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-500">Phase {{ $step }}</span>
            </div>
            
            <a href="{{ route('dashboard') }}" class="p-2 text-gray-400 hover:text-black hover:rotate-90 transition duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-12 lg:py-16">

        <!-- STEP 1: DESTINATION DISCOVERY -->
        @if($step == 1)
            <div class="max-w-3xl mb-12 lg:mb-20 animate-in fade-in slide-in-from-bottom-4 duration-700">
                <h2 class="text-4xl lg:text-6xl font-black tracking-tighter text-gray-900 mb-6 lg:mb-8 leading-[0.9]">Select your<br><span class="text-yellow-600 italic">sanctuary.</span></h2>
                <div class="relative max-w-lg">
                    <input type="text" wire:model.live.debounce.300ms="searchDestination" placeholder="Search destinations..." 
                           class="w-full bg-white border-2 border-gray-100 rounded-full px-6 lg:px-8 py-4 lg:py-5 text-base lg:text-lg focus:border-yellow-600 focus:ring-0 transition shadow-sm font-medium">
                    <div class="absolute right-6 top-4 lg:top-5 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Passport to Excellence -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8 mb-16 lg:mb-24">
                <div class="bg-white p-6 lg:p-10 rounded-[1.5rem] lg:rounded-[2.5rem] shadow-sm border border-gray-50 animate-in fade-in slide-in-from-bottom-8 duration-700 delay-100 group hover:shadow-2xl transition duration-500">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-600 mb-6 group-hover:scale-110 transition duration-500">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Security</p>
                    <h4 class="text-sm lg:text-base font-black text-gray-900 tracking-tight">Vetted Sanctuaries</h4>
                </div>
                <div class="bg-white p-6 lg:p-10 rounded-[1.5rem] lg:rounded-[2.5rem] shadow-sm border border-gray-50 animate-in fade-in slide-in-from-bottom-8 duration-700 delay-200 group hover:shadow-2xl transition duration-500">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-600 mb-6 group-hover:scale-110 transition duration-500">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Curation</p>
                    <h4 class="text-sm lg:text-base font-black text-gray-900 tracking-tight">Artisanal Itineraries</h4>
                </div>
                <div class="bg-white p-6 lg:p-10 rounded-[1.5rem] lg:rounded-[2.5rem] shadow-sm border border-gray-50 animate-in fade-in slide-in-from-bottom-8 duration-700 delay-300 group hover:shadow-2xl transition duration-500">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-600 mb-6 group-hover:scale-110 transition duration-500">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Access</p>
                    <h4 class="text-sm lg:text-base font-black text-gray-900 tracking-tight">Bespoke Entry</h4>
                </div>
                <div class="bg-white p-6 lg:p-10 rounded-[1.5rem] lg:rounded-[2.5rem] shadow-sm border border-gray-50 animate-in fade-in slide-in-from-bottom-8 duration-700 delay-400 group hover:shadow-2xl transition duration-500">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-600 mb-6 group-hover:scale-110 transition duration-500">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Exclusivity</p>
                    <h4 class="text-sm lg:text-base font-black text-gray-900 tracking-tight">Private Investment</h4>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                @foreach($destinations as $dest)
                    <article wire:click="selectDestination({{ $dest->id }})" 
                             class="group relative h-[400px] lg:h-[500px] rounded-[2rem] lg:rounded-[2.5rem] overflow-hidden cursor-pointer shadow-2xl shadow-yellow-900/5 transition-all duration-700 hover:-translate-y-4">
                        <img src="{{ $dest->image_url ?: 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=800' }}" 
                             class="absolute inset-0 w-full h-full object-cover transition duration-1000 group-hover:scale-110 grayscale-0 sm:grayscale sm:group-hover:grayscale-0 opacity-100 sm:opacity-90 sm:group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        
                        <div class="absolute bottom-8 lg:bottom-10 left-8 lg:left-10 right-8 lg:right-10">
                            <p class="text-yellow-400 text-[10px] lg:text-xs font-black uppercase tracking-[0.2em] mb-2">Signature Haven</p>
                            <h3 class="text-3xl lg:text-4xl font-black text-white tracking-tighter mb-4">{{ $dest->name }}</h3>
                            <div class="flex items-center justify-between">
                                <span class="bg-white/10 backdrop-blur-md px-4 py-2 rounded-full text-white text-[10px] font-bold uppercase tracking-widest border border-white/20">
                                    From ${{ number_format($dest->base_price) }}
                                </span>
                                <div class="w-10 h-10 lg:w-12 lg:h-12 bg-yellow-600 rounded-full flex items-center justify-center text-white sm:scale-0 sm:group-hover:scale-100 transition duration-500 shadow-xl shadow-yellow-600/40">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-6 lg:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        <!-- STEP 2: EXPERIENCE CURATION -->
        @if($step == 2)
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 lg:mb-16 animate-in fade-in slide-in-from-left-4 duration-700 gap-8">
                <div>
                    <button wire:click="previousStep" class="mb-6 flex items-center text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-yellow-600 transition group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 group-hover:-translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to Destinations
                    </button>
                    <h2 class="text-3xl lg:text-5xl font-black tracking-tighter text-gray-900 leading-[0.9]">Elevate your stay in<br><span class="text-yellow-600 italic">{{ $this->selectedDestination->name }}.</span></h2>
                </div>
                <button wire:click="skipExperience" class="w-full sm:w-auto px-8 py-4 border-2 border-gray-100 rounded-full text-[10px] font-black uppercase tracking-widest hover:border-black hover:bg-black hover:text-white transition shadow-sm">
                    Skip for now
                </button>
            </div>

            @if(count($experiences) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($experiences as $exp)
                        <div wire:click="selectExperience({{ $exp->id }})" 
                             class="bg-white border-2 border-transparent hover:border-yellow-600 p-6 lg:p-8 rounded-[1.5rem] lg:rounded-[2rem] cursor-pointer transition-all duration-500 shadow-sm hover:shadow-2xl">
                            <div class="w-full h-40 lg:h-48 rounded-2xl overflow-hidden mb-6">
                                <img src="{{ $exp->image_url ?: 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=400' }}" class="w-full h-full object-cover">
                            </div>
                            <span class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-yellow-600 mb-2 block">{{ $exp->category }}</span>
                            <h3 class="text-xl lg:text-2xl font-black text-gray-900 mb-3 tracking-tighter">{{ $exp->name }}</h3>
                            <p class="text-sm text-gray-500 mb-6 font-medium leading-relaxed line-clamp-2">{{ $exp->description }}</p>
                            <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                                <span class="text-base lg:text-lg font-black text-gray-900">+${{ number_format($exp->price) }} <span class="text-[10px] text-gray-400">/ person</span></span>
                                <span class="text-[10px] font-bold text-yellow-600 uppercase tracking-widest">Select</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 lg:py-32 bg-white rounded-[2rem] lg:rounded-[3rem] border-2 border-dashed border-gray-100">
                    <p class="text-gray-400 font-bold mb-8 italic">No curated experiences available for this sanctuary yet.</p>
                    <button wire:click="skipExperience" class="px-10 lg:px-12 py-5 bg-black text-white rounded-full font-black uppercase tracking-widest text-[10px] lg:text-xs hover:scale-105 transition shadow-2xl">
                        Proceed to Details
                    </button>
                </div>
            @endif
        @endif

        <!-- STEP 3: REFINING DETAILS -->
        @if($step == 3)
            <div class="max-w-4xl mx-auto flex flex-col md:flex-row gap-12 lg:gap-20 items-center animate-in fade-in zoom-in-95 duration-700 px-4 md:px-0">
                <div class="flex-1 space-y-12 lg:space-y-16 w-full">
                    <div>
                        <button wire:click="previousStep" class="mb-8 lg:mb-10 flex items-center text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-yellow-600 transition group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 group-hover:-translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Refine Selections
                        </button>
                        <h2 class="text-4xl lg:text-5xl font-black tracking-tighter text-gray-900 mb-2">Final touches.</h2>
                        <p class="text-sm lg:text-base text-gray-500 font-medium">When should we expect you and your party?</p>
                    </div>

                    <div class="space-y-10 lg:space-y-12">
                        <div>
                            <label class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.3em] text-gray-400 mb-4 lg:mb-6 block">Arrival Date</label>
                            <input type="date" wire:model="bookingDate" 
                                   class="w-full text-3xl lg:text-5xl font-black border-none focus:ring-0 p-0 text-yellow-600 placeholder-yellow-100 bg-transparent">
                            @error('bookingDate') <p class="text-red-500 text-[10px] mt-4 font-bold uppercase tracking-widest">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.3em] text-gray-400 mb-6 lg:mb-8 block">Traveling Party</label>
                            <div class="flex items-center space-x-8 lg:space-x-12">
                                <button wire:click="decrementGuests" 
                                        class="w-12 h-12 lg:w-16 lg:h-16 rounded-full border-2 border-gray-100 flex items-center justify-center text-2xl lg:text-3xl font-light hover:border-yellow-600 hover:bg-yellow-50 transition active:scale-90">-</button>
                                <div class="text-center group">
                                    <span class="text-6xl lg:text-8xl font-black text-gray-900 tracking-tighter leading-none block">{{ $guests }}</span>
                                    <span class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 group-hover:text-yellow-600 transition">Guests</span>
                                </div>
                                <button wire:click="incrementGuests" 
                                        class="w-12 h-12 lg:w-16 lg:h-16 rounded-full border-2 border-gray-100 flex items-center justify-center text-2xl lg:text-3xl font-light hover:border-yellow-600 hover:bg-yellow-50 transition active:scale-90">+</button>
                            </div>
                            @error('guests') <p class="text-red-500 text-[10px] mt-4 font-bold uppercase tracking-widest">{{ $message }}</p> @enderror
                        </div>

                        <!-- Private Jet Enhancement -->
                        <div wire:click="$set('privateJetRequested', {{ $privateJetRequested ? 'false' : 'true' }})" 
                             class="p-6 lg:p-8 rounded-[1.5rem] lg:rounded-[2rem] border-2 cursor-pointer transition-all duration-500 {{ $privateJetRequested ? 'border-yellow-600 bg-yellow-50/30 shadow-2xl shadow-yellow-600/10' : 'border-gray-50 bg-white hover:border-gray-200 shadow-sm' }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-6">
                                    <div class="w-12 h-12 lg:w-14 lg:h-14 bg-black rounded-2xl flex items-center justify-center text-yellow-500">
                                        <svg class="w-6 h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-base lg:text-lg font-black text-gray-900 tracking-tight">Private Jet Coordination</h4>
                                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest italic">Request elite transit services</p>
                                    </div>
                                </div>
                                <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-all duration-500 {{ $privateJetRequested ? 'border-yellow-600 bg-yellow-600 text-white' : 'border-gray-200' }}">
                                    @if($privateJetRequested)
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="pt-6 lg:pt-10">
                        <button wire:click="finalizeDetails" 
                                class="w-full py-5 lg:py-6 bg-yellow-600 text-white rounded-full font-black uppercase tracking-widest text-[10px] lg:text-sm shadow-[0_20px_50px_rgba(202,138,4,0.3)] hover:bg-yellow-700 hover:-translate-y-1 transition duration-300 active:translate-y-0">
                            Review Your Itinerary
                        </button>
                    </div>
                </div>

                <div class="w-full md:w-[400px] h-[400px] lg:h-[600px] rounded-[2rem] lg:rounded-[3rem] overflow-hidden shadow-2xl md:rotate-3 hover:rotate-0 transition duration-1000">
                    <img src="{{ $this->selectedDestination->image_url ?: 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=800' }}" 
                         class="w-full h-full object-cover">
                </div>
            </div>
        @endif

        <!-- STEP 4: ITINERARY REVIEW -->
        @if($step == 4)
            <div class="max-w-5xl mx-auto animate-in fade-in zoom-in-105 duration-700">
                <div class="bg-white rounded-[2rem] lg:rounded-[3rem] shadow-2xl overflow-hidden border border-gray-50 flex flex-col md:flex-row">
                    <!-- Receipt Content -->
                    <div class="flex-1 p-8 lg:p-16">
                        <div class="flex justify-between items-start mb-12 lg:mb-16">
                            <div>
                                <h2 class="text-3xl lg:text-4xl font-black tracking-tighter text-gray-900 mb-2">Bespoke Voucher</h2>
                                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.3em] text-gray-400">Order ID: #LT-{{ strtoupper(Str::random(6)) }}</p>
                            </div>
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=60x60&data=LUXETRAVEL" class="opacity-20 grayscale hidden sm:block">
                        </div>

                        <div class="space-y-6 lg:space-y-8 mb-12 lg:mb-16">
                            <div class="flex justify-between items-end border-b border-gray-100 pb-4 lg:pb-6">
                                <div>
                                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-1">Sanctuary</p>
                                    <h4 class="text-xl lg:text-2xl font-black text-gray-900">{{ $this->selectedDestination->name }}</h4>
                                </div>
                                <span class="font-bold text-gray-400 text-sm lg:text-base">${{ number_format($this->selectedDestination->base_price) }}pp</span>
                            </div>

                            @if($this->selectedExperience)
                                <div class="flex justify-between items-end border-b border-gray-100 pb-4 lg:pb-6">
                                    <div>
                                        <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-1">Personalized Enhancement</p>
                                        <h4 class="text-xl lg:text-2xl font-black text-gray-900">{{ $this->selectedExperience->name }}</h4>
                                    </div>
                                    <span class="font-bold text-gray-400 text-sm lg:text-base">+${{ number_format($this->selectedExperience->price) }}pp</span>
                                </div>
                            @endif

                            <div class="grid grid-cols-2 gap-6 lg:gap-8 pt-4">
                                <div>
                                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-1">Arrival Date</p>
                                    <h4 class="text-lg lg:text-xl font-black text-gray-900">{{ \Carbon\Carbon::parse($bookingDate)->format('M d, Y') }}</h4>
                                </div>
                                <div>
                                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-1">Traveling Party</p>
                                    <h4 class="text-lg lg:text-xl font-black text-gray-900">{{ $guests }} {{ Str::plural('Guest', $guests) }}</h4>
                                </div>
                            </div>
                        </div>

                        @if($privateJetRequested)
                            <div class="mb-10 lg:mb-12 flex items-center p-6 bg-yellow-50/50 rounded-3xl border border-yellow-100 animate-in fade-in slide-in-from-left-4 duration-500">
                                <div class="w-10 h-10 bg-yellow-600 rounded-xl flex items-center justify-center text-white mr-6">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-black text-gray-900 uppercase tracking-tighter italic">Private Jet Coordination</h4>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Elite Transit Requested</p>
                                </div>
                                <span class="bg-yellow-600 text-white text-[8px] font-black px-3 py-1 rounded-full uppercase tracking-widest">Elite Perk</span>
                            </div>
                        @endif

                        <div class="bg-[#fcf8f1] p-8 lg:p-10 rounded-3xl flex flex-col sm:flex-row justify-between items-center mb-10 gap-8 sm:gap-4">
                            <div class="text-center sm:text-left">
                                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-yellow-800 mb-1">Investment Total</p>
                                <h4 class="text-4xl lg:text-5xl font-black text-yellow-600 tracking-tighter">${{ number_format($this->totalPrice) }}</h4>
                            </div>
                            <button wire:click="submitBooking" 
                                    class="w-full sm:w-auto px-10 lg:px-12 py-5 bg-black text-white rounded-full font-black uppercase tracking-widest text-[10px] lg:text-xs hover:scale-105 hover:bg-yellow-600 transition duration-500 shadow-2xl">
                                Confirm Itinerary
                            </button>
                        </div>
                        
                        <button wire:click="setStep(3)" class="w-full text-center sm:text-left text-[8px] lg:text-[10px] font-black uppercase tracking-[0.2em] text-gray-300 hover:text-black transition">
                            Edit details before confirming &rarr;
                        </button>
                    </div>

                    <!-- Visual Side -->
                    <div class="md:w-[350px] h-[300px] md:h-auto bg-yellow-600 relative overflow-hidden flex flex-col justify-end p-8 lg:p-12 text-white">
                        <img src="{{ $this->selectedDestination->image_url ?: 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=800' }}" 
                             class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-overlay">
                        <div class="relative z-10 space-y-4">
                            <div class="w-12 h-1 bg-white rounded-full"></div>
                            <h3 class="text-2xl lg:text-3xl font-black leading-none">The art of<br>bespoke<br>travel.</h3>
                            <p class="text-xs font-medium opacity-80 leading-relaxed">Your journey is being meticulously prepared by our global concierge network.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </main>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</div>
