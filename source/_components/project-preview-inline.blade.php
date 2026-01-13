<div class="mb-4 flex flex-col gap-y-4">
    @if ($project->getProjectCoverImage())
        <div class="h-50 overflow-hidden">
            <img
                src="{{ $project->getProjectCoverImage() }}"
                alt="{{ $project->title }} cover image"
                class="mt-4 transform rounded-lg border border-gray-200 shadow-md transition duration-300 ease-in hover:scale-110 dark:border-gray-700"
            />
        </div>
    @endif

    @if ($project->getStartDate() || $project->getEndDate())
        <p class="my-2 font-medium text-gray-700 dark:text-gray-400"></p>
        {{ $project->getStartDate()?->format("F j, Y") ?? "Unspecified Start Date" }}
        -
        {{ $project->getEndDate()?->format("F j, Y") ?? "Unspecified End Date" }}
    @endif

    <div>
        <h2 class="mt-0 text-3xl">
            {{ $project->title }}
        </h2>

        <p class="mt-0 mb-4">{!! $project->getExcerpt(200) !!}</p>

        <div class="flex gap-x-5">
            @if ($project->show_learn_more_link)
                <a
                    href="{{ $project->getUrl() }}"
                    title="Read more - {{ $project->title }}"
                    class="mb-2 font-semibold tracking-wide uppercase"
                >
                    Learn More
                </a>
            @endif

            @if ($project->show_learn_more_link && $project->getWebsiteLink())
                |
            @endif

            @if ($project->getWebsiteLink())
                <a
                    href="{{ $project->getWebsiteLink() }}"
                    title="Visit {{ $project->title }} Website"
                    target="_blank"
                    class="mb-2 font-semibold tracking-wide uppercase"
                >
                    Check It Out
                </a>
            @endif

            @if ($project->getWebsiteLink() && $project->getProjectRepositoryLink())
                |
            @endif

            @if ($project->getProjectRepositoryLink())
                <a
                    href="{{ $project->getProjectRepositoryLink() }}"
                    title="View {{ $project->title }} Source Code"
                    target="_blank"
                    class="mb-2 font-semibold tracking-wide uppercase"
                >
                    View Source
                </a>
            @endif
        </div>

        <div class="my-8 text-end">
            <a
                class="github-button"
                href="{{ $project->getProjectRepositoryLink() }}"
                data-icon="octicon-star"
                data-size="large"
                data-show-count="true"
                aria-label="Star {{ $project->title }} on GitHub"
            >
                Star
            </a>
        </div>

        <div>
            @foreach ($project->tags as $tag)
                <span
                    class="text-md mt-2 mr-2 inline-block rounded-full bg-gray-200 px-3 py-1 font-semibold text-gray-700 dark:bg-gray-700 dark:text-gray-300"
                >
                    #{{ $tag }}
                </span>
            @endforeach
        </div>
    </div>
</div>
