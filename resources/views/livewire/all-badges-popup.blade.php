<div>
    @if($showPopup)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" wire:click="togglePopup">
            <div class="bg-white p-6 rounded-lg shadow-lg relative w-full max-w-2xl" wire:click.stop>
                <span class="absolute top-2 right-2 text-gray-500 text-2xl cursor-pointer" wire:click="togglePopup">&times;</span>
                    <div class="">
                        <div class="flex justify-center items-center py-4 font-bold text-sm">Please hover over each badge to see how to earn it!</div>
                        @foreach($badges->chunk(4) as $chunk)
                            <div class="grid grid-cols-4">
                                @foreach($chunk as $badge)
                                    <div class="m-1 p-2">
                                        <livewire:badge-with-tooltip :badge="$badge" :key="$badge->id"/>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    @endif
</div>

