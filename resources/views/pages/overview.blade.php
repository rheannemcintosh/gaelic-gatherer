<x-admin-layout>

    @if(session('newBadges'))
        <livewire:badges-popup :newBadges="session('newBadges')" />
    @endisset

    <!-- Page Content -->
    <div class="page-content">
        @foreach ($units as $unit)
            <div class="unit">
                <x-unit-heading :unit="$unit" :overview="true"/>
                <x-progress-bar :percentage="$unitPercentages[$unit->id]" />
                @if ($unit->lessons->count() == 2)
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        @foreach ($unit->lessons as $lesson)
                            <x-lesson-card :lesson="$lesson" :slug="$unit->slug" />
                        @endforeach
                    </div>
                @else
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        @foreach ($unit->lessons as $lesson)
                            <x-lesson-card :lesson="$lesson" :slug="$unit->slug" />
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>

</x-admin-layout>
