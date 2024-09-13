@extends('_layouts.main')

@section('body')

    <img src="/assets/img/about.png"
        alt="About image"
        class="flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">

    <p class="mb-6">Daniel Haven is a software developer who uses Laravel extensively to build high-quality, fully-tested apps.</p>

    <p class="mb-6">Tech stack includes:</p>

    <ul class="ml-16">
        <li><a href="https://laravel.com" target="_blank">Laravel</a></li>
        <li><a href="https://pestphp.com" target="_blank">PestPHP</a></li>
        <li><a href="https://tailwindcss.com" target="_blank">Tailwind</a></li>
        <li><a href="https://laravel-livewire.com" target="_blank">Livewire</a></li>
        <li><a href="https://inertiajs.com" target="_blank">Vue x Inertia</a></li>
        <li>MySQL</li>
        <li>Redis</li>
        <li>And more...</li>
    </ul>

    <p>Connect with Daniel on these following sites:</p>

    <ul class="ml-16">
        <li><a href="https://github.com/danielh-official" target="_blank">GitHub</a></li>
        <li><a href="https://linkedin.com/in/danielh0" target="_blank">LinkedIn</a></li>
        <li><a href="https://pinkary.com/@danielhaven" target="_blank">Pinkary</a></li>
    </ul>

    <hr />

    <div class="text-5xl text-center">Recent Blog Posts</div>

    <hr />

    @foreach ($posts->where('featured', true) as $featuredPost)
        <div class="w-full mb-6">
            @if ($featuredPost->cover_image)
                <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }} cover image" class="mb-6">
            @endif

            <p class="text-gray-700 font-medium my-2">
                {{ $featuredPost->getDate()->format('F j, Y') }}
            </p>

            <h2 class="text-3xl mt-0">
                <a href="{{ $featuredPost->getUrl() }}" title="Read {{ $featuredPost->title }}" class="text-gray-900 font-extrabold">
                    {{ $featuredPost->title }}
                </a>
            </h2>

            <p class="mt-0 mb-4">{!! $featuredPost->getExcerpt() !!}</p>

            <a href="{{ $featuredPost->getUrl() }}" title="Read - {{ $featuredPost->title }}" class="uppercase tracking-wide mb-4">
                Read
            </a>
        </div>

        @if (! $loop->last)
            <hr class="border-b my-6">
        @endif
    @endforeach

    {{-- @include('_components.newsletter-signup') --}}

    @foreach ($posts->where('featured', false)->take(6)->chunk(2) as $row)
        <div class="flex flex-col md:flex-row md:-mx-6">
            @foreach ($row as $post)
                <div class="w-full md:w-1/2 md:mx-6">
                    @include('_components.post-preview-inline')
                </div>

                @if (! $loop->last)
                    <hr class="block md:hidden w-full border-b mt-2 mb-6">
                @endif
            @endforeach
        </div>

        @if (! $loop->last)
            <hr class="w-full border-b mt-2 mb-6">
        @endif
    @endforeach
@stop
