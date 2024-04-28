<div>
    <p class="font-bold">Please check each of the following boxes if you agree with the statement:</p>
    <div class="p-2">
        @foreach (\App\Helpers\ConsentHelper::CONSENT_STATEMENTS as $statement)
            <div class="flex items-center mb-1">
                <input type="checkbox" id="initial_consent_statement[{{ $loop->index }}]" name="initial_consent_statement[{{ $loop->index }}]" class="mr-4">
                <label for="initial_consent_statement[{{ $loop->index }}]" class="text-sm">{{ $statement }}</label>
            </div>
        @endforeach
    </div>
</div>
