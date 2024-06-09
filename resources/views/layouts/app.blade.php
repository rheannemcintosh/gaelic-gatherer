<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- Head -->
    @include('components.head')

    <!-- Body -->
    <body class="font-sans antialiased min-h-screen bg-gray-50 sm:bg-gray-100  text-gray-800">
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 flex gap-4 bg-gray-100 rounded-bl-2xl">
            @guest
                @if (!config('app.study_closed') && config('app.study_live'))
                    <div class="w-full flex items-center justify-center">
                        <a href="{{ route('login') }}" class="w-28 bg-blue-700 hover:bg-blue-900 px-4 py-2 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105 flex justify-center items-center">
                            <span class="text-center text-white font-bold">Login</span>
                        </a>
                    </div>
                    <div class="w-full flex items-center justify-center">
                        <a href="{{ route('register') }}" class="w-28 bg-blue-700 hover:bg-blue-900 px-4 py-2 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105 flex justify-center items-center">
                            <span class="text-white font-bold">Register</span>
                        </a>
                    </div>
                @endif
            @endguest
        </div>

        <!-- Page Content -->
        <main class="sm:p-8 flex justify-center items-center min-h-screen bg-gray-100">
            <div class="w-full flex flex-col justify-center items-center lg:max-w-4xl p-8">
                @if(Route::currentRouteName() === 'welcome')
                    <img class="w-6/12 mb-6" src="{{ asset('images/gaelic-gatherer-logo.png') }}" alt="Gaelic Gatherer Logo" />
                @else
                    <img class="w-3/12 mb-6" src="{{ asset('images/gaelic-gatherer-logo.png') }}" alt="Gaelic Gatherer Logo" />
                @endif

                @if(session()->get('statusMessage'))
                    <livewire:status-bar :type="session()->get('statusType') ?? null" :message="session()->get('statusMessage')"  />
                @endif

                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <x-footer />

    </body>
</html>
