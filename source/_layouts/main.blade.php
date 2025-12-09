<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta
            name="description"
            content="{{ $page->description ?? $page->siteDescription }}"
        />

        <meta
            property="og:title"
            content="{{ $page->title ? $page->title . " | " : "" }}{{ $page->siteName }}"
        />
        <meta property="og:type" content="{{ $page->type ?? "website" }}" />
        <meta property="og:url" content="{{ $page->getUrl() }}" />
        <meta
            property="og:description"
            content="{{ $page->description ?? $page->siteDescription }}"
        />

        <title>
            {{ $page->title ? $page->title . " | " : "" }}{{ $page->siteName }}
        </title>

        <link rel="home" href="{{ $page->baseUrl }}" />
        <link rel="icon" href="/favicon.ico" />
        <link
            href="/blog/feed.atom"
            type="application/atom+xml"
            rel="alternate"
            title="{{ $page->siteName }} Atom Feed"
        />

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link
            href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i"
            rel="stylesheet"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/prismjs/themes/prism.css"
            rel="stylesheet"
        />

        @viteRefresh()
        <link
            rel="stylesheet"
            href="{{ vite("source/_assets/css/main.css") }}"
        />
        <script
            defer
            type="module"
            src="{{ vite("source/_assets/js/main.js") }}"
        ></script>
    </head>

    <body
        class="flex flex-col justify-between min-h-screen font-sans leading-normal text-gray-800 bg-gray-100 dark:bg-gray-900 dark:text-gray-200"
    >
        <header
            class="flex items-center h-24 py-4 border-b shadow"
            role="banner"
        >
            <div
                class="container flex items-center px-4 mx-auto max-w-8xl lg:px-8"
            >
                <div class="flex items-center">
                    <a
                        href="/"
                        title="{{ $page->siteName }} home"
                        class="inline-flex items-center"
                    >
                        <img
                            class="h-8 mr-3 md:h-10"
                            src="/assets/img/logo.svg"
                            alt="{{ $page->siteName }} logo"
                        />

                        <h1
                            class="my-0 text-lg font-semibold text-blue-800 hover:text-blue-600 md:text-2xl dark:text-blue-400"
                        >
                            {{ $page->siteName }}
                        </h1>
                    </a>
                </div>

                <div
                    id="vue-search"
                    class="flex items-center justify-end flex-1"
                >
                    @include("_components.search")

                    @include("_nav.menu")

                    @include("_nav.menu-toggle")
                </div>
            </div>
        </header>

        @include("_nav.menu-responsive")

        <main
            role="main"
            class="container flex-auto w-full max-w-4xl px-6 py-16 mx-auto"
        >
            @yield("body")
        </main>

        <footer class="py-4 mt-12 text-sm text-center" role="contentinfo">
            <ul class="flex flex-col justify-center list-none md:flex-row">
                <li class="md:mr-2">&copy; Daniel Haven {{ date("Y") }}.</li>

                <l class="md:mr-2">
                    Built with
                    <a
                        href="http://jigsaw.tighten.co"
                        title="Jigsaw by Tighten"
                    >
                        Jigsaw
                    </a>
                    and
                    <a
                        href="https://tailwindcss.com"
                        title="Tailwind CSS, a utility-first CSS framework"
                    >
                        Tailwind CSS
                    </a>
                    .
                </l>
            </ul>
        </footer>

        {{-- <a
            target="_blank"
            rel="noopener noreferrer"
            class="fixed flex hidden px-4 py-2 text-white transition bg-gray-800 rounded right-4 bottom-4 gap-x-2 hover:bg-gray-700 md:flex"
            href="https://github.com/danielh-official/danielh-official.github.io"
        >
            <svg
                viewBox="0 0 24 24"
                aria-hidden="true"
                class="size-6 fill-slate-100"
            >
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 2C6.477 2 2 6.463 2 11.97c0 4.404 2.865 8.14 6.839 9.458.5.092.682-.216.682-.48 0-.236-.008-.864-.013-1.695-2.782.602-3.369-1.337-3.369-1.337-.454-1.151-1.11-1.458-1.11-1.458-.908-.618.069-.606.069-.606 1.003.07 1.531 1.027 1.531 1.027.892 1.524 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.332-2.22-.251-4.555-1.107-4.555-4.927 0-1.088.39-1.979 1.029-2.675-.103-.252-.446-1.266.098-2.638 0 0 .84-.268 2.75 1.022A9.607 9.607 0 0 1 12 6.82c.85.004 1.705.114 2.504.336 1.909-1.29 2.747-1.022 2.747-1.022.546 1.372.202 2.386.1 2.638.64.696 1.028 1.587 1.028 2.675 0 3.83-2.339 4.673-4.566 4.92.359.307.678.915.678 1.846 0 1.332-.012 2.407-.012 2.734 0 .267.18.577.688.48 3.97-1.32 6.833-5.054 6.833-9.458C22 6.463 17.522 2 12 2Z"
                ></path>
            </svg>
            View on GitHub
        </a> --}}

        <script src="https://cdn.jsdelivr.net/npm/prismjs/prism.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/prismjs/plugins/autoloader/prism-autoloader.min.js"></script>
        @stack("scripts")
    </body>
</html>
