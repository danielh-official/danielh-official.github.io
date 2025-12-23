---
title: Projects
description: The list of projects I've been involved in
pagination:
    collection: projects
    perPage: 10
---

@extends('_layouts.main')

@section('body')
    <h1>Projects</h1>

    <div class="grid md:grid-cols-3 gap-12 mt-6">
        @foreach ($pagination->items as $project)
            @include('_components.project-preview-inline')
        @endforeach
    </div>

    @if ($pagination->pages->count() > 1)
        <nav class="my-8 flex text-base">
            @if ($previous = $pagination->previous)
                <a href="{{ $previous }}" title="Previous Page"
                    class="mr-3 rounded bg-gray-200 px-5 py-3 hover:bg-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    &LeftArrow;
                </a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a href="{{ $path }}" title="Go to Page {{ $pageNumber }}"
                    class="{{ $pagination->currentPage == $pageNumber ? 'text-blue-600' : 'text-blue-700' }} mr-3 rounded bg-gray-200 px-5 py-3 hover:bg-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    {{ $pageNumber }}
                </a>
            @endforeach

            @if ($next = $pagination->next)
                <a href="{{ $next }}" title="Next Page"
                    class="mr-3 rounded bg-gray-200 px-5 py-3 hover:bg-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    &RightArrow;
                </a>
            @endif
        </nav>
    @endif
@stop
