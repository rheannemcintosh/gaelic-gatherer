<div class="">
    <form method="POST" action="{{ route('user-lessons.store', ['lesson' => $lesson->id]) }}">
        @csrf
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="mt-4">
                <h2 class="text-xl font-bold mb-4 flex justify-center">Scottish Gaelic Words</h2>
                @foreach($gaelicWords as $gaelicWord)
                    <div class="flex justify-center">
                        <div
                            wire:click="selectGaelic({{ $gaelicWord['index'] }})"
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

                                @if(array_key_exists($gaelicWord['index'], $pairs))
                                    bg-green-800
                                    text-white
                                @elseif($incorrectPairs && $selectedGaelic === $gaelicWord['index'])
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
                            <p class="flex justify-center items-center text-center font-bold">{{ $gaelicWord['word'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                <h2 class="text-xl font-bold mb-4 flex justify-center">English Words</h2>
                @foreach($englishWords as $englishWord)
                    <div class="flex justify-center">
                        <div
                            wire:click="selectEnglish({{ $englishWord['index'] }})"
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

                                @if(array_key_exists($englishWord['index'], $pairs))
                                    bg-green-800
                                    text-white
                                @elseif($incorrectPairs && $selectedEnglish === $englishWord['index'] )
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
                            <p class="flex justify-center items-center text-center font-bold">{{ $englishWord['word'] }}</p>
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
