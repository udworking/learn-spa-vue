<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Vue Laravel SPA') }}</title>
    <!-- Style -->
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app">
        <header-component></header-component>
        <router-view></router-view>
    </div>
    <!-- Scripts -->
    @vite('resources/js/app.js')
</body>
</html>

