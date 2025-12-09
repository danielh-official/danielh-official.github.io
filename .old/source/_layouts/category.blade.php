@extends('_layouts.main')

@section('body')
@php
  $breadcrumbs = [
      ['title' => 'Home', 'url' => '/', 'active' => false],
      ['title' => 'Blog', 'url' => '/blog', 'active' => false],
      ['title' => $page->title, 'url' => $page->getUrl(), 'active' => true],
  ];
@endphp

<x-breadcrumbs :items="$breadcrumbs" />

<h1 class="mb-6 text-4xl font-bold dark:text-gray-300">{{ $page->title }}</h1>

<div class="mb-6 border-b border-blue-200 pb-10 text-2xl">
  @yield('content')
</div>

@foreach ($page->posts($posts) as $post)
  @include('_components.post-preview-inline')

  @if (! $loop->last)
    <hr class="mb-6 mt-2 w-full border-b" />
  @endif
@endforeach

@include('_components.newsletter-signup')
@stop
