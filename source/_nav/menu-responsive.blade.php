<nav
    id="js-nav-menu"
    class="hidden w-auto bg-gray-200 px-2 pt-6 pb-2 shadow lg:hidden dark:bg-gray-700 dark:text-gray-200"
>
    <ul class="my-0">
        @foreach ($page->getMenuItems() as $menuItem)
            <li class="pl-4">
                <a
                    title="{{ $page->siteName }} {{ $menuItem["name"] }}"
                    href="{{ $menuItem["path"] }}"
                    class="{{ $page->isActive($menuItem["path"]) ? "active text-blue-500" : "text-gray-800 hover:text-blue-500 dark:text-gray-200" }} mt-0 mb-4 block text-sm no-underline"
                >
                    {{ $menuItem["name"] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
