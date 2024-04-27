<div class="p-8">
    @if($lesson->name == 'Numbers Overview')
        <x-numbers-overview />
    @elseif ($lesson->name == 'Weather Overview')
        <x-weather-overview />
    @endif
</div>
