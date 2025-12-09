<div x-data="{
        init(){
            fetch('/index.json')
                .then(response => response.json())
                .then(data => {
                    this.fuse = new window.Fuse(data, {
                        minMatchCharLength: 6,
                        keys: ['title', 'snippet', 'categories'],
                    });
                });
        },
        get results() {
            return this.query ? this.fuse.search(this.query) : [];
        },
        get isQuerying() {
            return Boolean( this.query );
        },
        fuse: null,
        searching: false,
        query: '',
        showInput() {
            this.searching = true;
            this.$nextTick(() => {
                this.$refs.search.focus();
            })
        },
        reset() {
            this.query = '';
            this.searching = false;
        },
    }"
    x-cloak
    class="flex items-center justify-end flex-1 px-4 text-right"
>
    <div
        class="absolute top-0 left-0 z-10 justify-end w-full px-4 md:relative mt-7 md:mt-0 md:px-0"
        :class="{'hidden md:flex': ! searching}"
    >
        <label for="search" class="hidden">Search</label>

        <input
            id="search"
            x-model="query"
            x-ref="search"
            class="relative block h-10 w-full lg:w-1/2 lg:focus:w-3/4 bg-gray-100 dark:bg-gray-800 dark:text-gray-100 border border-gray-500 focus:border-blue-400 outline-none cursor-pointer text-gray-700 px-4 pb-0 pt-px transition-all duration-200 ease-out bg-no-repeat bg-[0.8rem] indent-[1.2em]"
            :class="{ 'rounded-b-none rounded-t-lg': query, 'rounded-3xl': !query }"
            style="background-image: url('/assets/img/magnifying-glass.svg')"
            autocomplete="off"
            name="search"
            placeholder="Search"
            type="text"
            @keyup.esc="reset"
            @blur="reset"
        >

        <button
            x-show="query || searching"
            class="absolute top-0 right-0 text-3xl leading-snug text-blue-500 font-400 hover:text-blue-600 focus:outline-none pr-7 md:pr-3"
            @click="reset"
        >&times;</button>

        <div
            x-show="isQuerying"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-none"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute left-0 right-0 w-full mb-4 text-left md:inset-auto lg:w-3/4 md:mt-10"
        >
            <div class="flex flex-col mx-4 bg-white border border-t-0 border-b-0 border-blue-400 rounded-b-lg dark:bg-gray-800 shadow-search md:mx-0">
                <template x-for="(result, index) in results">
                    <a
                        class="p-4 text-xl border-b border-blue-400 cursor-pointer hover:bg-blue-100 dark:hover:bg-gray-900"
                        :class="{ 'rounded-b-lg': (index === results.length - 1) }"
                        :href="result.item.link"
                        :title="result.item.title"
                        :key="result.link"
                        @mousedown.prevent
                    >
                        <span x-html="result.item.title"></span>

                        <span class="block my-1 text-sm font-normal text-gray-700 dark:text-gray-200" x-html="result.item.snippet"></span>
                    </a>
                </template>
                <div
                    x-show="! results.length"
                    class="w-full p-4 border-b border-blue-400 rounded-b-lg shadow cursor-pointer hover:bg-blue-100"
                >
                    <p class="my-0">No results for <strong x-html="query"></strong></p>
                </div>
            </div>
        </div>
    </div>

    <button
        title="Start searching"
        type="button"
        class="flex items-center justify-center h-10 px-3 border border-gray-500 rounded-full md:hidden hover:bg-blue-100 focus:outline-none"
        @click.prevent="showInput"
    >
        <img src="/assets/img/magnifying-glass.svg" alt="search icon" class="w-4 h-4 max-w-none">
    </button>
</div>
