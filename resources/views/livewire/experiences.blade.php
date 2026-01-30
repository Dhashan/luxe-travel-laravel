<div class="px-6 lg:px-12 font-sans selection:bg-yellow-200">
    <!-- Header Section -->
    <header class="mb-12 lg:mb-16 flex flex-col md:flex-row md:items-end justify-between gap-8">
        <div>
            <p class="text-yellow-600 text-[10px] font-black uppercase tracking-[0.4em] mb-4">Curation Desk</p>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 tracking-tighter">Bespoke <span class="text-yellow-600 italic">Curations.</span></h2>
        </div>
        <button wire:click="create()" class="px-10 py-5 bg-yellow-600 text-white rounded-full text-xs font-black uppercase tracking-widest hover:bg-yellow-700 hover:-translate-y-1 transition duration-300 shadow-xl shadow-yellow-600/20 active:translate-y-0 w-full md:w-auto">
            Authorize New Curation
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
            <h3 class="text-3xl lg:text-4xl font-black tracking-tighter mb-12 text-gray-900">{{ $experienceId ? 'Refine' : 'Register' }} <span class="text-yellow-600 italic">Curation.</span></h3>
            
            <form wire:submit.prevent="store" class="space-y-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Curation Title</label>
                        <input type="text" wire:model="name" required 
                               class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300"
                               placeholder="e.g. Private Yacht Sunset">
                        @error('name') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Category</label>
                        <input type="text" wire:model="category" required 
                               class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300"
                               placeholder="e.g. Nautical Luxury">
                        @error('category') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="group">
                        <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Premium Rate (USD)</label>
                        <input type="number" wire:model="price" step="1" required 
                               class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300"
                               placeholder="e.g. 2400">
                        @error('price') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
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
                
                <div class="group">
                    <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Experiential Narrative</label>
                    <textarea wire:model="description" rows="4" required 
                              class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-6 rounded-[2rem] text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300"
                              placeholder="Describe the unique experiential elements..."></textarea>
                    @error('description') <span class="text-red-500 text-[10px] font-bold uppercase tracking-widest mt-2 ml-4 block italic">{{ $message }}</span> @enderror
                </div>
                
                <div class="group">
                    <label class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 block ml-4">Cinematic Asset Link</label>
                    <input type="text" wire:model="image_url" 
                           class="w-full bg-gray-50/50 border-2 border-transparent px-8 py-5 rounded-full text-sm font-bold focus:bg-white focus:border-yellow-600 focus:ring-0 transition duration-300"
                           placeholder="https://images.unsplash.com/...">
                </div>
                
                <div class="flex flex-col sm:flex-row gap-6 pt-4">
                    <button type="submit" class="px-10 py-5 bg-yellow-600 text-white rounded-full text-xs font-black uppercase tracking-widest hover:bg-yellow-700 transition duration-300 shadow-xl shadow-yellow-600/10">
                        {{ $experienceId ? 'Execute Refinement' : 'Confirm Registration' }}
                    </button>
                    <button type="button" wire:click="toggleForm()" class="px-10 py-5 bg-gray-100 text-gray-400 rounded-full text-xs font-black uppercase tracking-widest hover:bg-black hover:text-white transition duration-300">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Inventory Table -->
    <div class="bg-white rounded-[2rem] lg:rounded-[3rem] overflow-hidden border border-gray-50 shadow-sm animate-in fade-in slide-in-from-bottom-8 duration-1000">
        <div class="overflow-x-auto">
            <table class="w-full text-left min-w-[900px] lg:min-w-0">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-8 lg:px-12 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Curation</th>
                        <th class="px-8 lg:px-12 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Context</th>
                        <th class="px-8 lg:px-12 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Valuation</th>
                        <th class="px-8 lg:px-12 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 text-right">Control</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($experiences as $experience)
                    <tr class="group hover:bg-gray-50/50 transition">
                        <td class="px-8 lg:px-12 py-10">
                            <div class="flex items-center space-x-6">
                                <div class="w-24 h-16 rounded-2xl bg-gray-100 overflow-hidden shadow-inner flex-shrink-0">
                                    <img src="{{ $experience->image_url ?: 'https://images.unsplash.com/photo-1544124499-58912cbddaad?q=80&w=200' }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                </div>
                                <div>
                                    <h4 class="text-lg font-black tracking-tighter text-gray-900 group-hover:text-yellow-600 transition">{{ $experience->name }}</h4>
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 line-clamp-1 max-w-xs">{{ $experience->category }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 lg:px-12 py-10">
                            <p class="text-xs font-black text-gray-900 tracking-widest uppercase">{{ $experience->destination->name ?? 'Global' }}</p>
                            <p class="text-[8px] font-bold uppercase tracking-[0.2em] text-gray-300">Designated Haven</p>
                        </td>
                        <td class="px-8 lg:px-12 py-10">
                            <p class="text-xl font-black tracking-tighter text-gray-900">${{ number_format($experience->price) }}</p>
                            <p class="text-[8px] font-black uppercase tracking-widest text-yellow-600 italic">Curated Excellence</p>
                        </td>
                        <td class="px-8 lg:px-12 py-10 text-right">
                            <div class="flex justify-end gap-6 text-[10px] font-black uppercase tracking-widest transition italic">
                                <button wire:click="edit({{ $experience->id }})" class="text-yellow-600 hover:text-black">Edit &rarr;</button>
                                <button onclick="confirm('Execute permanent log deletion?') || event.stopImmediatePropagation()" 
                                        wire:click="delete({{ $experience->id }})"
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
        {{ $experiences->links() }}
    </div>
</div>
