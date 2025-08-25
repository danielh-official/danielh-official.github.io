---
title: About
description: Learn more about Daniel Haven, a software developer specializing in building high-quality, fully-tested web, desktop, and mobile applications. Expert in modern web development technologies.
---

@extends('_layouts.main')
@section('body')
@php
  $breadcrumbs = [
      ['title' => 'Home', 'url' => '/', 'active' => false],
      ['title' => 'About', 'url' => '/about', 'active' => true],
  ];
@endphp

<x-breadcrumbs :items="$breadcrumbs" />

<h1 class="mb-6 text-4xl font-bold">About Daniel Haven</h1>

<hr class="my-6 border-b" />

<img
  src="/assets/img/about.png"
  alt="About image"
  class="mx-auto my-6 flex h-64 w-64 rounded-full bg-contain md:float-right md:ml-10"
/>

<p class="mb-6">
  Daniel Haven is a software developer interested in building high-quality, fully-tested web, desktop, and mobile
  applications.
</p>

<p>Projects:</p>

<ul class="ml-16">
  <li>
    <a href="https://github.com/danielh-official/SaveToPlay" target="_blank">SaveToPlay</a>
    - A browser extension to save YouTube videos to
    <a href="https://apps.apple.com/us/app/play-save-videos-watch-later/id1596506190" target="_blank">Play</a>
  </li>
  <li>
    <a href="https://github.com/ynab-sdk-laravel/ynab-sdk-laravel" target="_blank">ynab-sdk-laravel</a>
    - An SDK for using the YNAB API in Laravel applications
  </li>
</ul>

<p>Connect with Daniel on these following sites:</p>

<ul class="ml-16">
  <li><a href="https://github.com/danielh-official" target="_blank">GitHub</a></li>
  <li><a href="https://linkedin.com/in/danielh0" target="_blank">LinkedIn</a></li>
  <li><a href="https://pinkary.com/@danielhaven" target="_blank">Pinkary</a></li>
</ul>
@stop
