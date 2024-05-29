<x-admin-layout :hideButton="true">
    <h1 class="text-lg font-bold">Consent to Post-Study Questionnaire</h1>
    <div class="space-y-2 mb-2">
        <p>Thank you for exploring the Gaelic Gatherer platform! Now it is time to start the post-study questionnaire!</p>
        <p>This questionnaire consists of 3 small questions and should take no more than 5 minutes to complete.</p>
        <p>
            Does everything sound good? If you are happy to continue, please click the button below to get started!
        </p>
    </div>

    <form method="POST" action="{{ route('post-study-questionnaire.store.consent') }}">
        @csrf
        <div class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-center">
                    <button class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                        <span class="text-white font-bold">Start The Post-Study Questionnaire</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-admin-layout>
