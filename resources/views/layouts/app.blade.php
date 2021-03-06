<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
        form {font-size: 1.25rem;}

        .dropdown:hover
    
    </style>
</head>
<body>
    <div id="app" style="margin-top:50px;">
        <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                                <a class="btn btn-outline-primary" style="margin-right:20px;" href="{{ route('jobs.index') }}">Jobs</a>
                        </li>
                        <li class="nav-item">
                                <a class="btn btn-outline-primary" style="margin-right:20px;" href="{{ route('companies.index') }}">Companies</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-outline-primary" style="margin-right:20px;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item" style="margin-right:4%;white-space: nowrap;">
                                <a class="btn btn-outline-primary" href="{{ route('jobs.create')}}">Add Job</a>
                            </li>
                            <li class="nav-item" style="margin-right:4%;white-space: nowrap;">
                                <a class="btn btn-outline-primary" href="{{ route('companies.create')}}">Add Company</a>
                            </li>
                            <li class="nav-item" style="margin-right:4%;white-space: nowrap;">
                                <a class="btn btn-outline-primary dropdown" href="{{ route('users.show', auth()->user()) }}" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item" style="margin-right:4%;white-space: nowrap;">
                                <a class="btn btn-outline-primary" href="{{ route('home') }}">
                                    Your Companies
                                </a>
                            <li>
                                <a class="btn btn-outline-primary" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
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
</body>
</html>
