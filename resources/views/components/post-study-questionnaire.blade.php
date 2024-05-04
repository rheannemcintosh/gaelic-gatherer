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
                    <input type="checkbox" id="scotland-relations[born-in-scotland]" name="scotland-relations[born-in-scotland]" value="Born In Scotland">
                    <label class="pl-2" for="scotland-relations[born-in-scotland]">Born In Scotland</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="scotland-relations[live-in-scotland]" name="scotland-relations[live-in-scotland]" value="Live In Scotland">
                    <label class="pl-2" for="scotland-relations[live-in-scotland]">Live In Scotland</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="scotland-relations[visited-scotland]" name="scotland-relations[visited-scotland]" value="Visited Scotland">
                    <label class="pl-2" for="scotland-relations[visited-scotland]">Visited Scotland</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="scotland-relations[scottish-ancestry]" name="scotland-relations[scottish-ancestry]" value="Scottish Ancestry">
                    <label class="pl-2" for="scotland-relations[scottish-ancestry]">Scottish Ancestry</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="scotland-relations[relations-to-highlands-and-islands]" name="scotland-relations[relations-to-highlands-and-islands]" value="Relations to Highlands and Island">
                    <label class="pl-2" for="scotland-relations[relations-to-highlands-and-islands]">Relations to Highlands and Islands</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="scotland-relations[interest-in-scottish-culture]" name="scotland-relations[interest-in-scottish-culture]" value="Interest In Scottish Culture">
                    <label class="pl-2" for="scotland-relations[interest-in-scottish-culture]">Interested in Scottish Culture</label>
                </div>
            </div>
        </div>

        <!-- Relations to Scottish Gaelic -->
        <div class="mt-4 text-sm text-gray-700">
            <p class="block text-base font-medium text-gray-700">Relations To Scottish Gaelic</p>
            <div class="pl-2">
                <div class="flex items-center">
                    <input type="checkbox" id="gaelic-relations[speak-scottish-gaelic]" name="gaelic-relations[speak-scottish-gaelic]" value="Speak Scottish Gaelic">
                    <label class="pl-2" for="gaelic-relations[speak-scottish-gaelic]">Speak Scottish Gaelic</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="gaelic-relations[speak-gaelic]" name="gaelic-relations[speak-gaelic]" value="Speak Other Goidelic Languages (Irish, Manx)">
                    <label class="pl-2" for="gaelic-relations[speak-gaelic]">Speak Other Goidelic Languages (Irish, Manx)</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="gaelic-relations[interested-in-scottish-gaelic]" name="gaelic-relations[interested-in-scottish-gaelic]" value="Interested in Scottish Gaelic">
                    <label class="pl-2" for="gaelic-relations[interested-in-scottish-gaelic]">Interested In Scottish Gaelic</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="gaelic-relations[interested-in-gaelic]" name="gaelic-relations[interested-in-gaelic]" value="Interested in Gaelic">
                    <label class="pl-2" for="gaelic-relations[interested-in-gaelic]">Interested In Gaelic</label>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <x-primary-button class="mt-4">
            {{ __('Submit') }}
        </x-primary-button>

    </form>
</div>
