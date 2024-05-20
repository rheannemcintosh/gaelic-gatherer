<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- Head -->
    @include('components.head')

    <!-- Body -->
    <body class="font-sans antialiased min-h-screen bg-gray-50 sm:bg-gray-100 flex flex-col">

        <!-- Navigation -->
        <nav>
            @include('layouts.navigation')
        </nav>

        <!-- Badges -->
        @if (isset($badges) && !$hideButton)
            <div class="mt-8">
                <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-gray-50 sm:shadow-xl p-8">
                    <div x-data="{ isVisible: false }">
                        <div class="flex justify-center">
                            <button @click="isVisible = !isVisible" class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                                <span class="text-white font-bold">View All Badges</span>
                            </button>
                        </div>
                        <div x-show="isVisible">
                            <div class="flex justify-center py-4 font-bold text-sm">Please hover over each badge to see how to earn it!</div>
                        @foreach($badges->chunk(5) as $chunk)
                            <div class="grid grid-cols-5">
                                @foreach($chunk as $badge)
                                    <div class="m-1 p-2">
                                        <livewire:badge-with-tooltip :badge="$badge" :key="$badge->id"/>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        @endisset

        <!-- Page Content -->
        <main class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-gray-50 sm:shadow-xl p-8">

                <!-- Post Study Questionnaire -->
                @if (!$hideButton)
                    <div class="w-full mb-4 flex items-center justify-center">
                        <div class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                            <a href="{{ route('post-study-questionnaire.show') }}">
                                <span class="text-white font-bold">Finished Exploring? Complete the Study Here!</span>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Page Header -->
                @if (isset($header))
                    <header class="sm:bg-white mb-4 sm:border sm:border-gray-100">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Slot -->
                <section class="sm:bg-white sm:border sm:border-gray-100">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </section>

            </div>
        </main>

        <!-- Footer -->
        <footer class="mt-auto bg-gray-400 text-white p-4">
            <div class="container mx-auto text-center">
            </div>
        </footer>

    </body>
</html>
