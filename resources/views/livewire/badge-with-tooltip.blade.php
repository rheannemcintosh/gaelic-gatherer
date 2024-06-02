<div x-data="{ show: false }" class="relative">
    <div x-on:mouseover="show = true" x-on:mouseout="show = false">
        <!-- Badge -->

        <div class="flex justify-center pb-2">
            @if ($badge->pivot->completed)
                <img class="w-20 h-20" src="{{ asset('images/badges/' . $badge->icon) }}">
            @else
                <div class="w-16 h-16 bg-gray-500 rounded-full"></div>
            @endif
        </div>

        <!-- Badge Name -->
        <div class="flex justify-center">
            <div class="text-xs font-bold">{{ $badge->name }}</div>
        </div>
    </div>

    <!-- Badge Description Badge -->
    <div
        x-show="show"
        x-on:mouseover="show = true"
        x-on:mouseout="show = false"
        class="break-inside-avoid-column z-50 absolute inset-0 bg-blue-900 opacity-95 text-xs text-white px-4 py-2 rounded-xl flex justify-center items-center text-center"
    >
        <span class="">{{ $badge->description }}</span>
    </div>
</div>
