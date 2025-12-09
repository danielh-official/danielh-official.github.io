---
extends: _layouts.post
section: content
title: There Is No Backend and Frontend Distinction Outside of Web Development
date: 2025-11-11
order: 0
---

As a full-stack web developer, attempting to create an iOS app has taught me a key difference between the way memory is handled in a web application vs. mobile and desktop applications.

In a web app, if I have data being presented on the screen, and then I change or delete the record providing the data in my database or via a UI control on the same page, then until the browser is refreshed, that data is still presented on the screen (assuming I have no JavaScript clearing it out via polling or as a part of the UI-edit process).

The moment I refresh the browser, that data is gone, or I get a 401 error or however my server or SPA handles missing or changed data for the given route.

When developing my iOS application, I've found that there has to be meticulous care given to how data is being accessed via the UI view while it is being updated or deleted in another process (i.e., a background thread).

By default, the data/memory layer is intrinsically tied to the view layer. There is no refresh button I can click on (like with a browser) to unify the state of my backend with the state of my frontend.

They're always melded together, and unless I go through great pains to set up separations, I'm going to become fast friends with [`EXC_BAD_ACCESS`](https://www.avanderlee.com/swift/exc-bad-access-crash/).
