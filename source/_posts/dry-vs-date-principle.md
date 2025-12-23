---
extends: _layouts.post
section: content
title: DRY Principle and DATE Principle - Don't Abstract Too Early
description:
date: 2025-12-19
order: 1
categories:
  - essay
  - concepts
  - coding
---

The DRY (Don’t Repeat Yourself) principle is a mainstay not only of OOP, but also of component architecture (e.g., React, Vue, Svelte, Angular, Web Components, etc.).

If you have repetitive code, it may make sense to combine it into a single class, method, or component so that changes made in one location apply everywhere it’s used. Without tests to cover your code, this can become even more seductive, as the developer may _feel_ more secure having his or her logic in one place rather than duplicated across multiple locations.

The problem is that when you employ the DRY principle too early—during the initial phases of development, before the final business logic is even hashed out—abstracting repeating code can lead to maintainability issues once the business logic evolves in ways that no longer align with the original abstraction.

## A Simple Example

Suppose we have a script that prints `"Hello, World"` in two places:

```js
// Location 1
console.log("Hello, World");

// Location 2
console.log("Hello, World");
```

We decide to abstract this so the script now lives in a function at Location 3:

```js
// Location 3
function printHelloWorld() {
  console.log("Hello, World");
}

// Location 1
printHelloWorld();

// Location 2
printHelloWorld();
```

At some point, the business logic changes. We now need to print `"Hello, Jerry"` in Location 1, along with `"2+2=4"`.

We have two options:

- **Ugly**: Modify the existing function to accept arguments that change the output.
- **Pretty**: Remove the function call in Location 1 and replace it with the required code.

Let’s go with the “pretty” option:

```js
// Location 1
console.log("Hello, Jerry");
console.log("2+2=4");

// Location 2
printHelloWorld();
```

But now we’re only using `printHelloWorld` in one place. Do we really need an abstraction anymore? Let’s fix that:

```js
// Location 1
console.log("Hello, Jerry");
console.log("2+2=4");

// Location 2
console.log("Hello, World");
```

In this example, we introduced a premature abstraction and then had to de-abstract once the business logic changed to the point where the `printHelloWorld` function was no longer necessary.

As simple as this example is, when you apply the same concept to premature abstractions in more complex codebases, it becomes clear how time-consuming it can be to refactor abstractions built around deprecated or evolving business logic.

## The DATE Principle (Don’t Abstract Too Early)

Essentially, you should only employ the DRY principle once you have a bird’s-eye view of the codebase and its associated business logic. This perspective allows you to choose abstractions that are actually efficient and durable.

For example, if you’re working on a “create” form and an “edit” form that share the same fields, you might be tempted to abstract them into a single `Form` component. However, doing so early may introduce bugs related to differences in behavior between create and edit flows (e.g., prefilling fields, edit-only or create-only fields, validation differences, etc.).

Taking a step back and allowing the forms to be built separately—and to prove themselves through testing or production use—can give you a much better understanding of which abstractions make sense. In many cases, a more appropriate abstraction might be individual field components that can be reused not only in those forms, but in others as well.

Another reason to follow the DATE principle is developer sanity. Keeping code in one place—even if it results in longer files—is often preferable to prematurely splitting logic across many files. Excessive indirection forces developers to constantly navigate the codebase just to reconstruct the intended business logic.

## How to Follow the DATE Principle

Employing test-driven and documentation-driven practices from the outset allows you to write code without abstraction while still maintaining confidence. If a typo slips in during a copy/paste, tests or documentation can help catch it early.

With AI in particular, writing clear documentation that describes how your code _should_ work can be used to prompt the model to search for inconsistencies across the codebase—without requiring the upfront investment of building a full test suite for a product that may still be in the proof-of-concept phase.

Tests can then be introduced later to catch those inconsistencies in an automated and more reliable way.

As the product becomes more established, you can revisit the codebase and refactor repetitive logic into abstractions with a much clearer understanding of what is likely to change and what has higher staying power—and is therefore worthy of abstraction.

## Another Acronym For DATE: AHA (Avoid Hasty Abstractions)

- See article: https://kentcdodds.com/blog/aha-programming
