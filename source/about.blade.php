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

<p>Connect with Daniel on these following sites:</p>

<ul class="ml-16">
  <li><a href="https://github.com/danielh-official" target="_blank">GitHub</a></li>
  <li><a href="https://linkedin.com/in/danielh0" target="_blank">LinkedIn</a></li>
  <li><a href="https://pinkary.com/@danielhaven" target="_blank">Pinkary</a></li>
</ul>

<p>Published Projects:</p>

<ul class="ml-16">
  <li>
    Local X.com (Twitter) Mutelist - Chrome extension for hiding users on x.com; written in React/Typescript (<a href="https://chromewebstore.google.com/detail/local-xcom-twitter-muteli/epgpnmkhgjnhhammgaaencaconefiokp" target="_blank">Chrome Web Store Link</a>)
  </li>
  <li>Save To Play - A browser extension to save YouTube videos to <a href="https://apps.apple.com/us/app/play-save-videos-watch-later/id1596506190" target="_blank">Play</a>; written in Vue/Typescript (<a href="https://github.com/danielh-official/save-to-play" target="_blank">GitHub Repository</a>, <a href="https://chromewebstore.google.com/detail/unofficial-save-to-play/gdkaciebpaiikdhopaddmnpeoiedmfdj" target="_blank">Chrome Web Store</a>)
  </li>
  <li>
    ynab-sdk-laravel - An SDK for using the YNAB API in Laravel applications; written in PHP (<a href="https://github.com/ynab-sdk-laravel/ynab-sdk-laravel" target="_blank">GitHub Repository</a>)
  </li>
</ul>

<p>Ongoing Projects:</p>

<ul class="ml-16">
  <li>
    Streaks (For YNAB) - An iOS app that integrates with YNAB's API to show the user his or her spending habits; written in Swift (<a href="https://streaksforynab.app/" target="_blank">Website</a>)
  </li>
</ul>

<p>Portfolio Projects:</p>

<ul class="ml-16">
  <li>
    Simple Funding Site - Written in Laravel with React as the frontend and Inertia as the glue that holds backend and frontend together (<a href="https://github.com/danielh-official/simple-funding-site" target="_blank">GitHub Repository</a>)
  </li>
  <li>
    Ruby on Rails Playground - Dabbling in Ruby on Rails (<a href="https://github.com/danielh-official/ruby-on-rails-playground" target="_blank">GitHub Repository</a>)
  </li>
</ul>
@stop
