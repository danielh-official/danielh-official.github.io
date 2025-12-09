@extends("_layouts.main")

@section("body")
<div class="flex gap-x-2">
    <div><a href="/blog">Back to Blog</a></div>
</div>

<h1>{{ $page->title }}</h1>

<div class="mb-6 border-b border-blue-200 pb-10 text-2xl">
    @yield("content")
</div>

@foreach ($page->posts($posts) as $post)
    @include("_components.post-preview-inline")

    @if (! $loop->last)
        <hr class="mt-2 mb-6 w-full border-b" />
    @endif
@endforeach

@stop
