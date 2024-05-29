<x-admin-layout :hideButton="true">
    <h1 class="text-lg font-bold">Consent to Knowledge Retention Quiz {{ $quiz }}</h1>
    <div class="space-y-2 mb-2">
        <p>Thank you for completing the post-study questionnaire! Now it is time to start the first knowledge retention quiz!</p>
        <p>This questionnaire consists of 10 multiple choice questions on Scottish Gaelic and should take no more than 10 minutes to complete.</p>
        <p>
            Does everything sound good? If you are happy to continue, please click the button below to get started!
        </p>
    </div>

    <form method="POST" action="{{ route('knowledge-retention-quiz.store.consent', ['quiz' => $quiz]) }}">
        @csrf
        <div class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-center">
                    <button class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                        <span class="text-white font-bold">Start Knowledge Retention Quiz 1</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-admin-layout>
