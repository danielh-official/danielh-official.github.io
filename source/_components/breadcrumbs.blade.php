@props(['items' => []])

@if (count($items) > 1)
  <nav class="mb-6 text-sm text-gray-600" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-2">
      @foreach ($items as $index => $item)
        <li class="flex items-center">
          @if ($index > 0)
            <svg class="mx-2 h-4 w-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
              <path
                fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
          @endif

          @if ($item['active'] ?? false)
            <span class="font-medium text-gray-800 dark:text-gray-500" aria-current="page">{{ $item['title'] }}</span>
          @else
            <a
              href="{{ $item['url'] }}"
              class="rounded transition-colors hover:text-blue-600 focus:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
              {{ $item['title'] }}
            </a>
          @endif
        </li>
      @endforeach
    </ol>
  </nav>
@endif
