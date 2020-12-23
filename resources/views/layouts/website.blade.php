<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="favicon.png" type="image/png" sizes="16x16">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
        <link rel="stylesheet" href="{{ asset('css/vanilla-calendar-min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        {{-- Header nav --}}
        <div class="border-b border-gray-200">
            <div x-data="{ open: false }" class="max-w-6xl mx-auto">
                <div class="px-3 py-3 md:px-6">
                    <div class="flex items-center justify-between">
                        <x-logo />

                        <div class="block md:hidden">
                            <button @click="open = true" class="p-1">
                                <x-heroicon-o-menu class="w-6 h-6"/>
                            </button>
                        </div>

                        <div class="hidden md:block">
                            @include('layouts.website-nav')
                        </div>

                        {{-- Mobile nav --}}
                        <div x-show="open" x-cloak class="fixed top-0 left-0 right-0 z-50 block md:relative md:hidden"
                                x-transition:enter="transform transition ease-in-out duration-500"
                                x-transition:enter-start="-translate-x-full"
                                x-transition:enter-end="translate-x-0"
                                x-transition:leave="transform transition ease-in-out duration-500"
                                x-transition:leave-start="translate-x-0"
                                x-transition:leave-end="-translate-x-full"
                        >
                            <div @click.away="open = false" class="relative w-10/12 min-h-screen px-4 py-12 bg-white border-r border-gray-200 md:px-0 md:py-0 md:bg-transparent md:min-h-0 md:w-auto md:border-none">
                                @include('layouts.website-nav')

                                <button @click="open = false" class="absolute top-0 right-0 block p-1 mt-2 mr-2 text-red-500 bg-gray-100 md:hidden">
                                    <x-heroicon-o-x class="w-6 h-6"/>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            {{ $slot }}
        </div>

        <x-back-to-top />

        {{-- Footer --}}
        @include('layouts.footer')

        @livewireScripts
        @stack('scripts')
    </body>
</html>
