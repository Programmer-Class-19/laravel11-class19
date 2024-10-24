<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>
        @isset($title)
            {{ $title }} / Laravel 11
        @else
            Laravel 11
        @endisset
    </title>
</head>

<body class="h-full">
    <x-navbar></x-navbar>

    @isset($heading)
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            </div>
        </header>
    @endisset
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <p>{{ $slot }}</p>
        </div>
    </main>
    </div>
</body>

</html>
