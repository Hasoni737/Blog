<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title', 'Unknown')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        html,
        body {
            height: 100%;
            /* تأمين أن الأصل يملأ الشاشة */
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-vh-100;
            /* تضمن أن الطول لا يقل عن الشاشة */
        }

        main {
            flex: 1 0 auto;
            /* هذا يجعل منطقة المحتوى تتمدد لتطرد الـ Footer للأسفل */
        }

        footer {
            flex-shrink: 0;
            /* تمنع الـ Footer من الانكماش */
        }

        .header-bg {
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("{{ asset('background/background.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
        }

        .header-bg .container {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
    @yield('style')
</head>

<body class="min-vh-100" style="height: 100%;">
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">LaraPulse</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ Route::is('home') ? 'active' : '' }} "
                            href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('about') ? 'active' : '' }} "
                            href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('blog') ? 'active' : '' }} "
                            aria-current="page" href="{{ route('blog') }}">Blog</a></li>


                    <div class="d-none d-lg-block border-start mx-3 align-self-center"
                        style="height: 25px; border-color: #dee2e6 !important;"></div>
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-dark px-3 ms-lg-2 shadow-sm {{ Route::is('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark px-3 ms-lg-2 shadow-sm {{ Route::is('register') ? 'active' : '' }}"
                                href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown">
                                Hi, {{ Auth::user()->first_name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('posts.create') }}">Create Post</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('posts.my-posts') }}">My Posts</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- Body --}}
    <div class="flex-grow-1">
        @yield('body')
    </div>
    {{-- Body --}}

    {{-- Footer --}}
    @if (!Route::is('login') && !Route::is('register'))
        <footer class="py-4 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Ait Lahcen Hassan</p>
            </div>
        </footer>
    @endif

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    @yield('script')
</body>

</html>
