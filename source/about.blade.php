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

  $projects = [
      [
          'name' => 'Local X.com (Formerly Twitter) Mutelist',
          'description' => 'A Chrome extension for hiding users on x.com; written in React/Typescript.',
          'links' => [
              ['title' => 'Chrome Web Store', 'url' => 'https://chromewebstore.google.com/detail/local-xcom-twitter-muteli/epgpnmkhgjnhhammgaaencaconefiokp'],
          ],
          'type' => 'published',
      ],
      [
          'name' => 'Save To Play',
          'description' => 'A browser extension to save YouTube videos to Play; written in Vue/Typescript.',
          'links' => [
              ['title' => 'GitHub Repository', 'url' => 'https://github.com/danielh-official/save-to-play'],
              ['title' => 'Chrome Web Store', 'url' => 'https://chromewebstore.google.com/detail/unofficial-save-to-play/gdkaciebpaiikdhopaddmnpeoiedmfdj'],
          ],
          'type' => 'published',
      ],
      [
          'name' => 'ynab-sdk-laravel',
          'description' => 'An SDK for using the YNAB API in Laravel applications; written in PHP.',
          'links' => [
              ['title' => 'GitHub Repository', 'url' => 'https://github.com/ynab-sdk-laravel/ynab-sdk-laravel'],
          ],
          'type' => 'published',
      ],
      [
          'name' => 'Streaks (For YNAB)',
          'description' => "An iOS app that integrates with YNAB's API to show the user his or her spending habits; written in Swift.",
          'links' => [
              ['title' => 'Website', 'url' => 'https://streaksforynab.app/'],
          ],
          'type' => 'ongoing',
      ],
      [
          'name' => 'Simple Funding Site',
          'description' => 'Written in Laravel with React as the frontend and Inertia as the glue that holds backend and frontend together.',
          'links' => [
              ['title' => 'GitHub Repository', 'url' => 'https://github.com/danielh-official/simple-funding-site'],
          ],
          'type' => 'portfolio',
      ],
      [
          'name' => 'Ruby on Rails Playground',
          'description' => 'Dabbling in Ruby on Rails.',
          'links' => [
              ['title' => 'GitHub Repository', 'url' => 'https://github.com/danielh-official/ruby-on-rails-playground'],
          ],
          'type' => 'portfolio',
      ],
  ];

  $publishedProjects = array_filter($projects, fn ($project) => $project['type'] === 'published');
  $ongoingProjects = array_filter($projects, fn ($project) => $project['type'] === 'ongoing');
  $portfolioProjects = array_filter($projects, fn ($project) => $project['type'] === 'portfolio');
@endphp

<x-breadcrumbs :items="$breadcrumbs" />

<h1 class="mb-6 text-4xl font-bold dark:text-gray-300">About Daniel Haven</h1>

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

<x-project-listing :projects="$publishedProjects" title="Published Projects" />

<x-project-listing :projects="$ongoingProjects" title="Ongoing Projects" />

<x-project-listing :projects="$portfolioProjects" title="Portfolio Projects" />
@stop
