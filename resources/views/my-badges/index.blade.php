<x-admin-layout>
    @isset($myBadges)
        <div class="mt-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-gray-50 sm:shadow-xl p-8">
                <div>
                    <div>
                        <div class="flex justify-center py-4 font-bold text-sm">Please hover over each badge to see how to earn it!</div>
                        @foreach($myBadges->chunk(5) as $chunk)
                            <div class="grid grid-cols-5">
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
        </div>
    @endisset
</x-admin-layout>
