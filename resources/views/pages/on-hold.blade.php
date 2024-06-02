<x-admin-layout :hideButton="true">
    <h1 class="text-xl font-bold">Thank You!</h1>
    <p class="pb-2 font-bold">You have completed all the unlocked steps of the study for now!</p>
    <p class="pb-2">Please come back at the following times to complete the remainder of the two final studies. We'd appreciate if you could take a note of these times, and to set a reminder. We will attempt to remind you, where possible.</p>
    <p class="pb-2">To log back in, please visit the following URL: <a class="text-blue-700 font-bold underline" href="/login">{{ route('login') }}</a></p>
    <form>
    <div class="grid grid-cols-2 gap-8 m-4">
        <button
            @if(auth()->user()->data->quiz_two_unlocked_at >= now() || isset(auth()->user()->data->quiz_two_completed_at)) disabled @endif
            class="disabled:cursor-not-allowed">
            <a href="/knowledge-retention-quiz/2/consent">
                <x-knowledge-retention-button :quiz="2" />
            </a>
        </button>

        <button @if(auth()->user()->data->quiz_three_unlocked_at <= now() || isset(auth()->user()->data->quiz_three_completed_at)) disabled @endif class="disabled:cursor-not-allowed">
            <a href="{{ route('knowledge-retention-quiz.show.consent', ['quiz' => 3]) }}">
                <x-knowledge-retention-button :quiz="3" />
            </a>
        </button>
    </div>
</x-admin-layout>
