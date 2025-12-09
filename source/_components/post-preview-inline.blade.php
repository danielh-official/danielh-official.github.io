<div class="mb-4 flex flex-col">
    <p class="my-2 font-medium text-gray-700 dark:text-gray-400">
        {{ $post->getDate()->format("F j, Y") }}
    </p>

    <h2 class="mt-0 text-3xl">
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="font-extrabold"
        >
            {{ $post->title }}
        </a>
    </h2>

    <p class="mt-0 mb-4">{!! $post->getExcerpt(200) !!}</p>

    <div class="mb-4 flex gap-x-2 self-end">
        @if ($post->categories)
            @foreach ($post->categories as $i => $category)
                <a
                    href="{{ "/blog/categories/" . $category }}"
                    title="View posts in {{ $category }}"
                    class="mr-4 inline-block rounded-sm px-3 pt-px text-xs leading-loose font-semibold tracking-wide uppercase"
                >
                    {{ $category }}
                </a>
            @endforeach
        @endif
    </div>

    <a
        href="{{ $post->getUrl() }}"
        title="Read more - {{ $post->title }}"
        class="mb-2 font-semibold tracking-wide uppercase"
    >
        Read
    </a>
</div>
