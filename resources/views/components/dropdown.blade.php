@props(['align' => 'right', 'menuWidth' => '48', 'contentClasses' => 'py-1 bg-gray-800 dark:bg-gray-700'])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left left-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'origin-top-left left-full';
            break;
    }

    switch ($menuWidth) {
        case '48':
            $width = 'w-48';
            break;
        case 'full':
            $width = 'w-full';
            break;
        // Add more cases if needed for different widths
    }
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="absolute z-50 mr-4 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
         style="display: none;"
         @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 text-white bg-gray-800 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>

</div>

