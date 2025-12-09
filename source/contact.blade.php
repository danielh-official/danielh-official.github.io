---
title: Contact
description: Get in touch with us
---
@extends('_layouts.main')

@section('body')
<h1>Contact</h1>

<p class="mb-8">
    Static sites are unable to handle form submissions. However, there are third-party services, like Tighten’s <a href="https://fieldgoal.io" title="FieldGoal">FieldGoal</a>, which can accept the form submission, email you the result, and redirect back to a thank you page.
</p>

<form action="/contact" class="mb-12">
    <div class="flex flex-wrap mb-6 -mx-3">
        <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
            <label class="block mb-2 text-sm font-semibold" for="contact-name">
                Name
            </label>

            <input
                type="text"
                id="contact-name"
                placeholder="Jane Doe"
                name="name"
                class="block w-full px-4 py-3 mb-2 border rounded-lg shadow-sm outline-hidden"
                required
            >
        </div>

        <div class="w-full px-3 md:w-1/2">
            <label class="block mb-2 text-sm font-semibold for="contact-email">
                Email Address
            </label>

            <input
                type="email"
                id="contact-email"
                placeholder="email@domain.com"
                name="email"
                class="block w-full px-4 py-3 mb-2 border rounded-lg shadow-sm outline-hidden"
                required
            >
        </div>
    </div>

    <div class="w-full mb-12">
        <label class="block mb-2 text-sm font-semibold" for="contact-message">
            Message
        </label>

        <textarea
            id="contact-message"
            rows="4"
            name="message"
            class="block w-full px-4 py-3 mb-2 border rounded-lg shadow-sm appearance-none outline-hidden"
            placeholder="A lovely message here."
            required
        ></textarea>
    </div>

    <div class="flex justify-end w-full">
        <input
            type="submit"
            value="Submit"
            class="block px-6 py-3 text-sm font-semibold leading-snug tracking-wide uppercase bg-blue-500 rounded-lg shadow-sm cursor-pointer hover:bg-blue-600"
        >
    </div>
</form>
@stop
