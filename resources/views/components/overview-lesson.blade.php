<div class="p-8">
    @if($lesson->name == 'Numbers Overview')
        <x-numbers-overview />
    @elseif ($lesson->name == 'Weather Overview')
        <x-weather-overview />
    @elseif ($lesson->name == 'Food & Drink Overview')
        <x-food-and-drink-overview />
    @elseif ($lesson->name == 'Places Overview')
        <x-places-overview />
    @elseif ($lesson->name == 'Greetings Overview')
        <x-greetings-overview />
    @endif
</div>
