<x-admin-layout :hideButton="true">
    <h1 class="text-lg font-bold">Pre-Study Questionnaire</h1>
    <form method="POST" action="{{ route('pre-study-questionnaire.store') }}">
        @csrf
        <!-- Pre-Study Motivation Level -->
        <div class="mt-4">
            <label for="pre_study_motivation" class="block text-sm font-medium text-gray-700">Motivation To Learn Scottish Gaelic Before Hearing About the Study</label>
            <select id="pre_study_motivation" name="pre_study_motivation" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" {{ old('pre_study_motivation') == "" ? 'selected' : '' }}>Select your motivation level</option>
                <option value="Highly Motivated" {{ old('pre_study_motivation') == "Highly Motivated" ? 'selected' : '' }}>Highly motivated</option>
                <option value="Moderately Motivated" {{ old('pre_study_motivation') == "Moderately Motivated" ? 'selected' : '' }}>Moderately motivated</option>
                <option value="Slightly Motivated" {{ old('pre_study_motivation') == "Slightly Motivated" ? 'selected' : '' }}>Slightly motivated</option>
                <option value="Not Motivated" {{ old('pre_study_motivation') == "Not Motivated" ? 'selected' : '' }}>Not motivated at all</option>
            </select>
            <x-input-error :messages="$errors->get('pre_study_motivation')" class="mt-2" />
        </div>

        <!-- Current Level of Knowledge of Scottish Gaelic -->
        <div class="mt-4">
            <label for="scottish_gaelic_competency" class="block text-sm font-medium text-gray-700">Current Level of Knowledge of Scottish Gaelic</label>
            <select id="scottish_gaelic_competency" name="scottish_gaelic_competency" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" {{ old('scottish_gaelic_competency') == "" ? 'selected' : '' }}>Select your current knowledge level</option>
                <option value="None" {{ old('scottish_gaelic_competency') == "None" ? 'selected' : '' }}>None (No knowledge)</option>
                <option value="Beginner" {{ old('scottish_gaelic_competency') == "Beginner" ? 'selected' : '' }}>Beginner</option>
                <option value="Intermediate" {{ old('scottish_gaelic_competency') == "Intermediate" ? 'selected' : '' }}>Intermediate</option>
                <option value="Advanced" {{ old('scottish_gaelic_competency') == "Advanced" ? 'selected' : '' }}>Advanced</option>
                <option value="Fluent" {{ old('scottish_gaelic_competency') == "Fluent" ? 'selected' : '' }}>Fluent</option>
                <option value="Native Speaker" {{ old('scottish_gaelic_competency') == "Native Speaker" ? 'selected' : '' }}>Native Speaker</option>
            </select>
            <x-input-error :messages="$errors->get('scottish_gaelic_competency')" class="mt-2" />
        </div>

        <div class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-center">
                    <button class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                        <span class="text-white font-bold">Complete The Pre-Study Questionnaire</span>
                    </button>
                </div>
            </div>
        </div>
    </form>

</x-admin-layout>
