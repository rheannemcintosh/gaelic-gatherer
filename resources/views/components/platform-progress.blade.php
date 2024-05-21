<h1 class="mt-8 flex justify-center items-center font-bold text-blue-950">Study Progress</h1>
<div class="flex justify-center items-center ">

    <div class="flex space-x-8 p-4 text-xs">
        <div class="flex flex-col items-center">
            @if (auth()->user()->initial_consent)
                <div class="w-8 h-8 bg-blue-500 rounded-full mb-2"></div>
            @else
                <div class="w-8 h-8 bg-white border-red-600 rounded-full mb-2"></div>
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Initial Registration</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->pre_study_consent)
                <div class="w-8 h-8 bg-blue-500 rounded-full mb-2"></div>
            @else
                <div class="w-8 h-8 bg-white border-2 border-blue-500 rounded-full mb-2"></div>
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Pre-Study Questionnaire</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->study_consent)
                <div class="w-8 h-8 bg-blue-500 rounded-full mb-2"></div>
            @else
                <div class="w-8 h-8 bg-white border-2 border-blue-500 rounded-full mb-2"></div>
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Explore the Platform</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->post_study_consent)
                <div class="w-8 h-8 bg-blue-500 rounded-full mb-2"></div>
            @else
                <div class="w-8 h-8 bg-white border-2 border-blue-500 rounded-full mb-2"></div>
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Post-Study Questionnaire</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->quiz_one_consent)
                <div class="w-8 h-8 bg-blue-500 rounded-full mb-2"></div>
            @else
                <div class="w-8 h-8 bg-white border-2 border-blue-500 rounded-full mb-2"></div>
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Quiz 1 (Immediate)</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->quiz_two_consent)
                <div class="w-8 h-8 bg-blue-500 rounded-full mb-2"></div>
            @else
                <div class="w-8 h-8 bg-white border-2 border-blue-500 rounded-full mb-2"></div>
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Quiz 2 (1Hour)</span>
        </div>
        <div class="flex flex-col items-center">
            @if (auth()->user()->quiz_three_consent)
                <div class="w-8 h-8 bg-blue-500 rounded-full mb-2"></div>
            @else
                <div class="w-8 h-8 bg-white border-2 border-blue-500 rounded-full mb-2"></div>
            @endif
            <span class="w-20 text-center text-gray-700 break-words">Quiz 3 (14Days)</span>
        </div>
    </div>
</div>
