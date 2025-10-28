<div
  x-data="{
    init() {
      window.axios('/index.json').then(response => {
        this.fuse = new window.Fuse(response.data, {
          minMatchCharLength: 6,
          keys: ['title', 'snippet', 'categories'],
        })
      })
    },
    get results() {
      return this.query ? this.fuse.search(this.query) : []
    },
    get isQuerying() {
      return Boolean(this.query)
    },
    fuse: null,
    searching: false,
    query: '',
    showInput() {
      this.searching = true
      this.$nextTick(() => {
        this.$refs.search.focus()
      })
    },
    reset() {
      this.query = ''
      this.searching = false
    },
  }"
  x-cloak
  class="flex flex-1 items-center justify-end px-4 text-right"
>
  <div
    class="absolute left-0 top-0 z-10 mt-7 w-full justify-end px-4 md:relative md:mt-0 md:px-0"
    :class="{'hidden md:flex': ! searching}"
  >
    <label for="search" class="hidden">Search</label>

    <input
      id="search"
      x-model="query"
      x-ref="search"
      class="url('/assets/img/magnifying-glass.svg')] relative block h-10 w-full cursor-pointer border border-gray-500 bg-no-repeat px-4 pb-0 pt-px indent-[1.2em] text-gray-700 outline-none transition-all duration-200 ease-out focus:border-blue-400 lg:w-1/2 lg:focus:w-3/4"
      :class="{ 'rounded-b-none rounded-t-lg': query, 'rounded-3xl': !query }"
      autocomplete="off"
      name="search"
      placeholder="Search"
      type="text"
      @keyup.esc="reset"
      @blur="reset"
    />

    <button
      x-show="query || searching"
      class="font-400 absolute right-0 top-0 pr-7 text-3xl leading-snug text-blue-500 hover:text-blue-600 focus:outline-none md:pr-3"
      @click="reset"
    >
      &times;
    </button>

    <div
      x-show="isQuerying"
      x-cloak
      x-transition:enter="transition duration-300 ease-out"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition-none"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="absolute left-0 right-0 mb-4 w-full bg-white text-left text-gray-500 md:inset-auto md:mt-10 lg:w-3/4"
    >
      <div class="mx-4 flex flex-col rounded-b-lg border border-b-0 border-t-0 border-blue-400 shadow-search md:mx-0">
        <template x-for="(result, index) in results">
          <a
            class="cursor-pointer border-b border-blue-400 p-4 text-xl hover:bg-blue-100"
            :class="{ 'rounded-b-lg': (index === results.length - 1) }"
            :href="result.item.link"
            :title="result.item.title"
            :key="result.link"
            @mousedown.prevent
          >
            <span x-html="result.item.title"></span>

            <span class="my-1 block text-sm font-normal text-gray-700" x-html="result.item.snippet"></span>
          </a>
        </template>
        <div
          x-show="! results.length"
          class="w-full cursor-pointer rounded-b-lg border-b border-blue-400 p-4 shadow hover:bg-blue-100"
        >
          <p class="my-0">
            No results for
            <strong x-html="query"></strong>
          </p>
        </div>
      </div>
    </div>
  </div>

  <button
    title="Start searching"
    type="button"
    class="flex h-10 items-center justify-center rounded-full border border-gray-500 px-3 hover:bg-blue-100 focus:outline-none md:hidden"
    @click.prevent="showInput"
  >
    <img src="/assets/img/magnifying-glass.svg" alt="search icon" class="h-4 w-4 max-w-none" />
  </button>
</div>
