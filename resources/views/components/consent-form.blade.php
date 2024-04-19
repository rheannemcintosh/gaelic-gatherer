<form action="{{ route('consent') }}" method="POST" class="m-2 p-2 bg-gray-100 text-sm">
    @csrf
    <div class="">
        <p class="font-bold">Please check each of the following boxes if you agree with the statement:</p>
        <div class="p-2">
            @foreach (\App\Helpers\ConsentHelper::CONSENT_STATEMENTS as $statement)
                <div class="flex items-center mb-1">
                    <input type="checkbox" id="statement[{{ $loop->index }}]" name="statement[{{ $loop->index }}]" class="mr-4">
                    <label for="statement[{{ $loop->index }}]" class="text-sm">{{ $statement }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <button type="submit" class="px-4 py-1 bg-blue-600 text-white font-bold rounded-xl">Submit</button>
</form>
