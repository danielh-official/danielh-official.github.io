<nav class="items-center justify-end hidden text-lg lg:flex">
    @foreach ($page->getMenuItems() as $menuItem)
        <a title="{{ $page->siteName }} {{ $menuItem['name'] }}" href="{{ $menuItem['path'] }}"
            target="{{ ($menuItem['newTab'] ?? false) ? '_blank' : null }}"
            class="ml-6 hover:text-blue-600 {{ $page->isActive($menuItem['path']) ? 'active text-blue-600' : '' }}">
            {{ $menuItem['name'] }}
        </a>
    @endforeach
</nav>
