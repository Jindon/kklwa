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
    <body class="font-sans antialiased bg-gray-100">
        <div class="max-w-6xl mx-auto px-3 md:px-6 bg-white border-b-4 border-green-400">
            <div class="py-3 flex justify-between items-center">
                <div class="flex space-x-2 items-center">
                    <x-logo only-logo/>
                    <span class="font-bold text-green-600">Admin</span>
                </div>
                <div class="">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" class="flex items-center space-x-1 hover:text-red-600 transition ease-in-out duration-300"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            <x-heroicon-o-logout class="w-5 h-5"/>
                            <span class="font-bold">{{ __('Logout') }}</span>
                        </a>
                    </form>
                </div>
            </div>

            <div class="flex items-center space-x-8 overflow-hidden overflow-x-auto py-3 border-t border-gray-300">
                <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">{{ __('Dashboard') }}</x-nav-link>
                <x-nav-link href="{{ route('admin.staffs') }}" :active="request()->routeIs('admin.staffs')">{{ __('Staffs') }}</x-nav-link>
                <x-nav-link href="{{ route('admin.beneficiaries') }}/" :active="request()->routeIs('admin.beneficiaries')">{{ __('Beneficiaries') }}</x-nav-link>
                <x-nav-link href="{{ route('website.gallery') }}" :active="request()->routeIs('website.gallery')">{{ __('Page Content') }}</x-nav-link>
                <x-nav-link href="{{ route('website.contact') }}" :active="request()->routeIs('website.contact')">{{ __('Settings') }}</x-nav-link>
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-3 md:px-6 py-6 bg-white mt-8 min-h-main-content">
            {{ $slot }}
        </div>

        <div class="max-w-6xl mx-auto px-3 md:px-6 py-3 bg-white mt-8 border-t-4 border-green-400">
            <div class="text-center ">
                <p class="text-sm text-gray-400 tracking-wide">Copyright {{now()->year}} © {{ config('app.name', 'KKLWA') }}</p>
            </div>
        </div>

        @stack('scripts')
    </body>
</html>
