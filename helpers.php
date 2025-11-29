<?php

function getYearsAndMonthsBetween($startDate, $endDate)
{
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);
    $interval = $start->diff($end);

    return "{$interval->y} yrs {$interval->m} mos";
}

function formatUtcDateToMonthYear($utcDate)
{
    $date = new DateTime($utcDate);

    return $date->format('M Y');
}
