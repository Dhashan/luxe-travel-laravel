<div class="px-6 lg:px-12 font-sans selection:bg-yellow-200">
    <!-- Header Section -->
    <header class="mb-12 lg:mb-16 flex flex-col md:flex-row md:items-end justify-between gap-8">
        <div>
            <p class="text-yellow-600 text-[10px] font-black uppercase tracking-[0.4em] mb-4">Logistics Command</p>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 tracking-tighter">Global <span class="text-yellow-600 italic">Journeys.</span></h2>
        </div>
        <button wire:click="create()" class="px-10 py-5 bg-yellow-600 text-white rounded-full text-xs font-black uppercase tracking-widest hover:bg-yellow-700 hover:-translate-y-1 transition duration-300 shadow-xl shadow-yellow-600/20 active:translate-y-0 w-full md:w-auto">
            Authorize New Journey
        </button>
    </header>

    @if (session()->has('message'))
        <div class="mb-12 font-black text-[10px] uppercase tracking-widest text-yellow-600 text-center bg-yellow-600/10 py-5 rounded-full border border-yellow-600/20 italic animate-in slide-in-from-top-4 duration-500">
            {{ session('message') }}
        </div>
    @endif

    <!-- Add/Edit Modal -->
    <div class="mb-20 @if(!$isOpen) hidden @endif animate-in fade-in slide-in-from-top-8 duration-700">
        <div class="bg-white rounded-[2rem] lg:rounded-[3.5rem] p-8 lg:p-16 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.05)] border border-gray-50">
            <h3 class="text-3xl lg:text-4xl font-black tracking-tighter mb-12 text-gray-900">{{ $bookingId ? 'Refine' : 'Register' }} <span class="text-yellow-600 italic">Journey.</span></h3>
            
            <form wire:submit.prevent="store" class="space-y-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Client Identity</label>
                        <select wire:model="user_id" required 
                                class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 appearance-none">
                            <option value="">Select Client</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} (ID: {{ $user->id }})</option>
                            @endforeach
                        </select>
                        @error('user_id') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Designated Haven</label>
                        <select wire:model="destination_id" required 
                                class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 appearance-none">
                            <option value="">Select Haven</option>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                            @endforeach
                        </select>
                        @error('destination_id') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Experiential Curation</label>
                        <select wire:model="experience_id" 
                                class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 appearance-none">
                            <option value="">Standalone Journey</option>
                            @foreach($experiences as $experience)
                                <option value="{{ $experience->id }}">{{ $experience->name }}</option>
                            @endforeach
                        </select>
                        @error('experience_id') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Temporal Marker (Date)</label>
                        <input type="date" wire:model="booking_date" required 
                               class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300">
                        @error('booking_date') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Party Size</label>
                        <input type="number" wire:model="guests" required 
                               class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300"
                               placeholder="e.g. 2">
                        @error('guests') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Total Consideration (USD)</label>
                        <input type="number" wire:model="total_price" step="1" required 
                               class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300"
                               placeholder="e.g. 18500">
                        @error('total_price') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Logistical Status</label>
                        <select wire:model="status" required 
                                class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300 appearance-none">
                            <option value="pending">Pending Review</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        @error('status') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-6 pt-4">
                    <button type="submit" class="px-10 py-5 bg-yellow-600 text-white rounded-full text-xs font-black uppercase tracking-widest hover:bg-yellow-700 transition duration-300 shadow-xl shadow-yellow-600/10">
                        {{ $bookingId ? 'Update Logistics' : 'Authorize Journey' }}
                    </button>
                    <button type="button" wire:click="toggleForm()" class="px-10 py-5 bg-gray-100 text-gray-400 rounded-full text-xs font-black uppercase tracking-widest hover:bg-black hover:text-white transition duration-300">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Logistics Grid -->
    <div class="bg-white rounded-[2rem] lg:rounded-[3rem] overflow-hidden border border-gray-50 shadow-sm animate-in fade-in slide-in-from-bottom-8 duration-1000">
        <div class="overflow-x-auto">
            <table class="w-full text-left min-w-[1000px] lg:min-w-0">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-8 lg:px-12 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Voyager</th>
                        <th class="px-8 lg:px-12 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Manifest</th>
                        <th class="px-8 lg:px-12 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Economic Value</th>
                        <th class="px-8 lg:px-12 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Status</th>
                        <th class="px-8 lg:px-12 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 text-right">Control</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($bookings as $booking)
                    <tr class="group hover:bg-gray-50/50 transition">
                        <td class="px-8 lg:px-12 py-10">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center border border-gray-100 text-[10px] font-black text-gray-400 group-hover:bg-yellow-600 group-hover:text-white transition flex-shrink-0">
                                    {{ strtoupper(substr($booking->user->name ?? 'NA', 0, 2)) }}
                                </div>
                                <div>
                                    <h4 class="text-sm font-black tracking-tighter text-gray-900 group-hover:text-yellow-600 transition">{{ $booking->user->name ?? 'Deleted Voyager' }}</h4>
                                    <p class="text-[8px] font-bold uppercase tracking-widest text-gray-300 italic">ID: {{ $booking->user_id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 lg:px-12 py-10">
                            <p class="text-xs font-black text-gray-900 tracking-widest uppercase">{{ $booking->destination->name ?? 'Unknown Haven' }}</p>
                            <p class="text-[8px] font-bold uppercase tracking-[0.2em] text-gray-300 italic">{{ $booking->experience->name ?? 'Standalone' }} Journeys — {{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</p>
                        </td>
                        <td class="px-8 lg:px-12 py-10">
                            <p class="text-lg font-black tracking-tighter text-gray-900">${{ number_format($booking->total_price) }}</p>
                            <p class="text-[8px] font-black uppercase tracking-widest text-gray-300 italic">{{ $booking->guests }} Prestigious Guests</p>
                        </td>
                        <td class="px-8 lg:px-12 py-10">
                            <span class="px-5 py-2 rounded-full text-[8px] font-black uppercase tracking-widest 
                                @if($booking->status === 'confirmed') bg-green-50 text-green-600
                                @elseif($booking->status === 'cancelled') bg-red-50 text-red-600
                                @else bg-yellow-50 text-yellow-600 @endif">
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td class="px-8 lg:px-12 py-10 text-right">
                            <div class="flex justify-end gap-6 text-[10px] font-black uppercase tracking-widest transition italic">
                                <button wire:click="edit({{ $booking->id }})" class="text-yellow-600 hover:text-black">Edit &rarr;</button>
                                <button onclick="confirm('Execute permanent log deletion?') || event.stopImmediatePropagation()" 
                                        wire:click="delete({{ $booking->id }})"
                                        class="text-red-600 hover:text-black">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-12 px-6 lg:px-12">
        {{ $bookings->links() }}
    </div>
</div>
