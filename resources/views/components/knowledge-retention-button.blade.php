<div class="bg-gray-200 p-4">
    <div class="flex justify-center text-gray-400">
        @if(
            ($quiz == 2 && auth()->user()->data->quiz_two_unlocked_at >= now()) ||
            ($quiz == 3 && auth()->user()->data->quiz_three_unlocked_at >= now())
        )
            <span class="material-symbols-rounded text-7xl">
                lock
            </span>
        @elseif(
            ($quiz == 2 && auth()->user()->data->quiz_two_completed_at) ||
            ($quiz == 3 && auth()->user()->data->quiz_three_completed_at)
        )
            <span class="material-symbols-rounded text-7xl text-green-600">
                check_circle
            </span>
        @else
            <span class="material-symbols-rounded text-7xl">
                lock_open_right
            </span>
        @endif
    </div>
    <span class="flex justify-center font-bold">Knowledge Retention {{ $quiz }}</span>
    @if ($quiz == 2)
        <span class="flex justify-center text-center text-xs italic">Unlocks 1 hour after completing the initial study</span>
    @else
        <span class="flex justify-center text-center text-xs italic">Unlocks 14 days after completing the initial study</span>
    @endif
    @if ($quiz == 2)
        <span class="pt-2 flex justify-center">{{ \Carbon\Carbon::parse(auth()->user()->data->quiz_two_unlocked_at)->format('l, F j, Y g:i A') }}</span>
    @else
        <span class="pt-2 flex justify-center">{{ \Carbon\Carbon::parse(auth()->user()->data->quiz_three_unlocked_at)->format('l, F j, Y g:i A')  }}</span>
    @endif
</div>
