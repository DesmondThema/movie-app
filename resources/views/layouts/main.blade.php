<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <title>Movie App</title>
    @livewireStyles
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="/home" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="/favourites" class="hover:text-gray-300">Favourite Movies</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown />
                @guest
                    <a class="hover:text-gray-300 ml-4 mt-2 md:mt-0" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="hover:text-gray-300 ml-4 mt-2 md:mt-0" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <span class="hover:text-gray-300 ml-4 mt-2 md:mt-0">{{ 'Hi '. Auth::user()->name }}</span>

                    <a href="{{ route('home') }}"
                       class="hover:text-gray-300 ml-4 mt-2 md:mt-0"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
                <a href="/contact" class="hover:text-gray-300 ml-4 mt-2 md:mt-0">Contact us</a>
            </div>

        </div>

    </nav>

    @yield('content')
    @livewireScripts
</body>
</html>
