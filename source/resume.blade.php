---
title: Resume
description: My resume
---

@extends('_layouts.main')

@section('body')
  @php
    $breadcrumbs = [
        ['title' => 'Home', 'url' => '/', 'active' => false],
        ['title' => 'Resume', 'url' => '/resume', 'active' => true],
    ];
  @endphp

  <x-breadcrumbs :items="$breadcrumbs" />

  <h3 class="mb-4 text-2xl font-bold">
    Professional Work History (Total: {{ getYearsAndMonthsBetween('2019-05-01', '2025-06-30') }})
  </h3>

  <x-resume-work-history-record
    position="Full Stack Developer"
    company="Solar Reviews"
    dedication="Full-time"
    utcStartDate="2023-02-01"
    utcEndDate="2025-06-30"
  >
    <ul class="list-disc pl-6">
      <li>Developed and maintained web applications using Laravel, Vue.js, and Tailwind CSS.</li>
      <li>Implemented RESTful APIs for data exchange between frontend and backend systems.</li>
      <li>Collaborated with cross-functional teams to define, design, and ship new features.</li>
    </ul>
  </x-resume-work-history-record>

  <x-resume-work-history-record
    position="Technology Coordinator"
    company="New Jersey Realtors"
    dedication="Full-time"
    utcStartDate="2021-03-01"
    utcEndDate="2022-11-30"
  >
    <ul class="list-disc pl-6">
      <li>Managed and maintained websites in development.</li>
      <li>Communicated with stakeholders on project requirements.</li>
      <li>Answered member queries.</li>
    </ul>
  </x-resume-work-history-record>

  <x-resume-work-history-record
    position="IT Specialist"
    company="ServicePlus Home Warranty"
    dedication="Full-time"
    utcStartDate="2019-05-01"
    utcEndDate="2021-03-31"
  >
    <ul class="list-disc pl-6">
      <li>Dealt with technical issues facing employees.</li>
      <li>Analyzed call center data and created reports.</li>
    </ul>
  </x-resume-work-history-record>

  <h3 class="mb-4 text-2xl font-bold">Education</h3>

  <div class="flex flex-col">
    <div class="text-xl">Rutgers Business School, New Brunswick, NJ</div>
    <div class="italic">Bachelor of Science in Business Analytics and Information Technology</div>
    <div>2013 - 2018</div>
  </div>
@endsection
