<!DOCTYPE html>
<html lang="en" data-theme="halloween">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    {{-- Vite Assets (CSS + JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-300 min-h-dvh">
    <div class="w-[90%] mx-auto pt-5">
        {{-- Navigation Bar --}}
        <div class="navbar bg-base-100 shadow-sm rounded-2xl">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </div>
                    <ul tabindex="-1"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-5 w-52 p-2 shadow">
                        <li><a href="{{ route('counter') }}">Counter Application</a></li>
                        <li><a href="{{ route('calculator') }}">Calculator App</a></li>
                        <li><a href="{{ route('onboarding') }}">Onboarding Form</a></li>
                        <li><a href="{{ route('manage-students') }}">Manage Students</a></li>
                        <li><a href="{{ route('manage-supervisors') }}">Manage Supervisors</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-center">
                <a class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
            </div>
            @guest
                <div class="navbar-end inline-flex gap-2 md:pr-3">
                    <a href="{{ route('login') }}" class="btn rounded-xl">Login</a>
                    <a href="{{ route('onboarding') }}"
                        class="btn rounded-xl btn-primary btn-soft border-dashed border-primary">Onboarding</a>
                </div>
            @else
                @livewire('logout')
            @endguest
        </div>

        {{-- Page Content Here --}}
        <div class="py-5">
            {{ $slot }}
        </div>
    </div>

</body>

</html>