<div>
    <form method="POST" action="{{ route('knowledge-retention-quiz.store') }}">

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

        <!-- Submit Button -->
        <x-primary-button class="mt-4">
            {{ __('Submit') }}
        </x-primary-button>

    </form>
</div>
