<div>
  <div class="text-xl">{{ $position }}</div>
  <div class="italic">{{ $company }} - {{ $dedication }}</div>
  <div>
    {{ formatUtcDateToMonthYear($utcStartDate) }} - {{ formatUtcDateToMonthYear($utcEndDate) }} -
    {{ getYearsAndMonthsBetween($utcStartDate, $utcEndDate) }}
  </div>
  <div>
    {{ $slot }}
  </div>
</div>
