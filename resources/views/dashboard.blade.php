<x-admin-layout>

    <!-- Page Heading -->
    <x-slot name="header">
        <div class="text-xl text-gray-800">
            {{ __('Example Header') }}
        </div>
    </x-slot>

    <!-- Page Content -->
    <div>
        <form method="POST" action="{{ route('badge-users.store', ['badge' => 2]) }}">
            @csrf
            <button class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                <span class="text-white font-bold">Add Badge</span>
            </button>
        </form>
    </div>

</x-admin-layout>
