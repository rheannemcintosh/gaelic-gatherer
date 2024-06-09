<nav class="bg-white relative p-4" x-data="{ isVisible: false, open: false }">
    <div class="grid grid-cols-3 gap-4">
        <!-- Logo -->
        <div class="flex">
            <div class="shrink-0 flex items-center">
                <a href="{{ route('overview.show') }}">
                    <div class="w-48">
                        <img src="{{ asset('images/gaelic-gatherer-white-logo.png') }}">
                    </div>
                </a>
            </div>
        </div>

        <!-- View All Badges Button -->
        <div class="flex justify-center">
            @if (isset($badges) && !$hideButton)
                @if (auth()->user()->data->study_group == 'Experimental')
                    <div class="flex justify-center items-center z-10">
                        <button id="toggle-popup-button" class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                            <span class="text-white font-bold">View All Badges</span>
                        </button>
                    </div>
                @endif
            @endif
        </div>

        <!-- Dropdown Menu -->
        <div class="flex justify-end ">
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 ">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md text-white focus:outline-none transition ease-in-out duration-150 bg-blue-700 hover:bg-blue-900">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('help.show')">
                            Help
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>


                </x-dropdown>
            </div>
        </div>
    </div>

    @if (isset($badges) && !$hideButton)
        @if (auth()->user()->data->study_group == 'Experimental')
                <livewire:all-badges-popup :badges="$badges" />
        @endif
    @endif

    <script>
        const togglePopupButton = document.getElementById('toggle-popup-button');

        if (togglePopupButton) {
            togglePopupButton.addEventListener('click', function() {
                Livewire.dispatch('togglePopup');
            });
        }
    </script>
</nav>
