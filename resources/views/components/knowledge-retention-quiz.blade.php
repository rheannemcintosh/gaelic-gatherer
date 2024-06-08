<div>
    <form method="POST" action="{{ route('knowledge-retention-quiz.store', ['quiz' => $quiz]) }}">

        @if (!empty($errors->all()))
            <div class="mt-2 bg-red-600 text-white rounded-md px-4 py-2">
                <div>Please input an answer for all questions</div>
            </div>
        @endif

        <!-- CSRF Token -->
        @csrf

        <!-- Knowledge Retention Quiz -->
        @foreach (\App\Helpers\KnowledgeRetentionHelper::QUESTIONS as $key => $question)
            <div class="mt-4">
                <label for="knowledge_retention_quiz[{{ $key }}]" class="block text-base font-medium text-gray-700">{{ $question['question'] }}</label>
                <x-gg-select :options="$question['answers']" name="knowledge_retention_quiz[{{ $key }}]" id="knowledge_retention_quiz[{{ $key }}]" :selected="old('knowledge_retention_quiz')[$key] ?? ''" />
            </div>
        @endforeach

        <div class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-center">
                    <button class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                        <span class="text-white font-bold">Submit</span>
                    </button>
                </div>
            </div>
        </div>

    </form>
</div>
