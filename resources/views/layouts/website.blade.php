<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
    </head>
    <body class="font-sans antialiased">
        {{-- Header nav --}}
        <div class="border-b border-gray-200">
            <div x-data="{ open: false }" class="max-w-6xl mx-auto">
                <div class="px-3 md:px-6 py-3">
                    <div class="flex justify-between items-center">
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
                        <div x-show="open" x-cloak class="fixed top-0 left-0 right-0 md:relative z-50 block md:hidden"
                                x-transition:enter="transform transition ease-in-out duration-500"
                                x-transition:enter-start="-translate-x-full"
                                x-transition:enter-end="translate-x-0"
                                x-transition:leave="transform transition ease-in-out duration-500"
                                x-transition:leave-start="translate-x-0"
                                x-transition:leave-end="-translate-x-full"
                        >
                            <div @click.away="open = false" class="relative px-4 py-12 md:px-0 md:py-0 bg-white md:bg-transparent min-h-screen md:min-h-0 w-10/12 md:w-auto border-r border-gray-200 md:border-none">
                                @include('layouts.website-nav')

                                <button @click="open = false" class="block md:hidden absolute top-0 right-0 mt-2 mr-2 p-1 bg-gray-100 text-red-500">
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

        {{-- Footer --}}
        @include('layouts.footer')

        @stack('scripts')
    </body>
</html>
