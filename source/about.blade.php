<!DOCTYPE html>
<html>
  <head>
    <title>Redirecting...</title>
    <link rel="canonical" href="{{ $page->baseUrl }}" />
    <meta charset="utf-8" />
    <meta http-equiv="refresh" content="0; url={{ $page->baseUrl }}" />
  </head>
  <body>
    <p>Redirecting...</p>
  </body>
</html>

<script>
  window.location.assign('/');
</script>
