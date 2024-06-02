<h1 class="mt-8 flex justify-center items-center font-bold text-blue-950">Study Progress</h1>
<div class="flex justify-center items-center ">
    <div class="flex space-x-8 p-4 text-xs">
        <div class="flex flex-col items-center">
            @if (auth()->user()->initial_consent)
                <x-check-circle />
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Initial Registration</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->pre_study_consent && isset(auth()->user()->data->pre_study_completed_at))
                <x-check-circle />
            @elseif (auth()->user()->initial_consent)
                <x-target-circle :route="route('pre-study-questionnaire.show.consent')" />
            @else
                <x-lock-circle />
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Pre-Study Questionnaire</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->study_consent && isset(auth()->user()->data->study_completed_at))
                <x-check-circle />
            @elseif (auth()->user()->pre_study_consent && isset(auth()->user()->data->pre_study_completed_at))
                <x-target-circle :route="route('overview.show')" />
            @else
                <x-lock-circle />
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Explore the Platform</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->post_study_consent && isset(auth()->user()->data->post_study_completed_at))
                <x-check-circle />
            @elseif (auth()->user()->study_consent && isset(auth()->user()->data->study_completed_at))
                <x-target-circle :route="route('post-study-questionnaire.show.consent')" />
            @else
                <x-lock-circle />
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Post-Study Questionnaire</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->quiz_one_consent && isset(auth()->user()->data->quiz_one_completed_at))
                <x-check-circle />
            @elseif (auth()->user()->post_study_consent && isset(auth()->user()->data->post_study_completed_at))
                <x-target-circle :route="route('knowledge-retention-quiz.show.consent', ['quiz' => 1])" />
            @else
                <x-lock-circle />
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Quiz 1 (Immediate)</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->quiz_two_consent && isset(auth()->user()->data->quiz_two_completed_at))
                <x-check-circle />
            @elseif (
                auth()->user()->quiz_one_consent &&
                isset(auth()->user()->data->quiz_one_completed_at) &&
                now() >= auth()->user()->data->quiz_two_unlocked_at
            )
                <x-target-circle :route="route('knowledge-retention-quiz.show.consent', ['quiz' => 2])" />
            @else
                <x-lock-circle />
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Quiz 2 (1Hour)</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->quiz_three_consent && isset(auth()->user()->data->quiz_three_completed_at))
                <x-check-circle />
            @elseif (
                auth()->user()->quiz_two_consent &&
                isset(auth()->user()->data->quiz_two_completed_at) &&
                now() >= auth()->user()->data->quiz_three_unlocked_at
            )
                <x-target-circle :route="route('knowledge-retention-quiz.show.consent', ['quiz' => 3])" />
            @else
                <x-lock-circle />
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Quiz 3 (14Days)</span>
        </div>
    </div>
</div>
