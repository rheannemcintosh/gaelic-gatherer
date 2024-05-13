<div class="p-8">
    <form method="POST" action="{{ route('user-lessons.store', ['lesson' => $lesson->id]) }}">

        <!-- CSRF Token -->
        @csrf

        <!-- Display Lesson -->
        @switch($lesson->name)
            @case('Numbers Overview')
                <x-numbers-overview />
                @break
            @case('Weather Overview')
                <x-weather-overview />
                @break
            @case('Food & Drink Overview')
                <x-food-and-drink-overview />
                @break
            @case('Places Overview')
                <x-places-overview />
                @break
            @case('Greetings Overview')
                <x-greetings-overview />
                @break
        @endswitch

        <!-- Complete Lesson Button -->
        <div class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-center">
                    <button class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                        <span class="text-white font-bold">Complete Lesson</span>
                    </button>
                </div>
            </div>
        </div>

    </form>
</div>
