@extends("_layouts.main")

@php
    $page->type = "article";
@endphp

@section("body")
    <div class="flex gap-x-2">
        <div><a href="/projects">Back to Projects</a></div>
    </div>

    <h1 class="mb-2 leading-none">{{ $page->title }}</h1>

    <div class="mb-10 border-b border-blue-200 pb-4" v-pre>
        @yield("content")
    </div>

    <nav class="flex justify-between text-sm md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a
                    href="{{ $next->getUrl() }}"
                    title="Older Post: {{ $next->title }}"
                >
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a
                    href="{{ $previous->getUrl() }}"
                    title="Newer Post: {{ $previous->title }}"
                >
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>
@endsection
