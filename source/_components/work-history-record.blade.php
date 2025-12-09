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
        &nbsp;(Total:
        <x-total-experience utcStartDate="{{ $utcStartDate }}" utcEndDate="{{ $utcEndDate }}" />
        )
    </div>
    <div>
        {{ $slot }}
    </div>
</div>
