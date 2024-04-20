<div class="relative h-36 w-full mb-4">
    @if ($overview)
        <a href="units/{{ $unit->slug }}">
    @endif
    @isset ($unit->banner)
        <img src="{{ asset('images/' . $unit->banner) }}" alt="" class="object-cover w-full h-full">
    @endisset
    <div class="absolute inset-0 bg-blue-600 @isset ($unit->banner) opacity-85 @else opacity-100 @endisset h-full"></div>
    <div class="absolute inset-0 h-full p-4">
        <h2 class="text-white font-bold text-xl pt-12">Unit {{ $unit->sort_order }} | {{ $unit->title }}</h2>
        <p class="text-sm text-white font-bold">{{ $unit->description }}</p>
    </div>
    @if ($overview)
        </a>
    @endif
</div>
