<div class="p-8">
    <p class="mb-2 text-center">
        @if ($lesson->lessonType->name == 'Icon')
            Welcome to our Scottish Gaelic icon lesson on {{ $name }}. To complete this lesson, please match the four weather icons to the correct Scottish Gaelic translations. Good Luck!
        @else
            Welcome to our Scottish Gaelic matching lesson on {{ $name }}. To complete this lesson, simply match the 8 cards together correctly! Good luck!
        @endif
    </p>
    <livewire:matching-form :lesson="$lesson" :columnOneName="$columnOneName" :columnTwoName="$columnTwoName" :columnTwoWords="$columnTwoWords" :columnOneWords="$columnOneWords" />
</div>
