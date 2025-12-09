<div
    class="mt-2 inline-block rounded-full px-2 py-1 text-sm font-semibold"
    style="
        background-color: {{ $bgColor ?? "blue" }};
        color: {{ $textColor ?? "white" }};
    "
>
    {{ $slot }}
</div>
