---
title: Blog
description: The list of blog posts for the site
pagination:
  collection: posts
  perPage: 4
---

@extends('_layouts.main')

@section('body')
@php
  $breadcrumbs = [
      ['title' => 'Home', 'url' => '/', 'active' => false],
      ['title' => 'Blog', 'url' => '/blog', 'active' => true],
  ];
@endphp

<x-breadcrumbs :items="$breadcrumbs" />

<h1 class="mb-6 text-4xl font-bold dark:text-gray-300">Blog</h1>

<a target="_blank" href="/blog/feed.atom" class="mb-6 inline-block text-blue-600 hover:underline">
  Subscribe to RSS Feed
</a>

<div class="grid gap-8 md:grid-cols-2">
  @foreach ($pagination->items as $post)
    @include('_components.post-preview-inline')
  @endforeach
</div>

@if ($pagination->pages->count() > 1)
  <nav class="my-8 flex">
    @if ($previous = $pagination->previous)
      <a
        href="{{ $previous }}"
        title="Previous Page"
        class="mr-3 rounded px-5 py-3 hover:bg-gray-400 dark:bg-gray-800"
      >
        &LeftArrow;
      </a>
    @endif

    @foreach ($pagination->pages as $pageNumber => $path)
      <a
        href="{{ $path }}"
        title="Go to Page {{ $pageNumber }}"
        class="{{ $pagination->currentPage == $pageNumber ? 'text-blue-600' : 'text-blue-700' }} mr-3 rounded bg-gray-200 px-5 py-3 hover:bg-gray-400 dark:bg-gray-800"
      >
        {{ $pageNumber }}
      </a>
    @endforeach

    @if ($next = $pagination->next)
      <a
        href="{{ $next }}"
        title="Next Page"
        class="mr-3 rounded bg-gray-200 px-5 py-3 hover:bg-gray-400 dark:bg-gray-800"
      >
        &RightArrow;
      </a>
    @endif
  </nav>
@endif

@stop
