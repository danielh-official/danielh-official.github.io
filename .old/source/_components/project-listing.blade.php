<p>{{ $title }}:</p>

<ul class="ml-16">
  @foreach ($projects as $project)
    <li>
      {{ $project['name'] }} - {{ $project['description'] }}
      @foreach ($project['links'] as $link)
        <ul class="ml-8 list-disc">
          <li>
            <a href="{{ $link['url'] }}" target="_blank">{{ $link['title'] }}</a>
          </li>
        </ul>
      @endforeach
    </li>
  @endforeach
</ul>
