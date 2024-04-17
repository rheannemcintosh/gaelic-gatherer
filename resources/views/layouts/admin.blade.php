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

        <!-- Page Content -->
        <main class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-gray-50 sm:shadow-xl p-8">

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
