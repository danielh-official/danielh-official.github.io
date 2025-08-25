<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="{{ $page->description ?? $page->siteDescription }}" />

    <meta property="og:title" content="{{ $page->title ? $page->title.' | ' : '' }}{{ $page->siteName }}" />
    <meta property="og:type" content="{{ $page->type ?? 'website' }}" />
    <meta property="og:url" content="/{{ $page->getPath() }}" />
    <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@danielh_official" />
    <meta name="twitter:title" content="{{ $page->title ? $page->title.' | ' : '' }}{{ $page->siteName }}" />
    <meta name="twitter:description" content="{{ $page->description ?? $page->siteDescription }}" />
    <meta name="twitter:image" content="{{ $page->cover_image ?? '/assets/img/about.png' }}" />

    <link rel="canonical" href="/{{ $page->getPath() }}" />

    <title>{{ $page->title ? $page->title.' | ' : '' }}{{ $page->siteName }}</title>

    <link rel="home" href="{{ $page->baseUrl }}" />
    <link rel="icon" href="/favicon.ico" />
    <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed" />

    @if ($page->production)
      <!-- Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
          dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
      </script>
    @endif

    <link
      href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}" />
  </head>

  <body class="flex min-h-screen flex-col justify-between bg-gray-100 font-sans leading-normal text-gray-800">
    <header class="flex h-24 items-center border-b bg-white py-4 shadow" role="banner">
      <div class="container mx-auto flex max-w-8xl items-center px-4 lg:px-8">
        <div class="flex items-center">
          <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
            {{-- <img class="h-8 md:h-10 mr-3" src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" /> --}}

            <div class="my-0 text-lg font-semibold text-blue-800 hover:text-blue-600 md:text-2xl">
              {{ $page->siteName }}
            </div>
          </a>
        </div>

        <div id="vue-search" class="flex flex-1 items-center justify-end">
          @include('_components.search')

          @include('_nav.menu')

          @include('_nav.menu-toggle')
        </div>
      </div>
    </header>

    @include('_nav.menu-responsive')

    <main role="main" class="container mx-auto w-full max-w-4xl flex-auto px-6 py-16">
      @yield('body')
    </main>

    <footer class="mt-12 bg-white py-4 text-center text-sm" role="contentinfo">
      <ul class="flex list-none flex-col justify-center md:flex-row">
        <li class="md:mr-2">
          {{-- &copy; <a href="https://tighten.co" title="Tighten website">Tighten</a> {{ date('Y') }}. --}}
          &copy;
          <a href="https://github.com/danielh-official" title="Daniel Haven's GitHub profile">Daniel Haven</a>
          {{ date('Y') }}.
        </li>

        <li>
          Built with
          <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
          and
          <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>
          .
        </li>
      </ul>
    </footer>

    <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Daniel Haven",
        "url": "https://danielh-official.github.io",
        "image": "https://danielh-official.github.io/assets/img/about.png",
        "description": "Laravel/PHP Developer and Occasional Blogger",
        "sameAs": [
          "https://github.com/danielh-official",
          "https://linkedin.com/in/danielh0",
          "https://pinkary.com/@danielhaven"
        ],
        "jobTitle": "Software Developer",
        "knowsAbout": ["Laravel", "PHP", "Vue.js", "MySQL", "Redis", "Tailwind CSS"]
      }
    </script>

    @stack('scripts')
  </body>
</html>
