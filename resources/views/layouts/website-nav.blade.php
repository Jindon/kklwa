<nav class="flex flex-col md:flex-row md:justify-between md:items-center md:space-x-8 space-y-4 md:space-y-0">
    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">Home</x-nav-link> --}}
    <x-nav-link href="{{ route('website.home') }}" :active="request()->routeIs('website.home')">Home</x-nav-link>
    <x-nav-link href="{{ route('website.about') }}" :active="request()->routeIs('website.about')">About</x-nav-link>
    <x-nav-link href="{{ route('website.staffs') }}" :active="request()->routeIs('website.staffs')">Staffs</x-nav-link>
    <x-nav-link href="{{ route('website.beneficiaries') }}/" :active="request()->routeIs('website.beneficiaries')">Beneficiaries</x-nav-link>
    <x-nav-link href="{{ route('website.gallery') }}" :active="request()->routeIs('website.gallery')">Gallery</x-nav-link>
    <x-nav-link href="{{ route('website.contact') }}" :active="request()->routeIs('website.contact')">Contact</x-nav-link>
</nav>
