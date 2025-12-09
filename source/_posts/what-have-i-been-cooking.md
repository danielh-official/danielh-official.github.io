---
extends: _layouts.post
section: content
title: What Have I Been Cooking?
date: 2025-10-24
description: What I've been focusing on in software development.
giscusCommentsDiscussionNumber: 5
order: 0
---

## Chrome Extensions

### Local X.com (Twitter) Mutelist

Just posted an update to my chrome extension: [Local X.com (Twitter) Mutelist](https://chromewebstore.google.com/detail/local-xcom-twitter-muteli/epgpnmkhgjnhhammgaaencaconefiokp?hl=en&authuser=0). This adds two new buttons for muting and blocking users. Unlike the standard mute/block functionality in x.com, muting/blocking through this extension also adds the user to the mutelist, allowing you to capture the user and their offending post along with muting/blocking them at the account-level.

Since mutelists can be imported and exported, it's good for users who have multiple accounts.

A yet-to-be-implemented feature that would be handy along with this is the ability to go through every user in my mutelist and retroactively mute or block them. That way, if I have 1000 users in one of my accounts that I have blocked server-side, and I have another account where they're not already blocked, I can import them and then run the "Block All" functionality to have them blocked on my other account as well.

### x.com Whitelist

Another chrome extension I've been thinking about is a whitelisting extension, where it hides posts/replies from all users except only those that are added to the whitelist.

I considered baking this into Local X.com (Twitter) Mutelist, but for now, it feels it would overcomplicate the extension and is better being its own.

Also, I'm wondering about the usability of this extension for x.com users who access primarily through mobile, which I assume is the majority of users. It wouldn't work as a browser extension. It would probably more useful as a mobile app.

(This is also something I've been considering with Local X.com (Twitter) Mutelist.)

I know there are x.com "API" mobile apps that, really, they just render a web view in a mobile-accessible format. Actually using x.com "API" or Reddit "API" in a 100% native app is way too expensive.

Anyway, if a user is willing to deal with the webview, I could bake in the whitelisting functionality into a mobile app that renders a wrapper for x.com.

Another addition to this whitelist would be the ability to sync the user's following to it. Assumedly, if you're following someone, you want to see their post. Whether this is a chrome extension and or a mobile wrapper app, this added functionality would essentially allow you to only see the posts and rpelies of users you are following.

Either way, a chrome extension is relatively simpler to implement than a mobile app, so I'm in no hurry to see if the x.com iOS/Android crowd are willing to drop the official app for a crappy web render just because it allows them to a form a more efficient echo chamber.

## Playing Around With Vapor (Swift Web Framework)

Since I've been playing around with Swift when developing Streaks (For YNAB), I decided to take a look at [Vapor](https://github.com/vapor/vapor). It's a fairly popular framework, with the repository stars currently up to 25,0000 surprisingly. Since it was number 1 in the Google Search AI results, I figured it was worth focusing on compared to all the other Swift web frameworks.

Server-side Swift isn't very popular compared to Node.js, Laravel, or ASP.Net, so I'm not in a hurry to build projects on it, but it's nice to see how a language primarily made for developing native iOS and macOS apps can be used for backend web development.

## Streaks (For YNAB) - v0.4.0 and website redesign

I updated the [streaksforynab.app](https://streaksforynab.app/) website to make the messy front page way simpler than it originally was.

I also created a Public Beta group for Testflight and put a button on the website for any user to access the Testflight version of Streaks (For YNAB).

Furthermore, the app is now on v0.4.0. All the changes were primarily made on the backend.

Before, it was calculating streaks and day statuses (did it pass or fail) for habits on the fly. But this is intensive to do each time the user accesses a habit.

I changed the data model to store the day statuses and streaks in the database after the initial calculation. I then listed all the possible scenarios where re-calculations would have to be made (e.g., I change the filtering on a habit) and embedded the code into all the scenarios where a recalculation would have to be triggered.

This significantly sped up UI navigations and sorting, since rather than calculating the transaction data on the fly, it's already pre-calculated and stored in the database.

Something I'm musing on is making my recalculation more robust. For instance, rather than recalculating all the day statuses and streaks when new data comes from YNAB, the code first analyzes the composition of the new data and only recalculates for the habits that would filter in the new transactions. For example, a transaction with a specific category will only update a habit that doesn't filter on any category or filters on that specific category. All other habits will just add a passed day status for the current date.

There are most likely other avenue for improvements on recalculation efficiency I overlooked, so I'm expecting to make more changes on this front.

With regard to publishing to the app store, I'm considering that heavily right now. The app feels fairly stable with all the recent changes. I'm also thinking that it might be better to update that only after I've implemented the optional cloud sync.

If I don't implement the optional cloud sync before I publish the v1.0.0 to the app store, I feel like there would be some heavy data schema changes necessary that might result in data loss for existing users. Also, my app might have a lower rating as a result of not having cloud syncing functionality from the get-go. That's assuming there are no serious bugs that would result in a barrage of 1-star ratings.

Perhaps I'm overreacting and should just publish with the expectation of an initial poor reception. It is my first iOS app, after all, and the sooner I have something in the store, the more impressive my portfolio appears.

I will consider publishing by the end of this month or next month. I don't think I have any users anyway, so the app is more likely to stay with 0 reviews for a long time.

## Other Recent Stuff

- [Portfolio](https://danielh-official.github.io/about/) &mdash; Updates to this page to add more projects and links
- [Playing around with Ruby on Rails](https://github.com/danielh-official/ruby-on-rails-playground) &mdash; While I don't think Ruby on Rails is the most popular web framework for developing new web apps, for existing web apps, it's crucial. For instance, I'm interested in contributing to [Archive of Our Own](https://github.com/otwcode/otwarchive), which is written on Rails, so I did this tutorial to get a better idea of how Rails works in comparison to Laravel, which I'm more familiar with.
- [Simple Funding Site - Laravel Portfolio](https://github.com/danielh-official/simple-funding-site) &mdash; Something I cooked up to show my skills based on a job posting I saw. I don't think if I'm going to finish this anytime soon. I want to focus on more on stuff that's actually useful.
- For assisting with my job search, I've been musing on an application where I take links for a bunch of job position and have AI look at it to find the common skills and keywords. From that, I can build things like a resume or portfolio project that is optimized to demonstrate these keywords, making me more attractive to the average tech recruiter (in theory).
- toolkit-for-ynab &mdash; There's this interesting task that involves adding bulk date edits to the transactions view on YNAB (like they did with bulk memo). It's been an issue for a while (since 2021, I believe), but I haven't seen any actual implementation of it, so I'm thinking about opening a pull request for it. I'm no stranger to contributing to this project. I'm the one responsible for adding toolkit-report urls, after all. I'm seriously wondering how difficult this will be considering we already have the bulk memo editing feature on production and yet this issue has remained stagnant for over 2 years.
- https://github.com/karpathy/nanochat &mdash; Looking at this
- Considering making a web UI for my favorite task management app: Things 3 &mdash; purpose is purely portfolio to showcase my frontend skills
- Looking into improving Laravel documentation. Specifically, I want to see if I can improve the search. Maybe implement or add some AI features. As someone who's used Laravel for most of my career, I have heard complaints from co-workers on more than one occassion about the search not being the best. Could be a good opportunity.
