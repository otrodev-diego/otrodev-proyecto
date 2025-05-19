{{-- resources/views/components/alert.blade.php --}}
<div class="kt-alert kt-alert-light kt-alert-{{ $type }}" id="{{ $id }}">
    <div class="kt-alert-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-info" aria-hidden="true">
            <circle cx="12" cy="12" r="10"></circle>
            <path d="M12 16v-4"></path>
            <path d="M12 8h.01"></path>
        </svg>
    </div>
    <div class="kt-alert-title">{{ $title }}</div>
    <div class="kt-alert-toolbar">
        <button class="kt-link kt-link-xs kt-link-underlined text-mono">
            Upgrade
        </button>
        <button class="kt-alert-close" data-kt-dismiss="#{{ $id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-x" aria-hidden="true">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>
    </div>
</div>
