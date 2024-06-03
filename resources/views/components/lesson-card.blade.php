<div class="w-full flex flex-col shadow-md">
    <a href="/units/{{ $slug }}/lessons/{{ $lesson->id }}">
        <div class="border-4 border-blue-900 m-8 h-48 flex flex-col items-center justify-center p-8 relative">
            <div class="text-blue-900 flex items-center justify-center">
                <span class="material-symbols-rounded text-7xl">
                    {{ $lesson->lessonType->thumbnail }}
                </span>
            </div>
            <div class="text-blue-900">
                <div class="text-center font-bold text-xl">
                    {{ $lesson->name }}
                </div>
                <div class="text-center text-sm">
                    {{ $lesson->description }}
                </div>
                <div id="completed" class="absolute bottom-0 left-0 mb-2 ml-2">
                    @if ($lesson->required)
                        <span class="font-bold text-xs italic">required</span>
                    @endif
                </div>
                <div id="completed" class="absolute bottom-0 right-0 mb-2 mr-2">
                    @if ($lesson->users->isNotEmpty() && $lesson->users->first()->pivot->completed)
                        <span class="flex items-center justify-center text-green-600">
                            <span class="material-symbols-rounded">
                                check_circle
                            </span>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </a>
</div>
