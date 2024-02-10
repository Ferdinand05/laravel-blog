<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dark:bg-gray-900">

    @if (session()->has('success'))
        <x-toast-success>{{ session('success') }}</x-toast-success>
    @endif

    @if (session()->has('fail'))
        <x-toast-fail>{{ session('fail') }}</x-toast-fail>
    @endif


    @include('layouts.navbar')

    <main>
        {{ $slot }}
    </main>


    @include('layouts.footer')
</body>

</html>
