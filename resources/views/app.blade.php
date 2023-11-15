<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title inertia>{{ config('app.name', 'Laravel') }}</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/app.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  @vite('resources/js/app.js')
  @inertiaHead
</head>

<body>
  @inertia
</body>

</html>