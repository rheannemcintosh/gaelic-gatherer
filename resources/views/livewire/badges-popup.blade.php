<div>
    @if($showPopup)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" wire:click="togglePopup">
            <div class="bg-white p-6 rounded-lg shadow-lg relative w-full max-w-md" wire:click.stop>
                <span class="absolute top-2 right-2 text-gray-500 text-2xl cursor-pointer" wire:click="togglePopup">&times;</span>
                <div class="flex flex-wrap justify-center">
                    <h2 class="text-lg font-semibold mb-2">
                        @if (count($newBadges) > 1)
                            Congratulations! You have earned {{ count($newBadges) }} badges!
                        @else
                            Congratulations! You have earned a badge!
                        @endif
                    </h2>
                </div>
                <div class="flex flex-wrap justify-center">
                    <hr class="w-full border-t-2 border-gray-300 my-2">
                    @foreach($newBadges as $badge)
                        <div class="m-1 p-2">
                            <!-- Badge -->
                            <div class="flex justify-center pb-2">
                                <div class="w-16 h-16 bg-gray-500 rounded-full"></div>
                            </div>
                            <!-- Badge Name -->
                            <div class="flex justify-center">
                                <div class="text-sm font-bold">{{ $badge->name }}</div>
                            </div>
                            <!-- Badge Description -->
                            <div>
                                <div class="text-xs">{{ $badge->description }}</div>
                            </div>
                        </div>
                        <hr class="w-full border-t-2 border-gray-300 my-2">
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
