<x-admin-layout :hideButton="true">
    <h1 class="text-lg font-bold">Knowledge Retention Quiz {{ $quiz }}</h1>
    <p>
        Thank you for completing the post study questionnaire! To measure your knowledge retention, please take a moment to complete this brief quiz.
    </p>
    <x-knowledge-retention-quiz :quiz="$quiz"/>
</x-admin-layout>
