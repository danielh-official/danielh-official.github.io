@extends('_layouts.main')

@section('body')
<div class="text-center text-5xl">Recent Blog Posts</div>

<hr />

@foreach ($posts->where('featured', true) as $featuredPost)
  <div class="mb-6 w-full">
    @if ($featuredPost->cover_image)
      <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }} cover image" class="mb-6" />
    @endif

    <p class="my-2 font-medium text-gray-700">
      {{ $featuredPost->getDate()->format('F j, Y') }}
    </p>

    <h2 class="mt-0 text-3xl">
      <a href="{{ $featuredPost->getPath() }}" title="Read {{ $featuredPost->title }}" class="font-extrabold">
        {{ $featuredPost->title }}
      </a>
    </h2>

    <p class="mb-4 mt-0">{!! $featuredPost->getExcerpt() !!}</p>

    <a
      href="{{ $featuredPost->getPath() }}"
      title="Read - {{ $featuredPost->title }}"
      class="mb-4 uppercase tracking-wide"
    >
      Read
    </a>
  </div>

  @if (! $loop->last)
    <hr class="my-6 border-b" />
  @endif
@endforeach

{{-- @include('_components.newsletter-signup') --}}

@foreach ($posts->where('featured', false)->take(6)->chunk(2) as $row)
  <div class="flex flex-col md:-mx-6 md:flex-row">
    @foreach ($row as $post)
      <div class="w-full md:mx-6 md:w-1/2">
        @include('_components.post-preview-inline')
      </div>

      @if (! $loop->last)
        <hr class="mb-6 mt-2 block w-full border-b md:hidden" />
      @endif
    @endforeach
  </div>

  @if (! $loop->last)
    <hr class="mb-6 mt-2 w-full border-b" />
  @endif
@endforeach

@stop
