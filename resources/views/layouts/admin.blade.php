<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- Head -->
    @include('components.head')


    <!-- Body -->
    <body class="font-sans antialiased min-h-screen bg-gray-50 sm:bg-gray-100 flex flex-col">

        <!-- Navigation -->
        <nav>
            <x-navigation :hideButton="$hideButton" />
        </nav>

        <x-platform-progress />

        <!-- Page Content -->
        <main class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-gray-50 sm:shadow-xl p-8">

                <!-- Post Study Questionnaire -->
                @if (!$hideButton)
                    <div class="w-full mb-4 flex items-center justify-center">
                        <div class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                            <a href="{{ route('study.complete') }}">
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
        <x-footer />

    </body>
</html>
