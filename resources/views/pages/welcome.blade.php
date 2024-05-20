<x-admin-layout :hideButton="true">
    <h1 class="text-lg font-bold">Welcome</h1>
    <div class="space-y-2 mb-2">
    <p>Thank you for registering for the Gaelic Gatherer study and completing the pre-study questionnaire! Now it's time to explore the Gaelic Gatherer platform.</p>
    <p>Before you begin, please ensure you have sufficient time to engage with the platform and complete the first knowledge retention quiz. <span class="font-bold">This must be completed in one sitting.</span></p>
    <p>Whilst we recommend setting aside at least 30 minutes, you are free to explore the platform at your own pace. The only requirements are that you read the five required overview lessons, before completing the post study questionnaire and a short quiz.</p>

    <p>Additionally, please note the following commitments:</p>
    <ul class="list-disc">
        <li class="ml-8">You will need to be available for a short quiz, lasting up to 10 minutes, one hour after completing the initial study.</li>
        <li class="ml-8">Another short quiz, also around 10 minutes, will be required 14 days later.</li>
    </ul>
    <p>
        Does everything sound good? If you are happy to continue, please click the button below to get started!
    </p>
    </div>

    <form method="POST" action="{{ route('welcome.start') }}">
        @csrf
        <div class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-center">
                    <button class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                        <span class="text-white font-bold">Start The Study</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-admin-layout>
