<head>
    <!-- Metadata -->
    <meta charset="utf-8">
    <meta
        name="description"
        content="Gaelic Gatherer is a small e-learning platform which aims to help people learn Scottish Gaelic, and also evaluate the effects of a singular gamified element, badges, on the knowledge retention"
    >
    <meta name="keywords" content="Gaelic, Gaelic Gatherer, Scottish Gaelic, e-learning, badges, gamification">
    <meta name="author" content="Rheanne Haig McIntosh">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'Gaelic Gatherer') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts -->
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
