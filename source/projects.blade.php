---
title: Projects
description: The list of projects I've been involved in
pagination:
    collection: projects
    perPage: 10
---

@extends('_layouts.main')

@section('body')
    <h1>Projects</h1>

    <div class="mt-6" x-data="{
        titleFilter: '',
        tagsFilter: [],
        allTags: [],
        init() {
            const params = new URLSearchParams(window.location.search)
            this.titleFilter = params.get('titleContains') || ''
            this.tagsFilter = params.getAll('tag').map(tag => tag.toLowerCase())

            const tagsSet = new Set()

            this.$el.querySelectorAll('[data-tags]').forEach(el => {
                try {
                    const tags = JSON.parse(el.dataset.tags || '[]')
                    tags.forEach(tag => tagsSet.add(tag))
                } catch (e) {}
            })

            this.allTags = Array.from(tagsSet).sort((a, b) => a.localeCompare(b))
        },
        matchesTitle(title) {
            if (!this.titleFilter) return true
            return title.toLowerCase().includes(this.titleFilter.toLowerCase())
        },
        matchesTags(tagsJson) {
            if (!this.tagsFilter.length) return true

            let tags = []

            try {
                tags = JSON.parse(tagsJson || '[]')
            } catch (e) {
                tags = []
            }

            const normalized = tags.map(tag => tag.toLowerCase())

            return this.tagsFilter.every(tag => normalized.includes(tag))
        },
        matchesProject(title, tagsJson) {
            return this.matchesTitle(title) && this.matchesTags(tagsJson)
        },
        isTagActive(tag) {
            return this.tagsFilter.includes(tag.toLowerCase())
        },
        toggleTag(tag) {
            const normalized = tag.toLowerCase()

            if (this.tagsFilter.includes(normalized)) {
                this.tagsFilter = this.tagsFilter.filter(t => t !== normalized)
            } else {
                this.tagsFilter.push(normalized)
            }

            this.updateUrl()
        },
        clearAllTags() {
            this.tagsFilter = []
            this.updateUrl()
        },
        updateUrl() {
            const params = new URLSearchParams(window.location.search)

            params.delete('tag')
            this.tagsFilter.forEach(tag => params.append('tag', tag))

            if (this.titleFilter) {
                params.set('titleContains', this.titleFilter)
            } else {
                params.delete('titleContains')
            }

            const query = params.toString()
            const newUrl = `${window.location.pathname}${query ? `?${query}` : ''}${window.location.hash}`

            window.history.replaceState({}, '', newUrl)
        },
    }">
        <div class="mb-6 flex flex-wrap gap-2" x-show="allTags.length" x-cloak>
            <button type="button"
                class="rounded-full border border-gray-300 px-3 py-1 text-sm font-medium text-gray-700 hover:bg-gray-200 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 cursor-pointer"
                x-show="tagsFilter.length" @click="clearAllTags()">
                Clear all
            </button>

            <template x-for="tag in allTags" :key="tag">
                <button type="button" class="rounded-full px-3 py-1 text-sm font-medium border cursor-pointer"
                    :class="isTagActive(tag) ?
                        'bg-blue-600 text-white border-blue-600' :
                        'bg-gray-100 text-gray-800 border-gray-300 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-700'"
                    @click="toggleTag(tag)" x-text="tag"></button>
            </template>
        </div>

        <div class="grid gap-12 md:grid-cols-2">
            @foreach ($pagination->items as $project)
                <div x-show="matchesProject($el.dataset.title, $el.dataset.tags)" x-cloak data-title="{{ $project->title }}"
                    data-tags='@json($project->tags)'>
                    @include('_components.project-preview-inline')
                </div>
            @endforeach
        </div>
    </div>

    @if ($pagination->pages->count() > 1)
        <nav class="my-8 flex text-base">
            @if ($previous = $pagination->previous)
                <a href="{{ $previous }}" title="Previous Page"
                    class="mr-3 rounded bg-gray-200 px-5 py-3 hover:bg-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    &LeftArrow;
                </a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a href="{{ $path }}" title="Go to Page {{ $pageNumber }}"
                    class="{{ $pagination->currentPage == $pageNumber ? 'text-blue-600' : 'text-blue-700' }} mr-3 rounded bg-gray-200 px-5 py-3 hover:bg-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    {{ $pageNumber }}
                </a>
            @endforeach

            @if ($next = $pagination->next)
                <a href="{{ $next }}" title="Next Page"
                    class="mr-3 rounded bg-gray-200 px-5 py-3 hover:bg-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    &RightArrow;
                </a>
            @endif
        </nav>
    @endif

@stop
