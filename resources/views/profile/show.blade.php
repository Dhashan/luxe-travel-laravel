<x-app-layout>
    <div class="bg-[#fafaf9] py-20 px-6 lg:px-12 font-sans selection:bg-yellow-200">
        <div class="max-w-5xl mx-auto">
            <header class="mb-16">
                <p class="text-yellow-600 text-[10px] font-black uppercase tracking-[0.4em] mb-4">Account Concierge</p>
                <h2 class="text-6xl font-black text-gray-900 tracking-tighter">Your <span class="text-yellow-600 italic">Sanctuary</span> Settings.</h2>
            </header>

            <div class="space-y-12">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <div class="bg-white rounded-[3rem] p-12 shadow-sm border border-gray-50 transition duration-700 hover:shadow-2xl">
                        @livewire('profile.update-profile-information-form')
                    </div>
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="bg-white rounded-[3rem] p-12 shadow-sm border border-gray-50 transition duration-700 hover:shadow-2xl">
                        @livewire('profile.update-password-form')
                    </div>
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="bg-white rounded-[3rem] p-12 shadow-sm border border-gray-50 transition duration-700 hover:shadow-2xl">
                        @livewire('profile.two-factor-authentication-form')
                    </div>
                @endif

                <div class="bg-white rounded-[3rem] p-12 shadow-sm border border-gray-50 transition duration-700 hover:shadow-2xl">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <div class="bg-red-50 rounded-[3rem] p-12 border border-red-100 transition duration-700 hover:bg-red-100">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

