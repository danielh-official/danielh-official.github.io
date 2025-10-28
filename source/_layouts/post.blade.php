@extends('_layouts.main')

@php
  $page->type = 'article';
@endphp

@section('body')
  @php
    $breadcrumbs = [
        ['title' => 'Home', 'url' => '/', 'active' => false],
        ['title' => 'Blog', 'url' => '/blog', 'active' => false],
        ['title' => $page->title, 'url' => $page->getUrl(), 'active' => true],
    ];
  @endphp

  <x-breadcrumbs :items="$breadcrumbs" />

  @if ($page->cover_image)
    <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="mb-2" />
  @endif

  <h1 class="mb-2 leading-none dark:text-gray-300">{{ $page->title }}</h1>

  <p class="text-xl text-gray-700 md:mt-0 dark:text-gray-300">
    {{ $page->author }} • {{ date('F j, Y', $page->date) }}
    @php
      $wordCount = str_word_count(strip_tags($page->getContent()));
      $readingTime = ceil($wordCount / 200); // Average reading speed: 200 words per minute
    @endphp

    • {{ $readingTime }} min read
  </p>

  @if ($page->categories)
    @foreach ($page->categories as $i => $category)
      <a
        href="{{ '/blog/categories/'.$category }}"
        title="View posts in {{ $category }}"
        class="mr-4 inline-block rounded bg-gray-300 px-3 pt-px text-xs font-semibold uppercase leading-loose tracking-wide hover:bg-blue-200"
      >
        {{ $category }}
      </a>
    @endforeach
  @endif

  <div class="mb-10 border-b border-blue-200 pb-4" v-pre>
    @yield('content')
  </div>

  @include('_components.social-sharing')

  <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "{{ $page->title }}",
        "author": {
            "@type": "Person",
            "name": "{{ $page->author }}",
            "url": "https://danielh-official.github.io"
        },
        "datePublished": "{{ date('Y-m-d', $page->date) }}",
        "dateModified": "{{ date('Y-m-d', $page->date) }}",
        "publisher": {
            "@type": "Person",
            "name": "Daniel Haven",
            "url": "https://danielh-official.github.io"
        },
        "description": "{{ $page->description ?? $page->getExcerpt() }}",
        "url": "{{ $page->getUrl() }}",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ $page->getUrl() }}"
        }
        @if($page->cover_image)
        ,"image": "{{ $page->cover_image }}"
        @endif
    }
  </script>

  <nav class="flex justify-between text-sm md:text-base">
    <div>
      @if ($next = $page->getNext())
        <a href="{{ $next->getPath() }}" title="Older Post: {{ $next->title }}">&LeftArrow; {{ $next->title }}</a>
      @endif
    </div>

    <div>
      @if ($previous = $page->getPrevious())
        <a href="{{ $previous->getPath() }}" title="Newer Post: {{ $previous->title }}">
          {{ $previous->title }} &RightArrow;
        </a>
      @endif
    </div>
  </nav>

  @if ((bool) $page->giscusCommentsDiscussionNumber)
    <div class="mt-10">
      <script
        src="https://giscus.app/client.js"
        data-repo="danielh-official/danielh-official.github.io"
        data-repo-id="R_kgDOMw_n_w"
        data-mapping="number"
        data-term="{{ $page->giscusCommentsDiscussionNumber }}"
        data-reactions-enabled="1"
        data-emit-metadata="0"
        data-input-position="top"
        data-theme="preferred_color_scheme"
        data-lang="en"
        data-loading="lazy"
        crossorigin="anonymous"
        async
      ></script>
    </div>
  @endif
@endsection
