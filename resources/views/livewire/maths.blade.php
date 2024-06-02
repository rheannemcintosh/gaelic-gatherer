<div>
    <form method="POST" action="{{ route('user-lessons.store', ['lesson' => $lesson->id]) }}">
        @csrf
        <div>
            @foreach($questions as $question)
                <div class="border border-gray-100 border-2 p-8 mb-4">
                    <div class="grid grid-cols-6 mb-4">
                        <div class="col-span-5 text-2xl font-bold flex items-center pl-2">
                            Question {{ $loop->iteration }}
                        </div>
                        <div class="flex justify-center items-center font-bold">
                            Pick One
                        </div>
                    </div>
                    <div class="grid grid-cols-6">
                        <div class="col-span-5 flex items-center justify-around">
                            @foreach($question['options'] as $option)
                                <div class="
                                    card
                                    bg-gray-50
                                    border
                                    border-gray-100
                                    rounded-md
                                    p-4
                                    flex
                                    justify-center
                                    items-center
                                    w-20
                                    h-20
                                ">
                                    {{ $option }}
                                </div>
                            @endforeach
                        </div>
                        <div class="p-4 flex items-center justify-center">
                            <div class="space-y-4">
                                @foreach($question['choices'] as $choice)
                                    <div
                                        class="
                                            card
                                            bg-gray-50
                                            shadow-md
                                            rounded-md
                                            p-4
                                            cursor-pointer
                                            flex
                                            justify-center
                                            items-center
                                            w-20
                                            h-20
                                            font-bold
                                            @if(isset($selectedAnswers[$question['id']]) && $selectedAnswers[$question['id']] == $choice)
                                                @if($correctAnswers[$question['id']] == $choice)
                                                    bg-green-800
                                                    text-white
                                                @else
                                                    bg-red-800
                                                    text-white
                                                @endif
                                            @else
                                                hover:bg-gray-100
                                                hover:scale-105
                                                hover:shadow-xl
                                            @endif
                                        "
                                        wire:click="selectAnswer({{ $question['id'] }}, '{{ $choice }}')"
                                    >
                                        {{ $choice }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
</div>
