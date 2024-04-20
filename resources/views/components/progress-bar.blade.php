<div class="bg-gray-50 border border-gray-200 rounded-xl p-1 mb-4 text-xs">
    <div class="relative h-4 flex items-center justify-center">
        @if ($percentage == 100)
            <div class="absolute top-0 bottom-0 left-0 rounded-lg w-[100%] bg-blue-600"></div>
            <div class="relative font-bold text-gray-50">100%</div>
        @elseif ($percentage == 66)
            <div class="absolute top-0 bottom-0 left-0 rounded-lg w-[66%] bg-blue-600"></div>
            <div class="relative font-bold text-gray-50">66%</div>
        @elseif ($percentage== 33)
            <div class="absolute top-0 bottom-0 left-0 rounded-lg w-[33%] bg-blue-600"></div>
            <div class="relative font-bold text-gray-900">33%</div>
        @else ($percentage == 0)
            <div class="absolute top-0 bottom-0 left-0 rounded-lg w-[0%] bg-blue-600"></div>
            <div class="relative font-bold text-gray-900">0%</div>
        @endif
    </div>
</div>
