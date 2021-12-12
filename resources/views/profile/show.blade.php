
<x-app-layout>
<coinpilot-container class="@if(Cookie::get('dark_mode') == '1') dark-mode-auth @endif">
    @include('admin.layouts.partials.header')    
    @include('dashboard.layouts.partials.sidebar')
    <div class="nk-content">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</coinpilot-container>
<script src="{{ asset('assets/js/bundle.js?ver=2.1.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=2.1.0') }}"></script>
<script>
    // im gay
    let dropdownButtonElem = document.getElementById("dropdown-toggle");
    let dropdownElem = document.getElementById("dropdown-menu");
    dropdownButtonElem.addEventListener("click", () => {
        dropdownElem.style.display = dropdownElem.style.display === "block" ? "none" : "block"
    });
    window.onclick = (event) => {
        if (!event.target.matches("#dropdown-menu")) {
            dropdownElem.style.display = "none";
        }
    };
</script>
</x-app-layout>
