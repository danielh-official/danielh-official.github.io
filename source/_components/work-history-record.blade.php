<div>
    <div class="text-xl">{{ $position }}</div>
    <div class="italic">{{ $company }} - {{ $dedication }}</div>
    <div>
        <span x-data="{
            formatDate: function(dateStr) {
                const options = { year: 'numeric', month: 'short' };
                const date = new Date(dateStr);
                return date.toLocaleDateString(undefined, options);
            }
        }" x-text="formatDate('{{ $utcStartDate }}')"></span>
        -
        <span x-data="{
            formatDate: function(dateStr) {
                const options = { year: 'numeric', month: 'short' };
                const date = new Date(dateStr);
                return date.toLocaleDateString(undefined, options);
            }
        }" x-text="formatDate('{{ $utcEndDate }}')"></span>
        -
        <span class="text-gray-600 dark:text-gray-400">
            <x-total-experience utcStartDate="{{ $utcStartDate }}" utcEndDate="{{ $utcEndDate }}" />
        </span>
    </div>
    <div>
        {{ $slot }}
    </div>
    @isset($tags)
        <div class="my-2">
            {{ $tags }}
        </div>
    @endisset
    <hr />
</div>
