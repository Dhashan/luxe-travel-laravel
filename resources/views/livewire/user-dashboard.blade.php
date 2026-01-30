<div class="bg-[#fafaf9] py-8 lg:py-12 px-6 lg:px-12 font-sans selection:bg-yellow-200">
    <!-- Feedback Messages -->
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
             class="fixed top-24 right-6 lg:right-12 z-[100] bg-black text-white px-8 py-4 rounded-2xl shadow-2xl border border-yellow-600/30 animate-in fade-in slide-in-from-right-8 duration-500">
            <div class="flex items-center space-x-4">
                <div class="bg-yellow-600 p-2 rounded-full">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <p class="text-[10px] font-black uppercase tracking-widest">{{ session('message') }}</p>
            </div>
        </div>
    @endif
    <!-- Hero Section -->
    <section class="relative h-[400px] lg:h-[450px] rounded-[2.5rem] lg:rounded-[3rem] overflow-hidden shadow-2xl mb-12 lg:mb-16 animate-in fade-in zoom-in-95 duration-700">
        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1600" 
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/20 to-transparent"></div>
        
        <div class="relative z-10 h-full flex flex-col justify-center px-8 lg:px-16 max-w-4xl">
            <p class="text-yellow-400 text-[10px] lg:text-xs font-black uppercase tracking-[0.4em] mb-4">The World Awaits</p>
            <h2 class="text-4xl lg:text-7xl font-black text-white tracking-tighter mb-8 leading-[0.9]">Bespoke Luxury<br><span class="text-yellow-500 italic">Redefined.</span></h2>
            <div class="flex flex-col sm:flex-row gap-4 lg:gap-6">
                <a href="{{ route('user.planner') }}" class="bg-yellow-600 text-white px-8 lg:px-10 py-4 rounded-full text-[10px] lg:text-xs font-black hover:bg-yellow-700 transition shadow-xl uppercase tracking-widest text-center">Start Your Journey</a>
                <button wire:click="speakToConcierge" class="bg-white/10 backdrop-blur-md text-white border border-white/20 px-8 lg:px-10 py-4 rounded-full text-[10px] lg:text-xs font-black hover:bg-white hover:text-black transition uppercase tracking-widest text-center">Speak to Concierge</button>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto">
        <!-- Stats Grid -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 mb-16 lg:mb-20">
            <div class="bg-white p-6 lg:p-10 rounded-[1.5rem] lg:rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-500 border border-gray-50 animate-in fade-in slide-in-from-bottom-8 duration-700 delay-100">
                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Total Trips</p>
                <h4 class="text-3xl lg:text-5xl font-black text-gray-900 tracking-tighter">{{ $totalTrips }}</h4>
            </div>
            <div class="bg-white p-6 lg:p-10 rounded-[1.5rem] lg:rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-500 border border-gray-50 animate-in fade-in slide-in-from-bottom-8 duration-700 delay-200">
                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Status</p>
                <h4 class="text-3xl lg:text-5xl font-black text-yellow-600 tracking-tighter italic">Platinum</h4>
            </div>
            <div class="bg-white p-6 lg:p-10 rounded-[1.5rem] lg:rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-500 border border-gray-50 animate-in fade-in slide-in-from-bottom-8 duration-700 delay-300">
                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Loyalty</p>
                <h4 class="text-3xl lg:text-5xl font-black text-gray-900 tracking-tighter">12.4k</h4>
            </div>
            <div class="bg-white p-6 lg:p-10 rounded-[1.5rem] lg:rounded-[2.5rem] shadow-sm hover:shadow-2xl hover:-translate-y-2 transition duration-500 border border-gray-50 animate-in fade-in slide-in-from-bottom-8 duration-700 delay-400">
                <p class="text-[8px] lg:text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Upcoming</p>
                <h4 class="text-3xl lg:text-5xl font-black text-gray-900 tracking-tighter">{{ $upcomingTrips }}</h4>
            </div>
        </div>

        <!-- Curated Havens Section -->
        <section class="mb-16 lg:mb-20">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-10 animate-in fade-in slide-in-from-left-8 duration-700 delay-500">
                <h3 class="text-3xl lg:text-4xl font-black tracking-tighter text-gray-900">Curated <span class="text-yellow-600 italic">Havens.</span></h3>
                <p class="text-[10px] font-black uppercase tracking-widest text-gray-400">Hand-picked for your next odyssey</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
                <!-- Haven 1 -->
                <div class="group relative aspect-[4/5] rounded-[2rem] lg:rounded-[3rem] overflow-hidden shadow-2xl animate-in fade-in zoom-in-95 duration-1000 delay-700">
                    <img src="https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?q=80&w=800" class="absolute inset-0 w-full h-full object-cover transition duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-8 lg:p-10">
                        <span class="inline-block px-3 py-1 bg-yellow-600/20 backdrop-blur-md rounded-full text-yellow-500 text-[8px] font-black uppercase tracking-widest border border-yellow-600/20 mb-4">Exclusive</span>
                        <h4 class="text-2xl lg:text-3xl font-black text-white tracking-tighter mb-2">Amalfi Coast</h4>
                        <p class="text-[10px] text-white/60 font-medium uppercase tracking-widest mb-6 italic">Italy • Summer 2026</p>
                        <button class="px-6 py-3 bg-white text-black rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-yellow-600 hover:text-white transition shadow-xl">Explore Haven</button>
                    </div>
                </div>

                <!-- Haven 2 -->
                <div class="group relative aspect-[4/5] rounded-[2rem] lg:rounded-[3rem] overflow-hidden shadow-2xl animate-in fade-in zoom-in-95 duration-1000 delay-800">
                    <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=800" class="absolute inset-0 w-full h-full object-cover transition duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-8 lg:p-10">
                        <span class="inline-block px-3 py-1 bg-yellow-600/20 backdrop-blur-md rounded-full text-yellow-500 text-[8px] font-black uppercase tracking-widest border border-yellow-600/20 mb-4">Limited</span>
                        <h4 class="text-2xl lg:text-3xl font-black text-white tracking-tighter mb-2">Uluwatu</h4>
                        <p class="text-[10px] text-white/60 font-medium uppercase tracking-widest mb-6 italic">Bali • Year Round</p>
                        <button class="px-6 py-3 bg-white text-black rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-yellow-600 hover:text-white transition shadow-xl">Explore Haven</button>
                    </div>
                </div>

                <!-- Haven 3 -->
                <div class="group relative aspect-[4/5] rounded-[2rem] lg:rounded-[3rem] overflow-hidden shadow-2xl animate-in fade-in zoom-in-95 duration-1000 delay-900">
                    <img src="https://images.unsplash.com/photo-1510414842594-a61c69b5ae57?q=80&w=800" class="absolute inset-0 w-full h-full object-cover transition duration-1000 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-8 lg:p-10">
                        <span class="inline-block px-3 py-1 bg-yellow-600/20 backdrop-blur-md rounded-full text-yellow-500 text-[8px] font-black uppercase tracking-widest border border-yellow-600/20 mb-4">Trending</span>
                        <h4 class="text-2xl lg:text-3xl font-black text-white tracking-tighter mb-2">Zermatt</h4>
                        <p class="text-[10px] text-white/60 font-medium uppercase tracking-widest mb-6 italic">Switzerland • Winter 2026</p>
                        <button class="px-6 py-3 bg-white text-black rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-yellow-600 hover:text-white transition shadow-xl">Explore Haven</button>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16 mb-20">
            <!-- Upcoming Itineraries -->
            <div class="lg:col-span-2">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-10 animate-in fade-in slide-in-from-left-8 duration-700 delay-500">
                    <h3 class="text-3xl lg:text-4xl font-black tracking-tighter text-gray-900">Your upcoming <span class="text-yellow-600 italic">sanctuaries.</span></h3>
                    <a href="{{ route('user.bookings') }}" class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-black transition">View all itineraries &rarr;</a>
                </div>
                
                @if($recentBookings->isEmpty())
                    <div class="bg-white rounded-[2rem] lg:rounded-[3rem] p-12 lg:p-20 text-center border-2 border-dashed border-gray-100 animate-in fade-in zoom-in-95 duration-700 delay-600">
                        <p class="text-gray-400 font-bold italic mb-8">No upcoming journeys detected.</p>
                        <a href="{{ route('user.planner') }}" class="px-8 lg:px-10 py-4 bg-black text-white rounded-full font-black uppercase tracking-widest text-[10px] lg:text-xs hover:bg-yellow-600 transition shadow-2xl scale-100 hover:scale-105 duration-300">Begin Planning</a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10">
                        @foreach($recentBookings as $index => $booking)
                            <article class="group bg-white rounded-[2rem] lg:rounded-[3rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition animate-in fade-in slide-in-from-bottom-8 duration-700" style="animation-delay: {{ 600 + ($index * 100) }}ms;">
                                <div class="h-48 lg:h-64 relative overflow-hidden">
                                    <img src="{{ $booking->destination->image_url ?: 'https://images.unsplash.com/photo-1544735716-392fe2489ffa?q=80&w=800' }}" 
                                         class="w-full h-full object-cover transition duration-1000 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                                    <span class="absolute top-6 right-6 px-4 py-2 bg-white/20 backdrop-blur-md rounded-full text-white text-[10px] font-black uppercase tracking-widest border border-white/20">Active</span>
                                </div>
                                <div class="p-8 lg:p-10">
                                    <h4 class="text-xl lg:text-2xl font-black text-gray-900 tracking-tighter mb-2">{{ $booking->destination->name }}</h4>
                                    <p class="text-[10px] lg:text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</p>
                                    <a href="{{ route('user.bookings') }}" class="text-[10px] font-black uppercase tracking-widest text-yellow-600 border-b-2 border-yellow-100 hover:border-yellow-600 transition pb-1">View Details</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Concierge & Weather -->
            <div class="space-y-8 lg:space-y-12">
                <!-- Concierge Card -->
                <div class="bg-gray-900 rounded-[2rem] lg:rounded-[3rem] p-8 lg:p-12 text-white relative overflow-hidden shadow-2xl animate-in fade-in slide-in-from-right-8 duration-700 delay-700">
                    <div class="relative z-10 text-center">
                        <p class="text-yellow-500 text-[10px] font-black uppercase tracking-widest mb-8">Direct Access</p>
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=200" 
                             class="w-20 lg:w-24 h-20 lg:h-24 rounded-full border-4 border-yellow-600 mx-auto mb-6 object-cover grayscale hover:grayscale-0 transition duration-700 hover:scale-110">
                        <h4 class="text-lg lg:text-xl font-black tracking-tighter mb-1">Michael Rodriguez</h4>
                        <p class="text-[10px] opacity-60 font-bold uppercase tracking-widest mb-10">Your Personal Specialist</p>
                        <div class="flex flex-col gap-4">
                            <button wire:click="speakToMichael" class="w-full py-4 bg-yellow-600 text-white rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-yellow-700 transition scale-100 hover:scale-105 duration-300">Speak to Michael</button>
                            <a href="tel:+1800LUXETRAVEL" class="w-full py-4 bg-white/5 border border-white/10 text-white rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-white hover:text-black transition text-center inline-block">Emergency Link</a>
                        </div>
                    </div>
                </div>

                <!-- Forecast Aside -->
                <div class="bg-white rounded-[2rem] lg:rounded-[3rem] p-8 lg:p-12 shadow-sm border border-gray-50 animate-in fade-in slide-in-from-right-8 duration-700 delay-800">
                    <p class="text-[10px] font-black uppercase tracking-widest text-gray-300 mb-8">Remote Atmospheres</p>
                    <div class="space-y-6">
                        <div class="flex justify-between items-center pb-6 border-b border-gray-50 group cursor-pointer">
                            <h5 class="text-base lg:text-lg font-black tracking-tighter group-hover:text-yellow-600 transition">Maldives</h5>
                            <span class="bg-yellow-50 text-yellow-600 px-4 py-2 rounded-full text-xs font-bold group-hover:bg-yellow-600 group-hover:text-white transition">28°C ☀️</span>
                        </div>
                        <div class="flex justify-between items-center pb-6 border-b border-gray-50 group cursor-pointer">
                            <h5 class="text-base lg:text-lg font-black tracking-tighter group-hover:text-yellow-600 transition">Santorini</h5>
                            <span class="bg-yellow-50 text-yellow-600 px-4 py-2 rounded-full text-xs font-bold group-hover:bg-yellow-600 group-hover:text-white transition">22°C ☀️</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
