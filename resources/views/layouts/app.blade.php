<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Book Blog') }}</title> --}}
    <title>Book Buzz</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-transparent h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-transparent bg-inherit py-6">
            <div class="container mx-auto flex justify-between items-center px-7">
                <div class="m-auto pt-4 sm:m-auto w-3/5 block text-left">
                    <h1 class="sm:text-gray-800 text-5xl font-bold text-shadow-md pb-1">
                        <a href="{{ url('/') }}">
                            Book Buzz</a>
                    </h1>
                </div>
                {{-- <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        Book Buzz
                    </a>
                </div> --}}
                <nav class="space-x-5 text-gray-800 text-sm sm:text-base">
                    <a class="no-underline hover:underline" href="/">Home</a>
                    <a class="no-underline hover:underline" href="/searchbook">Search</a>
                    <a class="no-underline hover:underline" href="/buybook">Buy</a>
                    <a class="no-underline hover:underline" href="/blog">Book Blog</a>
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                    <a class="no-underline hover:underline" href="/dashboard"><span>{{ Auth::user()->name }}</span></a>

                        <a href="{{ route('logout') }}" class="no-underline hover:underline"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        <div>
            @yield('content')
        </div>

        <div>
            @include('layouts.footer')
        </div>
    </div>
</body>

</html>
