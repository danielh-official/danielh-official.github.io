<nav id="js-nav-menu" class="hidden w-auto bg-gray-200 px-2 pb-2 pt-6 shadow lg:hidden">
  <ul class="my-0">
    <li class="pl-4">
      <a
        title="{{ $page->siteName }} Blog"
        href="/blog"
        class="{{ $page->isActive('/blog') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }} mb-4 mt-0 block text-sm no-underline"
      >
        Blog
      </a>
      <a
        title="{{ $page->siteName }} About"
        href="/about"
        class="{{ $page->isActive('/about') ? 'active text-blue-500' : 'text-gray-800 hover:text-blue-500' }} mb-4 mt-0 block text-sm no-underline"
      >
        About
      </a>
    </li>
  </ul>
</nav>
