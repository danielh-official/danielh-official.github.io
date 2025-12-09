@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('body')
    @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="mb-2">
    @endif

    <div class="flex gap-x-2">
        <div><a href="/blog">Back to Blog</a></div>
    </div>

    <h1 class="mb-2 leading-none">{{ $page->title }}</h1>

    <p class="text-gray-500 text-xlmd:mt-0 dark:text-gray-400">{{ $page->author }}  •  {{ date('F j, Y', $page->date) }}</p>

    @if ($page->categories)
        @foreach ($page->categories as $i => $category)
            <a
                href="{{ '/blog/categories/' . $category }}"
                title="View posts in {{ $category }}"
                class="inline-block px-3 pt-px mr-4 text-xs font-semibold leading-loose tracking-wide uppercase rounded-sm"
            >{{ $category }}</a>
        @endforeach
    @endif

    <div class="pb-4 mb-10 border-b border-blue-200" v-pre>
        @yield('content')
    </div>

    <nav class="flex justify-between text-sm md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>
@endsection
