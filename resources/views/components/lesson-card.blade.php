<div class="w-full flex flex-col shadow-md">
    <a href="/units/{{ $slug }}/lessons/{{ $lesson->id }}">
        <div class="border-4 border-blue-900 m-8 h-48 flex flex-col items-center justify-center">
            <div class="text-blue-900 flex items-center justify-center">
                <span class="material-symbols-rounded text-7xl">
                    {{ $lesson->lessonType->thumbnail }}
                </span>
            </div>
            <div class="text-blue-900">
                <div class="text-center font-bold text-xl">
                    {{ $lesson->name }}
                </div>
                <div class="text-center">
                    {{ $lesson->description }}
                </div>
            </div>
        </div>
    </a>
</div>
