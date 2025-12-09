<nav class="hidden items-center justify-end text-lg lg:flex">
    @foreach ($page->getMenuItems() as $menuItem)
        <a
            title="{{ $page->siteName }} {{ $menuItem["name"] }}"
            href="{{ $menuItem["path"] }}"
            target="{{ $menuItem["newTab"] ?? false ? "_blank" : null }}"
            class="{{ $page->isActive($menuItem["path"]) ? "active text-blue-600" : "" }} ml-6 hover:text-blue-600"
        >
            {{ $menuItem["name"] }}
        </a>
    @endforeach
</nav>
