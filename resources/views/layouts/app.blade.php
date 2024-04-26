<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- Head -->
    @include('components.head')

    <!-- Body -->
    <body class="font-sans antialiased min-h-screen bg-gray-50 sm:bg-gray-100 flex flex-col text-gray-800">

        <!-- Page Content -->
        <main class="sm:p-8 flex justify-center items-center min-h-screen ">
            <div class="w-full flex flex-col items-center lg:max-w-4xl pt-8">
                <img class="w-28 h-28 bg-blue-500" src="" />
                <h1 class="text-2xl font-bold">Gaelic Gatherer</h1>
                <div class="m-8 p-8 bg-white shadow-md sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="mt-auto bg-gray-400 text-white p-4">
            <div class="container mx-auto text-center">
                © Rheanne McIntosh 2024
            </div>
        </footer>

    </body>
</html>
