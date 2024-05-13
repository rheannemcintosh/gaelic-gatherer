<div class="p-8">
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
</div>
