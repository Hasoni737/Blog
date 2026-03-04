@extends('layouts.app')

@section('title', 'Home')

@section('style')
    <style>
        .profile_image {
            width: 35px;
            height: 35px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0px 4px rgba(0, 0, 0, 0.2);
            display: inline-block;
        }
    </style>
@endsection

@section('body')
    <!-- Page header with logo and tagline-->
    <header class=" header-bg py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to LaraPulse</h1>
                <p class="lead mb-0">In-depth tutorials, expert insights, and the latest trends from the world of PHP and
                    Laravel.</p>
            </div>
        </div>
    </header>

    {{-- Hero --}}
    <section class="py-5 bg-white mb-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1 mb-4 mb-lg-0">
                    <div class="p-2 border rounded-4 bg-light shadow-sm">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=600&q=80"
                            class="img-fluid rounded-4" alt="LaraPulse Coding Environment" loading="lazy">
                    </div>
                </div>

                <div class="px-5 col-lg-6 order-1 order-lg-2 pb-5 pb-lg-0">
                    <div class="pe-lg-5 text-center text-lg-start">
                        <h2 class="display-5 fw-bolder mb-3">Why LaraPulse?</h2>
                        <p class="lead text-muted mb-4">
                            A dedicated space for modern web development. We simplify complex Laravel concepts, share clean
                            code practices, and keep you updated with the latest in the PHP ecosystem.
                        </p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a href="/posts" class="btn btn-dark btn-lg px-4 me-md-2 shadow-sm">Explore
                                Articles</a>
                            <a href="#" class="btn btn-outline-secondary btn-lg px-4">About the
                                Author</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    {{-- Hero --}}

    {{-- Categories --}}
    <section class="py-5 bg-light border-bottom border-top mb-4">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center">

                <span class="text-muted fw-bold mb-2 mb-md-0">Categories</span>

                <div class="d-none d-md-block border-start mx-4" style="height: 30px; border-color: #ccc !important;"></div>

                <div class="d-flex flex-wrap align-items-center justify-content-center gap-4 gap-lg-5">

                    <a href="#"
                        class="text-decoration-none text-dark fw-bolder fs-5 text-uppercase d-flex align-items-center">
                        <i class="bi bi-code-slash me-2"></i> Back-End <small class="ms-1 fw-light"
                            style="font-size: 0.6em;">Magic</small>
                    </a>
                    <a href="#"
                        class="text-decoration-none text-dark fw-bolder fs-5 text-uppercase d-flex align-items-center">
                        <i class="bi bi-code-slash me-2"></i> Front-End <small class="ms-1 fw-light"
                            style="font-size: 0.6em;">Art</small>
                    </a>
                    <a href="#"
                        class="text-decoration-none text-dark fw-bolder fs-5 text-uppercase d-flex align-items-center">
                        <i class="bi bi-code-slash me-2"></i>Dev Tips<small class="ms-1 fw-light"
                            style="font-size: 0.6em;">Tricks</small>
                    </a>
                    <a href="#"
                        class="text-decoration-none text-dark fw-bolder fs-5 text-uppercase d-flex align-items-center">
                        <i class="bi bi-code-slash me-2"></i>Modern<small class="ms-1 fw-light"
                            style="font-size: 0.6em;">Ecosystem</small>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- Categories --}}

    <!-- Posts-->
    <div class="container py-3 mb-5">
        <div class="row justify-content-center">
            {{-- Title --}}
            <h2 class="text-center pb-3 mb-5 display-5 fw-bolder">Latest Posts</h2>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-grid h-100 d-flex flex-column shadow-sm border rounded bg-white">

                                {{-- Image --}}
                                <div class="blog-grid-img">
                                    <img src="{{ asset('images/' . $post->image_path) }}" class="img-fluid w-100"
                                        style="height: 300px; object-fit: cover;" alt="{{ $post->title }}"
                                        onerror="this.src='https://dummyimage.com/700x350/dee2e6/6c757d.jpg&text=No+Image'">
                                </div>

                                <div class="blog-grid-text p-4 d-flex flex-column flex-grow-1">
                                    {{-- Title --}}
                                    <h3 class="h5 mb-3">
                                        <a href="{{ route('posts.single.post', $post->slug) }}"
                                            class="text-dark text-decoration-none fw-bold">
                                            {{ Str::limit($post->title, 60) }}
                                        </a>
                                    </h3>

                                    {{-- Description --}}
                                    <p class="text-muted small flex-grow-1">
                                        {{ Str::limit($post->description, 180) }}
                                    </p>

                                    {{-- Posts Information --}}
                                    <div class="meta-style2 mt-auto py-2 border-top border-bottom border-dashed">
                                        <ul class="list-unstyled d-flex gap-3 mb-0">
                                            <li class="d-flex justify-content-between align-items-center">
                                                <div class="pe-2">
                                                    <img src="{{ asset('users/images/' . $post->user->profile_image) }}"
                                                        alt="" class="profile_image rounded-circle img-fluid">
                                                </div>
                                                <div class=" text-muted small">{{ $post->user->first_name ?? 'User' }}</div>
                                            </li>
                                            <li class="text-muted small d-flex justify-content-between align-items-center">
                                                <i class="bi bi-calendar-week-fill me-1 "></i>
                                                {{ $post->created_at->format('d M, Y') }}
                                            </li>
                                            <li class="d-flex justify-content-between align-items-center">
                                                <span class="badge bg-secondary py-1 px-2" style="font-size: 10px;">
                                                    {{ $post->category->name }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>

                                    {{-- Buttons --}}
                                    <div class="mt-3  d-flex gap-2">
                                        <a class="btn btn-primary" href="{{ route('posts.single.post', $post->slug) }}">Read
                                            more →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <!-- Page content-->

    {{-- Status --}}
    <div class="mb-5 bg-light border-bottom border-top py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-4">
                    <h4 class="fw-bold mb-0">50+</h4>
                    <small class="text-muted">Articles</small>
                </div>
                <div class="col-4 border-start border-end">
                    <h4 class="fw-bold mb-0">12k</h4>
                    <small class="text-muted">Monthly Readers</small>
                </div>
                <div class="col-4">
                    <h4 class="fw-bold mb-0">5</h4>
                    <small class="text-muted">Tutorials</small>
                </div>
            </div>
        </div>
    </div>
    {{-- Status --}}

    {{-- Contact --}}
    <x-contact></x-contact>
    {{-- Contact --}}

@endsection
