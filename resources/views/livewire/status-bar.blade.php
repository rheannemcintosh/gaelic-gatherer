<div aria-label="Status Bar"
     class="
         {{ $this->statusBarClass }}
         overflow-hidden shadow-sm sm:rounded-lg mb-4 text-xs
     "
>
    <div class="px-4 py-2 text-gray-50">
        @if ($type == "success")
            <span class="material-symbols-rounded text-xs align-middle">
                check_circle
            </span>
        @elseif ($type == "warning")
            <span class="material-symbols-rounded text-xs align-middle">
                warning
            </span>
        @elseif ($type == "error")
            <span class="material-symbols-rounded text-xs align-middle">
                error
            </span>
        @else
            <span class="material-symbols-rounded text-xs align-middle">
                info
            </span>
        @endif
        <span class="align-middle">
            {{ $message }}
        </span>
    </div>
</div>
