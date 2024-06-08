<x-admin-layout>
    <div class="bg-blue-700 flex items-center p-4 text-white">
        <span class="material-symbols-rounded text-7xl ">
            {{ $lesson->lessonType->thumbnail }}
        </span>
        <div class="pl-4 ">
            <h2 class="text-white font-bold text-xl ">Unit {{ $lesson->unit->sort_order }} | {{ $lesson->name }}</h2>
            <p class="font-bold">{{ $lesson->description }}</p>
        </div>
    </div>



    @if ($lesson->lessonType->name == 'Overview')
        <x-overview-lesson :lesson="$lesson"/>
    @elseif ($lesson->lessonType->name == 'Matching')
        <x-matching-lesson :name="$name" :lesson="$lesson" :columnOneName="$columnOneName" :columnTwoName="$columnTwoName" :columnTwoWords="$columnTwoWords" :columnOneWords="$columnOneWords"/>
    @elseif ($lesson->lessonType->name == 'Maths')
        <x-maths-lesson :lesson="$lesson"/>
    @elseif ($lesson->lessonType->name == 'Icon')
        <x-icon-lesson :name="$name" :lesson="$lesson" :columnOneName="$columnOneName" :columnTwoName="$columnTwoName" :columnTwoWords="$columnTwoWords" :columnOneWords="$columnOneWords"/>
    @endif



</x-admin-layout>
