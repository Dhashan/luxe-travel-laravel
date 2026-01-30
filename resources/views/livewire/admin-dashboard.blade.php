<div class="px-6 lg:px-12 font-sans selection:bg-yellow-200">
    <!-- Header Section -->
    <header class="mb-12 lg:mb-16">
        <p class="text-yellow-600 text-[10px] font-black uppercase tracking-[0.4em] mb-4">Command Center</p>
        <h2 class="text-4xl lg:text-6xl font-black text-gray-900 tracking-tighter">Management <span class="text-yellow-600 italic">Insight.</span></h2>
    </header>

    @if (session()->has('message'))
        <div class="mb-12 font-black text-[10px] uppercase tracking-widest text-yellow-600 text-center bg-yellow-600/10 py-5 rounded-full border border-yellow-600/20 italic animate-in slide-in-from-top-4 duration-500">
            {{ session('message') }}
        </div>
    @endif

    <!-- KPI Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 mb-16 lg:mb-20 animate-in fade-in slide-in-from-bottom-8 duration-700">
        <div class="bg-white p-8 lg:p-12 rounded-[2rem] lg:rounded-[2.5rem] shadow-sm hover:shadow-2xl transition duration-500 border border-gray-50 group">
            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-6 group-hover:text-yellow-600 transition">Annual Yield</p>
            <h3 class="text-4xl lg:text-5xl font-black text-gray-900 tracking-tighter mb-4">${{ number_format($stats['total_revenue'] ?? 0) }}</h3>
            <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-green-500">
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span>
                <span>+12.5% Organic Growth</span>
            </div>
        </div>

        <div class="bg-white p-8 lg:p-12 rounded-[2rem] lg:rounded-[2.5rem] shadow-sm hover:shadow-2xl transition duration-500 border border-gray-50 group">
            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-6 group-hover:text-yellow-600 transition">Global Journeys</p>
            <h3 class="text-4xl lg:text-5xl font-black text-gray-900 tracking-tighter mb-4">{{ $stats['total_bookings'] ?? 0 }}</h3>
            <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-yellow-600">
                <span>{{ $stats['pending_bookings'] }} awaiting confirmation</span>
            </div>
        </div>

        <div class="bg-white p-8 lg:p-12 rounded-[2rem] lg:rounded-[2.5rem] shadow-sm hover:shadow-2xl transition duration-500 border border-gray-50 group">
            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-6 group-hover:text-yellow-600 transition">Excellence Score</p>
            <h3 class="text-4xl lg:text-5xl font-black text-gray-900 tracking-tighter mb-4">4.8<span class="text-2xl text-yellow-600 italic">/5</span></h3>
            <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-gray-300">
                <span>Based on elite reviews</span>
            </div>
        </div>

        <div class="bg-white p-8 lg:p-12 rounded-[2rem] lg:rounded-[2.5rem] shadow-sm hover:shadow-2xl transition duration-500 border border-gray-50 group">
            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-6 group-hover:text-yellow-600 transition">Active Memberships</p>
            <h3 class="text-4xl lg:text-5xl font-black text-gray-900 tracking-tighter mb-4">{{ $totalUsers }}</h3>
            <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-green-500">
                <span>+{{ $dailyOps['new_clients'] }} requested today</span>
            </div>
        </div>
    </div>

    <!-- Daily Ops & Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16 mb-20 animate-in fade-in slide-in-from-bottom-12 duration-1000">
        <!-- Daily Operations -->
        <div class="lg:col-span-2 space-y-8 lg:space-y-12">
            <div class="flex justify-between items-end mb-4">
                <h3 class="text-3xl lg:text-4xl font-black tracking-tighter text-gray-900">Operational <span class="text-yellow-600 italic">Flow.</span></h3>
            </div>
            
            <div class="bg-white rounded-[2rem] lg:rounded-[3rem] overflow-hidden border border-gray-50 shadow-sm">
                <div class="p-8 lg:p-12 space-y-8 overflow-x-auto">
                    @forelse($recentBookings as $booking)
                        <div class="flex items-center justify-between min-w-[500px] lg:min-w-0 py-6 border-b border-gray-50 last:border-0 group">
                            <div class="flex items-center space-x-6">
                                <div class="w-16 h-16 rounded-2xl bg-gray-50 flex items-center justify-center overflow-hidden flex-shrink-0">
                                    <img src="{{ $booking->destination->image_url ?: 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=100' }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="text-lg font-black tracking-tighter text-gray-900 group-hover:text-yellow-600 transition">{{ $booking->user->name ?? 'Deleted User' }}</h4>
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400">{{ $booking->destination->name ?? 'Unknown Destination' }} — {{ $booking->created_at ? $booking->created_at->format('M d, Y') : 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-black tracking-tighter text-gray-900 mb-1">${{ number_format($booking->total_price) }}</p>
                                <span class="px-4 py-1.5 rounded-full text-[8px] font-black uppercase tracking-widest {{ $booking->status === 'confirmed' ? 'bg-green-50 text-green-600' : 'bg-yellow-50 text-yellow-600' }}">
                                    {{ $booking->status }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-center py-12 text-xs font-black uppercase tracking-widest text-gray-300 italic">No recent activity detected.</p>
                    @endforelse
                </div>
                <div class="bg-gray-50 px-8 lg:px-12 py-6 text-center">
                    <a href="{{ route('admin.bookings') }}" class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-yellow-600 transition">Execute all logistics &rarr;</a>
                </div>
            </div>
        </div>

        <!-- System Intelligence -->
        <div class="space-y-8 lg:space-y-12">
            <h3 class="text-3xl lg:text-4xl font-black tracking-tighter text-gray-900">System <span class="text-yellow-600 italic">Pulse.</span></h3>
            
            <div class="bg-gray-900 rounded-[2rem] lg:rounded-[3rem] p-8 lg:p-12 text-white relative overflow-hidden shadow-2xl">
                <div class="relative z-10 space-y-10">
                    <div>
                        <p class="text-yellow-500 text-[10px] font-black uppercase tracking-widest mb-4">Infrastructure</p>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-2 border-b border-white/10">
                                <span class="text-xs font-bold opacity-60">Uptime Rate</span>
                                <span class="text-xs font-black">{{ $systemHealth['uptime'] }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-white/10">
                                <span class="text-xs font-bold opacity-60">API Latency</span>
                                <span class="text-xs font-black">{{ $systemHealth['api_response'] }}</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="text-yellow-500 text-[10px] font-black uppercase tracking-widest mb-4">Recent Activity</p>
                        <div class="space-y-6">
                            @foreach($recentActivity as $activity)
                                <div class="flex items-start space-x-4">
                                    <div class="w-2 h-2 rounded-full bg-yellow-600 mt-1.5"></div>
                                    <div>
                                        <p class="text-xs font-black opacity-90 text-sm">{{ $activity['title'] }}</p>
                                        <p class="text-[10px] font-bold opacity-40 uppercase tracking-widest">{{ $activity['time'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button class="w-full py-4 bg-white/5 border border-white/10 text-white rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-white hover:text-black transition">System Metrics</button>
                </div>
            </div>
        </div>
    </div>
</div>
