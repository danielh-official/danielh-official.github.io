<div class="mb-4 flex flex-col gap-y-4">
    @if ($project->getProjectCoverImage())
        <div>
            <img src="{{ $project->getProjectCoverImage() }}" alt="{{ $project->title }} cover image"
                class="mt-4 rounded-lg border border-gray-200 shadow-md dark:border-gray-700 transition ease-in duration-300 transform hover:scale-110" />
        </div>
    @endif
    @if ($project->getStartDate() || $project->getEndDate())
        <p class="my-2 font-medium text-gray-700 dark:text-gray-400"></p>
        {{ $project->getStartDate()?->format('F j, Y') ?? 'Unspecified Start Date' }} -
        {{ $project->getEndDate()?->format('F j, Y') ?? 'Unspecified End Date' }}
        </p>
    @endif
    <div>
        <h2 class="mt-0 text-3xl">
            {{ $project->title }}
        </h2>

        <p class="mt-0 mb-4">{!! $project->getExcerpt(200) !!}</p>

        <div class="flex gap-x-5">
            @if ($project->show_learn_more_link)
                <a href="{{ $project->getUrl() }}" title="Read more - {{ $project->title }}"
                    class="mb-2 font-semibold tracking-wide uppercase">
                    Learn More
                </a>
            @endif

            @if ($project->show_learn_more_link && $project->getWebsiteLink())
                |
            @endif

            @if ($project->getWebsiteLink())
                <a href="{{ $project->getWebsiteLink() }}" title="Visit {{ $project->title }} Website" target="_blank"
                    class="mb-2 font-semibold tracking-wide uppercase">
                    Check It Out
                </a>
            @endif

            @if ($project->getWebsiteLink() && $project->getProjectRepositoryLink())
                |
            @endif

            @if ($project->getProjectRepositoryLink())
                <a href="{{ $project->getProjectRepositoryLink() }}" title="View {{ $project->title }} Source Code"
                    target="_blank" class="mb-2 font-semibold tracking-wide uppercase">
                    View Source
                </a>
            @endif
        </div>

        <div>
            @foreach ($project->technologies as $technology)
                <span
                    class="inline-block bg-gray-200 px-3 py-1 mt-2 mr-2 text-md font-semibold text-gray-700 rounded-full dark:bg-gray-700 dark:text-gray-300">
                    #{{ $technology }}
                </span>
            @endforeach
        </div>
    </div>
</div>
