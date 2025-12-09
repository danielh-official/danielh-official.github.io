---
title: Career
description: My career history
---

@extends('_layouts.main')

@section('body')
    <h3 class="flex flex-col mb-4 text-2xl font-bold">
        <div>Professional Work History</div>
        <div class="text-gray-600 dark:text-gray-400">
            <x-total-experience utcStartDate="2019-05-01" utcEndDate="2025-06-30" />
        </div>
    </h3>

    <x-work-history-record position="Full Stack Developer" company="Solar Reviews" dedication="Full-time"
        utcStartDate="2023-02-01" utcEndDate="2025-06-30">
        <ul class="pl-6 list-disc">
            <li>Developed and maintained web applications using Laravel, Vue.js, and Tailwind CSS.</li>
            <li>Implemented RESTful APIs for data exchange between frontend and backend systems.</li>
            <li>Collaborated with cross-functional teams to define, design, and ship new features.</li>
        </ul>

        <x-slot:tags>
            <x-tag bgColor="red">Laravel</x-tag>
            <x-tag bgColor="green">Vue.js</x-tag>
            <x-tag bgColor="blue">Tailwind CSS</x-tag>
            <x-tag bgColor="purple">RESTful APIs</x-tag>
        </x-slot:tags>
    </x-work-history-record>

    <x-work-history-record position="Technology Coordinator" company="New Jersey Realtors" dedication="Full-time"
        utcStartDate="2021-03-01" utcEndDate="2022-11-30">
        <ul class="pl-6 list-disc">
            <li>Managed and maintained websites in development.</li>
            <li>Communicated with stakeholders on project requirements.</li>
            <li>Answered member queries.</li>
        </ul>

        <x-slot:tags>
            <x-tag bgColor="red">Laravel</x-tag>
            <x-tag bgColor="green">Vue.js</x-tag>
            <x-tag bgColor="orange">Web Development</x-tag>
            <x-tag bgColor="teal">Stakeholder Communication</x-tag>
            <x-tag bgColor="gray">Customer Support</x-tag>
        </x-slot:tags>
    </x-work-history-record>

    <x-work-history-record position="IT Specialist" company="ServicePlus Home Warranty" dedication="Full-time"
        utcStartDate="2019-05-01" utcEndDate="2021-03-31">
        <ul class="pl-6 list-disc">
            <li>Dealt with technical issues facing employees.</li>
            <li>Analyzed call center data and created reports.</li>
        </ul>

        <x-slot:tags>
            <x-tag bgColor="blue">Technical Support</x-tag>
            <x-tag bgColor="yellow" textColor="black">Data Analysis</x-tag>
            <x-tag bgColor="purple">Reporting</x-tag>
        </x-slot:tags>
    </x-work-history-record>

    <h3 class="mb-4 text-2xl font-bold">Education</h3>

    <div class="flex flex-col">
        <div class="text-xl">Rutgers Business School, New Brunswick, NJ</div>
        <div class="italic">Bachelor of Science in Business Analytics and Information Technology</div>
        <div>2013 - 2018</div>
    </div>
@endsection