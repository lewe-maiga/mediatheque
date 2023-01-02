<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mediatheque</title>

    @vite('resources/js/welcome.tsx')

</head>

<body>
    <input id="authenticated" type="hidden" value="{{ auth()->check() }}">

    
    <div class="root">

    </div>
</body>

</html>