<div>
    <form method="POST" action="{{ route('post-study-questionnaire.store') }}">

        <!-- CSRF Token -->
        @csrf

        <!-- Post-Study Motivation Level -->
        <div class="mt-4">
            <label for="post_study_motivation" class="block text-base font-medium text-gray-700">Motivation To Learn Scottish Gaelic After Hearing About the Study</label>
            <select id="post_study_motivation" name="post_study_motivation" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" {{ old('post_study_motivation') == "" ? 'selected' : '' }}>Select your motivation level</option>
                <option value="Highly Motivated" {{ old('post_study_motivation') == "Highly Motivated" ? 'selected' : '' }}>Highly motivated</option>
                <option value="Moderately Motivated" {{ old('post_study_motivation') == "Moderately Motivated" ? 'selected' : '' }}>Moderately motivated</option>
                <option value="Slightly Motivated" {{ old('post_study_motivation') == "Slightly Motivated" ? 'selected' : '' }}>Slightly motivated</option>
                <option value="Not Motivated" {{ old('post_study_motivation') == "Not Motivated" ? 'selected' : '' }}>Not motivated at all</option>
            </select>
            <x-input-error :messages="$errors->get('post_study_motivation')" class="mt-2" />
        </div>

        <!-- Relations to Scotland -->
        <div class="mt-4 text-sm text-gray-700">
            <p class="block text-base font-medium text-gray-700">Relations To Scotland</p>
            <div class="pl-2">
                <div class="flex items-center">
                    <input type="checkbox" id="born_in_scotland" name="born_in_scotland" value="true">
                    <label class="pl-2" for="born_in_scotland">Born In Scotland</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="live_in_scotland" name="live_in_scotland" value="true">
                    <label class="pl-2" for="live_in_scotland">Live In Scotland</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="visited_scotland" name="visited_scotland" value="true">
                    <label class="pl-2" for="visited_scotland">Visited Scotland</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="scottish_ancestry" name="scottish_ancestry" value="true">
                    <label class="pl-2" for="scottish_ancestry">Scottish Ancestry</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="relations_to_highlands_and_islands" name="relations_to_highlands_and_islands" value="true">
                    <label class="pl-2" for="relations_to_highlands_and_islands">Relations to Highlands and Islands</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="interested_in_scottish_culture" name="interested_in_scottish_culture" value="true">
                    <label class="pl-2" for="interested_in_scottish_culture">Interested in Scottish Culture</label>
                </div>
            </div>
        </div>

        <!-- Relations to Scottish Gaelic -->
        <div class="mt-4 text-sm text-gray-700">
            <p class="block text-base font-medium text-gray-700">Relations To Scottish Gaelic</p>
            <div class="pl-2">
                <div class="flex items-center">
                    <input type="checkbox" id="speak_scottish_gaelic" name="speak_scottish_gaelic" value="true">
                    <label class="pl-2" for="speak_scottish_gaelic">Speak Scottish Gaelic</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="speak_gaelic" name="speak_gaelic" value="true">
                    <label class="pl-2" for="speak_gaelic">Speak Other Goidelic Languages (Irish, Manx)</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="interested_in_scottish_gaelic" name="interested_in_scottish_gaelic" value="true">
                    <label class="pl-2" for="interested_in_scottish_gaelic">Interested In Scottish Gaelic</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="interested_in_gaelic" name="interested_in_gaelic" value="true">
                    <label class="pl-2" for="interested_in_gaelic">Interested In Gaelic</label>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <x-primary-button class="mt-4">
            {{ __('Submit') }}
        </x-primary-button>

    </form>
</div>
