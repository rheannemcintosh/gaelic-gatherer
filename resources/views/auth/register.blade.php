<x-app-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Consent Form -->
        <x-consent-form />

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

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


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
