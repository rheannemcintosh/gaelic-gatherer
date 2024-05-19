<x-admin-layout>
    <x-unit-heading :unit="$lesson->unit" />
    <div class="border border-blue-900 border-8 flex items-center">
        <div class="ml-4 text-blue-900">
            <span class="material-symbols-rounded text-7xl">
                {{ $lesson->lessonType->thumbnail }}
            </span>
        </div>
        <div class="ml-4 w-full text-blue-900">
            <h2 class="font-bold">
                {{ $lesson->name }}
            </h2>
            <p>
                {{ $lesson->description }}
            </p>
        </div>
    </div>

    @if ($lesson->lessonType->name == 'Overview')
        <x-overview-lesson :lesson="$lesson"/>
    @elseif ($lesson->lessonType->name == 'Matching')
        <x-matching-lesson :name="$name" :lesson="$lesson" :englishWords="$englishWords" :gaelicWords="$gaelicWords"/>
    @endif

</x-admin-layout>
