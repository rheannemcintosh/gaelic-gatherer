<x-admin-layout>
    <!-- Page Content -->
    <div class="page-content">
        @foreach ($units as $unit)
            <div class="unit">
                <x-unit-heading :unit="$unit" :overview="true"/>

                <x-progress-bar />
            </div>
        @endforeach
    </div>

</x-admin-layout>
