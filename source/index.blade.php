@extends("_layouts.main")

@php
    function generateGitHubReadMeMostUsedLanguagesLink(): string
    {
        $query = [
            "username" => "danielh-official",
            "layout" => "pie",
            "theme" => "transparent",
            "custom_title" => "Current most used languages",
        ];

        $queryParams = http_build_query($query);

        return "https://danielh-official-github-readme-stat.vercel.app/api/top-langs/?$queryParams";
    }
@endphp

@section("body")
<div>
    <img
        src="/assets/img/about.png"
        alt="My photo"
        class="mx-auto flex aspect-square h-64 w-64 rounded-3xl bg-contain shadow-sm shadow-gray-900/50 md:float-right md:ml-10"
    />
</div>
<div>
    <div class="text-center text-5xl">Daniel Haven</div>
    <p class="mt-4 text-center text-xl">
        Software Engineer and
        <span class="line-through">Coffee</span>
        Tea Enthusiast
    </p>
    <p class="mt-16 text-4xl">whoami</p>
    <p>
        I'm an active open-source contributor and go by
        <a href="https://github.com/danielh-official" target="_blank">
            danielh-official
        </a>
        on GitHub.
    </p>
    <p>
        My passion lies in solving a variety of problems, mainly within web and
        app development.
    </p>
</div>
<div>
    <p>
        For full stack web development, my home is @
        <a href="https://laravel.com/" target="_blank" class="text-red-500">
            LaravelPHP
        </a>
        , with a variety of frontends (e.g., vanilla, vue, react, svelte, etc.)
        if Livewire is not on the table. I am also open to exploring other
        backend, full-stack, etc. technologies as needed (e.g., ruby on rails,
        asp.net, etc.).
    </p>
</div>
<div class="mt-6 ml-6">
    <img
        src="{{ generateGitHubReadMeMostUsedLanguagesLink() }}"
        alt="github stats - most used languages"
    />
</div>
@stop
