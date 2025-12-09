<div class="mb-4 flex flex-col">
  <p class="my-2 font-medium">
    {{ $post->getDate()->format('F j, Y') }}
  </p>

  <h2 class="mt-0 text-3xl">
    <a href="{{ $post->getPath() }}" title="Read more - {{ $post->title }}" class="font-extrabold">
      {{ $post->title }}
    </a>
  </h2>

  <p class="mb-4 mt-0">{!! $post->getExcerpt(200) !!}</p>

  <a
    href="{{ $post->getPath() }}"
    title="Read more - {{ $post->title }}"
    class="mb-2 font-semibold uppercase tracking-wide"
  >
    Read
  </a>
</div>
