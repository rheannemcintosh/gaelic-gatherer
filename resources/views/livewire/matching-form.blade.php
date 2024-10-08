<div class="">
    <form method="POST" action="{{ route('user-lessons.store', ['lesson' => $lesson->id]) }}">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="mt-4">

                <h2 class="text-xl font-bold mb-4 flex justify-center">{{ $columnOneName }}</h2>
                @foreach($columnOneWords as $columnOneWord)
                    <div class="flex justify-center">
                        <div
                            wire:click="selectGaelic({{ $columnOneWord['index'] }})"
                            class="
                                card
                                bg-gray-50
                                shadow-md
                                rounded-md
                                p-4
                                mb-4
                                cursor-pointer
                                flex
                                justify-center

                                @if(array_key_exists($columnOneWord['index'], $pairs))
                                    bg-green-800
                                    text-white
                                @elseif($incorrectPairs && $selectedGaelic === $columnOneWord['index'])
                                    bg-red-800
                                    text-white
                                @else
                                    hover:bg-gray-100
                                    hover:scale-105
                                    hover:shadow-xl
                                @endif
                            "
                            style="width: 150px; height: 150px;"
                        >
                            <p class="flex justify-center items-center text-center font-bold">
                                @if ($lesson->lessonType->name == 'Icon')
                                    @switch($columnOneWord['word'])
                                        @case('Rainy')
                                            <span class="material-symbols-rounded text-7xl">
                                                rainy
                                            </span>
                                            @break
                                        @case('Sunny')
                                            <span class="material-symbols-rounded text-7xl">
                                                sunny
                                            </span>
                                            @break
                                        @case('Cloudy')
                                            <span class="material-symbols-rounded text-7xl">
                                                cloudy
                                            </span>
                                            @break
                                        @case('Snowy')
                                            <span class="material-symbols-rounded text-7xl">
                                                cloudy_snowing
                                            </span>
                                            @break
                                        @case('Windy')
                                            <span class="material-symbols-rounded text-7xl">
                                                windy
                                            </span>
                                            @break
                                        @case('Foggy')
                                            <span class="material-symbols-rounded text-7xl">
                                                foggy
                                            </span>
                                            @break
                                        @case('Hot')
                                            <span class="material-symbols-rounded text-7xl">
                                                hot
                                            </span>
                                            @break
                                        @case('Cold')
                                            <span class="material-symbols-rounded text-7xl">
                                                cold
                                            </span>
                                            @break
                                    @endswitch
                                @else
                                    {{ $columnOneWord['word'] }}
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                <h2 class="text-xl font-bold mb-4 flex justify-center">{{ $columnTwoName }}</h2>
                @foreach($columnTwoWords as $columnTwoWord)
                    <div class="flex justify-center">
                        <div
                            wire:click="selectEnglish({{ $columnTwoWord['index'] }})"
                            class="
                                card
                                bg-gray-50
                                shadow-md
                                rounded-md
                                p-4
                                mb-4
                                cursor-pointer
                                flex
                                justify-center

                                @if(array_key_exists($columnTwoWord['index'], $pairs))
                                    bg-green-800
                                    text-white
                                @elseif($incorrectPairs && $selectedEnglish === $columnTwoWord['index'] )
                                    bg-red-800
                                    text-white
                                @else
                                    hover:bg-gray-100
                                    hover:scale-105
                                    hover:shadow-xl
                                @endif
                            "
                            style="width: 150px; height: 150px;"
                        >
                            <p class="flex justify-center items-center text-center font-bold">{{ $columnTwoWord['word'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-center">
                    <button class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105 @if(!$isComplete) from-gray-700 to-gray-500 hover:scale-100 @endif" @if(!$isComplete) disabled @endif>
                        <span class="text-white font-bold">Complete Lesson</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="">
            <div class="mt-4 text-green-500 font-bold h-8 flex justify-center items-center">
                @if($isComplete)
                    <div class="text-green-800">
                         All matches are correct! Well done!
                    </div>
                @elseif ($isIncorrect)
                    <div class="text-red-800">
                        Incorrect matches. Please try again.
                    </div>
               @endif
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.addEventListener('incorrect-match', function () {
            alert('Incorrect match, try again!');
        });

        document.addEventListener('reset-selections', () => {
            setTimeout(() => {
            @this.call('resetSelections');
            }, 1000);  // Delay of 1 second
        });
    });
</script>
