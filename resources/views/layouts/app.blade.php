<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @if (session('error'))
        <div class="alert alert-danger" style="padding: 1rem; margin: 1rem; border-radius: 8px;">
            {{ session('error') }}
        </div>
    @endif

<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('owners.index') }}">{{__('nav.Owners')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cars.index') }}">{{__('nav.Cars')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shortcodes.index') }}">{{__('nav.ShortCodes')}}</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('setLanguage','lt') }}">LT</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link pr-5" href="{{ route('setLanguage','en') }}">EN</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    @if(Auth::user()->type=='admin')
                                        ({{__('admin')}})
                                    @endif
                                    @if(Auth::user()->type=='readonly')
                                        ({{__('read only')}})
                                    @endif
                                    @if(Auth::user()->type=='regular')
                                        ({{__('regular')}})
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div>
        {{__('Phone')}}: [phone]
    </div>
<div>
    {{__('Email')}}: [email]
</div>
    <script>
        setTimeout(() => {
            document.querySelector('div[style*="padding: 1rem"]').remove();
        }, 3000);
        document.querySelectorAll('[required]').forEach(el => {
            el.addEventListener('invalid', () => {
                el.setCustomValidity('{{__('Please fill out.')}}');
            });
            el.addEventListener('input', () => {
                el.setCustomValidity('');
            });
        });
    </script>
</body>
</html>
