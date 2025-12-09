<nav id="js-nav-menu" class="hidden w-auto px-2 pt-6 pb-2 bg-gray-200 shadow dark:bg-gray-700 dark:text-gray-200 lg:hidden">
    <ul class="my-0">
        @foreach ($page->getMenuItems() as $menuItem)
            <li class="pl-4">
                <a title="{{ $page->siteName }} {{ $menuItem['name'] }}" href="{{ $menuItem['path'] }}"
                    class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive($menuItem['path']) ? 'active text-blue-500' : 'text-gray-800 dark:text-gray-200 hover:text-blue-500' }}">
                    {{ $menuItem['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
