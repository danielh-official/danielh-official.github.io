<nav class="hidden items-center justify-end text-lg lg:flex">
  <a
    title="{{ $page->siteName }} Blog"
    href="/blog"
    class="{{ $page->isActive('/blog') ? 'active text-blue-800' : '' }} ml-6 hover:text-blue-600"
  >
    Blog
  </a>
</nav>
