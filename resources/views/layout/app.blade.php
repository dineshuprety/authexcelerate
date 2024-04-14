@props(['title'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title ?? 'My Laravel App' }}</title>
    <!-- Include your CSS and JS files here -->
</head>
<body>
<main>
    {{ $slot }}
</main>
</body>
</html>
