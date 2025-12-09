---
extends: _layouts.post
section: content
title: Portion Testing
date: 2025-10-30
description: Thoughts on testing complicated code.
order: 0
---

When dealing with a particularly complicated code, like those that deals with an API and use multiple dependencies which are complicated to stub out, breaking the code into separate functions and testing those is the standard.

The drawback of that is then we have all these separate functions that exist solely to be testable. Without our unit tests, the functions would only be used by the complicated code they’re being called by.

One case where that's untenable is where the standards of a codebase require that we limit abstracting into functions only to situations where the same code is being called at least two times by two places in the **source** code. In that case, we can’t break our code into separate functions just to make it testable.

A solution I’ve been pondering is something I’ve dubbed “portion testing”, although I’m sure there is a more elegant name out there.

With portion testing, I’m testing a specific segment of code. I don’t know of any language that allows for calling specific lines of code as if they were a function, so in most cases, the code would have to be copy and pasted into its own function in the testing file.

The portion test would then test that function with a variety of cases the way it would as a unit or integration test.

The advantage of this is how easy it is to setup compared to traditional options.

The drawback is in the following:

1. Tracking changes to the referenced source code. Unless we have some means of tracking the source code changes (e.g., some integration into the testing CLI, static code analyzer, etc.), our tests would show a lot of green where it isn’t warranted. It would essentially turn into a false positive generator.
2. I also don’t think there is any coverage engine that can look at a function, say, “This looks very similar to some code that exists in source,” and from there, tell us that the copy/pasted source is covered.
3. Finally, if we go crazy with portion testing, we might end up ignoring larger but necessary integration tests that would provide us better information on how our code deals with data from external dependencies.

If there was some testing CLI that looked at these portion tests and failed or warned if the copy/pasted code isn’t the same as what’s on source, 1 and 2 could potentially be solved, but it would also slow down testing.

A static code analysis tool wouldn’t slow testing down, but we would have to keep an eye on it along with our tests, forcing us to look at two places instead of one.

Regardless of the potential pitfalls, here is an example of how it can be implemented.

```js
// source.js

function doComplicatedThing() {
  // Insert complicated code here

  const x = 2 + 2; // line 50
  const z = x + y; // line 51

  // Insert complicated code here
}
```

```javascript
// test.js

/**
 * @portion /path/to/source.js#50-51
 */
function determineSum(y) {
  const x = 2 + 2;
  return x + y;
}

function testDetermineSum() {
  const result = determineSum(10);

  expect(result).toBe(14);
}
```

In this case, the `@portion /path/to/source.js#50-51` can be a special doc used by various languages (not just JavaScript) to tell the testing, coverage, and static analysis tooling that this function represents a piece of code at specific lines in a file.

If the code changes or is moved from its original line location, the testing CLI can make all tests that call that function fail with the error stating that the portion code no longer represents the source code being tested.

To deal with slowdowns in testing, it can perhaps cache the failure(s) and keep them until the user makes a change to the affected function or source code.

We could also just ignore the risk of false positives by putting the portion tests in a special suite or in a completely different repository.

Rather than telling us whether the existing code works, it would function more as a testing ground for implementing complicated functionality. The resultant code would then by copy/pasted into source, and we would write comments and documentation to explain how it should work for other developers and our future selves.

In that case, while it would technically not be considered _tested code_, it would be a superior alternative to the good old "winging it as we go."
