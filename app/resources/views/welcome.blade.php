<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Livewire</title>
    @livewireStyles
</head>

<body>
    <h1>Hello Livewire</h1>
    <button class="btn btn-primary">button</button>

    @livewireScripts
</body>

</html>
