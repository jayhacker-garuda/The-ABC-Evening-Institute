<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-screen font-sans antialiased leading-none bg-gray-100">
<div class="flex flex-col">

    <div class="flex items-center justify-center min-h-screen">
        <div class="flex flex-col justify-around h-full">
            <div>
                <h1 class="mb-6 text-4xl font-light tracking-wider text-center text-gray-600 sm:mb-8 sm:text-6xl">
                    The ABC Evening Institute !!!
                </h1>
                <div class="flex items-center justify-center space-x-2">
                    <x-modal alpname="Login" modalTitle="Login Form" btnName="Login">
                        @livewire('user.login.login-form')
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
</div>
@livewireScripts()
    <script src="{{ asset('js/alpine/alpine3-4-2.min.js') }}"></script>
</body>
</html>
