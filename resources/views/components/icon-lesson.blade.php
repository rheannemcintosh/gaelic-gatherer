<div class="p-8">


    <p class="mb-2 text-center">
        Welcome to our Scottish Gaelic matching lesson on {{ $name }}. To complete this lesson, simply match the 8 cards together correctly! Good luck!
    </p>
    <livewire:matching-form :lesson="$lesson" :columnOneName="$columnOneName" :columnTwoName="$columnTwoName" :columnTwoWords="$columnTwoWords" :columnOneWords="$columnOneWords"  />
</div>
