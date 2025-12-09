<nav
  id="js-nav-menu"
  class="hidden w-auto bg-gray-200 px-2 pb-2 pt-6 shadow lg:hidden dark:bg-gray-800 dark:text-gray-200"
>
  <ul class="my-0">
    <li class="list-none pl-4">
      <a
        title="{{ $page->siteName }} Blog"
        href="/blog"
        class="{{ $page->isActive('/blog') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }} mb-4 mt-0 block text-sm no-underline dark:text-gray-200"
      >
        Blog
      </a>
    </li>

    <li class="list-none pl-4">
      <a
        title="{{ $page->siteName }} Resume"
        href="/blog"
        class="{{ $page->isActive('/resume') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }} mb-4 mt-0 block text-sm no-underline dark:text-gray-200"
      >
        Resume
      </a>
    </li>
  </ul>
</nav>
