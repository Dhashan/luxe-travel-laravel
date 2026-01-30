<div class="min-h-screen bg-[#fafaf9] px-6 py-12 lg:py-20 font-sans">
    <div class="max-w-6xl mx-auto">
        <!-- Title Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 lg:mb-16 gap-8">
            <div class="animate-in fade-in slide-in-from-left-4 duration-700">
                <h1 class="text-4xl lg:text-6xl font-black tracking-tighter text-gray-900 leading-[0.8]">My exclusive<br><span class="text-yellow-600 italic">itineraries.</span></h1>
            </div>
            <div class="animate-in fade-in slide-in-from-right-4 duration-700">
                <a href="{{ route('user.planner') }}" class="inline-block px-10 py-5 bg-black text-white rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-yellow-600 transition shadow-2xl shadow-black/10 text-center w-full md:w-auto">
                    Plan New Journey
                </a>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="mb-8 bg-black text-white px-8 py-5 rounded-3xl flex justify-between items-center animate-in fade-in slide-in-from-top-4 duration-500">
                <span class="text-[10px] font-black uppercase tracking-widest">{{ session('message') }}</span>
                <button @click="open = false" class="text-yellow-600 text-lg">&times;</button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-8 bg-red-600 text-white px-8 py-5 rounded-3xl flex justify-between items-center animate-in fade-in slide-in-from-top-4 duration-500">
                <span class="text-[10px] font-black uppercase tracking-widest">{{ session('error') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-10 lg:gap-12">
            @forelse($bookings as $booking)
                <div class="group bg-white rounded-[2rem] lg:rounded-[3rem] shadow-2xl shadow-gray-200/50 overflow-hidden border border-gray-50 flex flex-col lg:flex-row transition duration-700 hover:shadow-yellow-600/5 hover:border-yellow-100 animate-in fade-in slide-in-from-bottom-8 duration-700">
                    <!-- Image Card -->
                    <div class="lg:w-1/3 h-64 lg:h-auto relative overflow-hidden">
                        <img src="{{ $booking->destination->image_url ?: 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=600' }}" 
                             class="w-full h-full object-cover transition duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent"></div>
                        <div class="absolute top-6 left-6 lg:top-8 lg:left-8">
                            <span class="px-4 py-2 bg-white/10 backdrop-blur-md rounded-full text-white text-[10px] font-black uppercase tracking-widest border border-white/20">
                                #{{ $booking->id }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex-1 p-8 lg:p-16 flex flex-col justify-between">
                        <div>
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 lg:mb-10 gap-4">
                                <div>
                                    <h3 class="text-3xl lg:text-4xl font-black text-gray-900 tracking-tighter mb-2">{{ $booking->destination->name }}</h3>
                                    <div class="flex items-center space-x-4">
                                        <span class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400">
                                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('F d, Y') }}
                                        </span>
                                        <span class="h-1 w-1 bg-gray-200 rounded-full"></span>
                                        <span class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400">
                                            {{ $booking->guests }} {{ Str::plural('Guest', $booking->guests) }}
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <span class="px-5 py-2 rounded-full text-[8px] lg:text-[10px] font-black uppercase tracking-[0.2em] 
                                        {{ $booking->status === 'confirmed' ? 'bg-green-50 text-green-600' : ($booking->status === 'cancelled' ? 'bg-red-50 text-red-600' : 'bg-yellow-50 text-yellow-600') }}">
                                        {{ $booking->status }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="flex items-center space-x-6">
                                    <div class="w-10 h-10 lg:w-12 lg:h-12 rounded-xl lg:rounded-2xl bg-gray-50 flex items-center justify-center text-yellow-600 overflow-hidden flex-shrink-0">
                                        <img src="{{ $booking->experience->image_url ?? 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=100' }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300">Selected Experience</p>
                                        <h4 class="font-bold text-gray-700 text-sm lg:text-base">{{ $booking->experience->name ?? 'Private Curation' }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 lg:mt-16 pt-8 lg:pt-10 border-t border-gray-50 flex flex-col sm:flex-row justify-between items-center gap-8 text-center sm:text-left">
                            <div>
                                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-1">Total Investment</p>
                                <p class="text-3xl font-black text-gray-900 tracking-tighter">${{ number_format($booking->total_price) }}</p>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                                @if($booking->status === 'pending')
                                    <button wire:click="cancelBooking({{ $booking->id }})" 
                                            class="px-8 lg:px-10 py-4 lg:py-5 border-2 border-gray-100 rounded-full text-[10px] lg:text-xs font-black uppercase tracking-widest text-gray-400 hover:border-red-600 hover:text-red-600 transition">
                                        Cancel Request
                                    </button>
                                @endif
                                <button wire:click="viewDetails({{ $booking->id }})" 
                                        class="px-8 lg:px-10 py-4 lg:py-5 bg-gray-50 text-gray-900 rounded-full text-[10px] lg:text-xs font-black uppercase tracking-widest hover:bg-black hover:text-white transition">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 lg:py-40 animate-in fade-in zoom-in-95 duration-1000">
                    <div class="w-20 h-20 lg:w-24 lg:h-24 bg-yellow-50 rounded-full flex items-center justify-center mx-auto mb-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 lg:h-10 lg:w-10 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-black tracking-tighter text-gray-900 mb-4">No journeys found.</h2>
                    <p class="text-sm lg:text-base text-gray-400 font-medium mb-12">Your next luxury adventure is just a few clicks away.</p>
                    <a href="{{ route('user.planner') }}" class="inline-block px-10 lg:px-12 py-5 bg-black text-white rounded-full font-black uppercase tracking-widest text-[10px] lg:text-xs hover:bg-yellow-600 transition shadow-2xl shadow-yellow-600/20">
                        Begin Your Planning
                    </a>
                </div>
            @endforelse
        </div>

        <div class="mt-16 lg:mt-20">
            {{ $bookings->links() }}
        </div>

        <!-- Details Modal -->
        <x-dialog-modal wire:model.live="viewingBookingDetails" maxWidth="3xl">
            <x-slot name="title">
                <div class="flex justify-between items-center border-b border-gray-50 pb-6">
                    <div class="flex flex-col">
                        <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.3em] text-yellow-600 mb-2">Journey Specification</p>
                        <h3 class="text-2xl lg:text-3xl font-black text-gray-900 tracking-tighter italic">Itinerary #{{ $showingBooking->id ?? '' }}</h3>
                    </div>
                    <button wire:click="closeModal" class="text-gray-300 hover:text-black transition text-2xl font-light">&times;</button>
                </div>
            </x-slot>

            <x-slot name="content">
                @if($showingBooking)
                    <div class="space-y-10 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <!-- Left: Image & Identity -->
                            <div class="space-y-6">
                                <div class="aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl relative">
                                    <img src="{{ $showingBooking->destination->image_url ?: 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=600' }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                </div>
                                <div>
                                    <h4 class="text-xl lg:text-2xl font-black text-gray-900 tracking-tighter mb-2">{{ $showingBooking->destination->name }}</h4>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest italic">{{ $showingBooking->destination->location ?? 'Global Exclusive' }}</p>
                                </div>
                            </div>

                            <!-- Right: Details Grid -->
                            <div class="bg-gray-50/50 rounded-[2rem] p-8 space-y-8">
                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-2">Date of Voyage</p>
                                        <p class="font-bold text-gray-900 text-sm italic">{{ \Carbon\Carbon::parse($showingBooking->booking_date)->format('M d, Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-2">Party Size</p>
                                        <p class="font-bold text-gray-900 text-sm italic">{{ $showingBooking->guests }} Guests</p>
                                    </div>
                                    <div>
                                        <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-2">Status</p>
                                        <span class="inline-block px-3 py-1 bg-yellow-50 text-yellow-600 rounded-full text-[8px] font-black uppercase tracking-widest">{{ $showingBooking->status }}</span>
                                    </div>
                                    <div>
                                        <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-2">Reference</p>
                                        <p class="font-bold text-gray-900 text-sm italic">LUXE-{{ str_pad($showingBooking->id, 6, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>

                                <div class="pt-6 border-t border-gray-100">
                                    <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-300 mb-4">Curated Experience</p>
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ $showingBooking->experience->image_url ?? 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=100' }}" class="w-12 h-12 rounded-xl object-cover grayscale">
                                        <div>
                                            <h5 class="text-sm font-black text-gray-900 tracking-tight">{{ $showingBooking->experience->name ?? 'Private Bespoke Curation' }}</h5>
                                            <p class="text-[10px] text-yellow-600 font-bold italic">Included in Investment</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Summary -->
                        <div class="bg-black text-white rounded-[2rem] p-8 lg:p-10 flex flex-col sm:flex-row justify-between items-center gap-6">
                            <div>
                                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-[0.3em] text-yellow-500 mb-1">Total Investment Value</p>
                                <p class="text-4xl font-black tracking-tighter">${{ number_format($showingBooking->total_price) }} <span class="text-xs font-medium text-white/40 uppercase tracking-widest ml-2 italic">USD All-Inclusive</span></p>
                            </div>
                            @if($showingBooking->status === 'pending')
                                <button wire:click="cancelBooking({{ $showingBooking->id }})" 
                                        class="px-8 py-4 border border-white/20 rounded-full text-[10px] font-black uppercase tracking-widest hover:border-red-600 hover:text-red-600 transition duration-300">
                                    Cancel Request
                                </button>
                            @else
                                <button wire:click="speakToMichael" class="px-8 py-4 bg-yellow-600 text-white rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-yellow-700 hover:scale-105 transition duration-300 shadow-2xl shadow-yellow-600/20">
                                    Inquire with Concierge
                                </button>
                            @endif
                        </div>
                    </div>
                @endif
            </x-slot>

            <x-slot name="footer">
                <div class="flex justify-end space-x-4">
                    <button wire:click="closeModal" class="px-8 py-4 bg-gray-50 text-gray-900 rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-black hover:text-white transition">
                        Dismiss
                    </button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </div>
</div>
