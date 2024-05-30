<!-- Unit heading for displaying on the overview page -->
<div class="relative h-36 w-full mb-4">
    <!-- Blue Banner -->
    <div class="absolute inset-0 bg-blue-700 h-full opacity-100"></div>
    <!-- Display the unit number, unit name and unit description -->
    <div class="absolute inset-0 h-full p-4">
        <h2 class="text-white font-bold text-xl pt-12">Unit {{ $unit->sort_order }} | {{ $unit->title }}</h2>
        <p class="text-sm text-white font-bold">{{ $unit->description }}</p>
    </div>
</div>
